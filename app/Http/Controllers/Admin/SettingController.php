<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group'); // groups by tab
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * ==========================
     * UPDATE SETTINGS
     * ==========================
     */
    public function update(Request $request)
    {
        $group = $request->route('group');

        switch ($group) {

            /**
             * ------------------------------------------------
             * CONTACT FORM SETTINGS (NEW)
             * ------------------------------------------------
             */
            case 'contact':

                $validated = $request->validate([
                    'forward_enabled' => 'required|in:0,1',
                    'forward_to'      => 'nullable|string',
                ]);

                Setting::updateOrCreate(
                    ['group' => 'contact', 'key' => 'forward_enabled'],
                    ['value' => $validated['forward_enabled']]
                );

                Setting::updateOrCreate(
                    ['group' => 'contact', 'key' => 'forward_to'],
                    ['value' => $validated['forward_to']]
                );

                break;

            /**
             * ------------------------------------------------
             * BANNERS
             * ------------------------------------------------
             */
            case 'banners':
                $settings = Setting::where('group', 'banners')->where('key', 'homepage')->first();
                $banners  = $settings ? json_decode($settings->value, true) : [];

                // Banner 1
                if ($request->hasFile('banner_one_image')) {
                    $path                                  = $request->file('banner_one_image')->store('uploads', 'public');
                    $banners['banner_one']['banner_image'] = $path;
                }
                $banners['banner_one']['banner_url'] = $request->banner_one_url;

                // Banner 2
                for ($i = 0; $i <= 1; $i++) {
                    $imgField = "banner_two_image_$i";
                    $urlField = "banner_two_url_$i";

                    if ($request->hasFile($imgField)) {
                        $path                                                 = $request->file($imgField)->store('uploads', 'public');
                        $banners['banner_two']['banners'][$i]['banner_image'] = $path;
                    }

                    $banners['banner_two']['banners'][$i]['banner_url'] = $request->$urlField ?? '#';
                }

                // Banner 3
                if ($request->hasFile('banner_three_image')) {
                    $path                                    = $request->file('banner_three_image')->store('uploads', 'public');
                    $banners['banner_three']['banner_image'] = $path;
                }
                $banners['banner_three']['banner_url'] = $request->banner_three_url;

                // Status
                $banners['banner_one']['status']   = $request->has('banner_one_status') ? 1 : 0;
                $banners['banner_two']['status']   = $request->has('banner_two_status') ? 1 : 0;
                $banners['banner_three']['status'] = $request->has('banner_three_status') ? 1 : 0;

                Setting::updateOrCreate(
                    ['group' => 'banners', 'key' => 'homepage'],
                    ['value' => json_encode($banners)]
                );

                break;

            /**
                 * ------------------------------------------------
                 * FOOTER SETTINGS
                 * ------------------------------------------------
                 */
            case 'footer':
                $grid2       = $request->input('grid_2_menus', []);
                $grid3       = $request->input('grid_3_menus', []);
                $grid2_title = $request->input('grid_2_title', 'Quick Links');
                $grid3_title = $request->input('grid_3_title', 'Resources');

                $footer_grid_2 = [
                    'title' => $grid2_title,
                    'menus' => array_values(array_filter($grid2, fn($i) => ! empty($i['name']) && ! empty($i['url']))),
                ];

                $footer_grid_3 = [
                    'title' => $grid3_title,
                    'menus' => array_values(array_filter($grid3, fn($i) => ! empty($i['name']) && ! empty($i['url']))),
                ];

                $footerUpdates = [
                    'grid_2_menus' => json_encode($footer_grid_2),
                    'grid_3_menus' => json_encode($footer_grid_3),
                    'about'        => $request->about,
                    'address'      => $request->address,
                    'copyright'    => $request->copyright,
                ];

                foreach ($footerUpdates as $key => $value) {
                    Setting::updateOrCreate(
                        ['group' => 'footer', 'key' => $key],
                        ['value' => $value]
                    );
                }

                if ($request->hasFile('logo')) {
                    $path = $request->file('logo')->store('uploads', 'public');
                    Setting::updateOrCreate(
                        ['group' => 'footer', 'key' => 'logo'],
                        ['value' => $path]
                    );
                }
                break;

            /**
                 * ------------------------------------------------
                 * SOCIAL LINKS
                 * ------------------------------------------------
                 */
            case 'social':

                $links = array_values(array_filter(
                    $request->input('social_links', []),
                    fn($i) => ! empty($i['title']) && ! empty($i['url'])
                ));

                Setting::updateOrCreate(
                    ['group' => 'social', 'key' => 'links'],
                    ['value' => json_encode($links)]
                );

                break;
            case 'security':

                $enabled = $request->recaptcha_enabled == 1;

                $recaptchaData = [
                    'enabled'    => $enabled,
                    'site_key'   => $request->recaptcha_site_key,
                    'secret_key' => $request->recaptcha_secret_key,
                ];

                Setting::updateOrCreate(
                    ['group' => 'security', 'key' => 'recaptcha'],
                    ['value' => json_encode($recaptchaData)]
                );

                break;

            /**
                 * ------------------------------------------------
                 * DEFAULT HANDLER FOR ALL OTHER GROUPS
                 * ------------------------------------------------
                 */
            default:
                foreach ($request->except('_token') as $key => $value) {
                    if (in_array($key, ['logo_light', 'logo_dark', 'favicon']) && $request->hasFile($key)) {
                        $path  = $request->file($key)->store('uploads', 'public');
                        $value = 'storage/' . $path;
                    }

                    Setting::updateOrCreate(
                        ['group' => $group, 'key' => $key],
                        ['value' => $value]
                    );
                }
        }

        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return back()->with('success', 'Settings updated successfully.');
    }

    /**
     * ======================================================
     * ADVANCED SMTP AUTO-DETECTION
     * ======================================================
     */
    public function testSmtpAdvanced(Request $request)
    {
        $request->validate([
            'mail_host'       => 'required|string',
            'mail_port'       => 'required|integer',
            'mail_username'   => 'nullable|string',
            'mail_password'   => 'nullable|string',
            'mail_encryption' => 'nullable|string',
        ]);

        $host       = $request->mail_host;
        $port       = (int) $request->mail_port;
        $username   = $request->mail_username;
        $password   = $request->mail_password;
        $encryption = $request->mail_encryption ?: null;

        // Try Swift SMTP (native Laravel)
        if (class_exists(\Swift_SmtpTransport::class)) {
            try {
                $transport = (new \Swift_SmtpTransport($host, $port, $encryption))
                    ->setUsername($username)
                    ->setPassword($password)
                    ->setTimeout(8);

                $transport->start();
                $transport->stop();

                return response()->json([
                    'status'  => 'success',
                    'message' => 'SMTP connection successful (Swift).',
                ]);
            } catch (\Exception $ex) {
                $swiftError = $ex->getMessage();
                Log::warning("Swift SMTP test failed: $swiftError");
            }
        }

        // Fallback socket-level handshake
        $socketResult = $this->smtpSocketCheck($host, $port, $username, $password, $encryption);

        if ($socketResult['ok']) {
            return response()->json([
                'status'  => 'success',
                'message' => 'SMTP connection successful (Socket): ' . $socketResult['message'],
            ]);
        }

        $errorMessage = $socketResult['message'] ??
            'Unable to verify SMTP connection.';

        if (! empty($swiftError)) {
            $errorMessage .= " | Swift: $swiftError";
        }

        return response()->json([
            'status'  => 'danger',
            'message' => $errorMessage,
        ], 422);
    }

    /**
     * SMTP SOCKET CHECK
     */
    private function smtpSocketCheck(string $host, int $port, ?string $username, ?string $password, ?string $encryption): array
    {
        $timeout = 6;
        $remote  = ($encryption === 'ssl') ? "ssl://{$host}:{$port}" : "tcp://{$host}:{$port}";

        $errNo  = 0;
        $errStr = '';

        $fp = @stream_socket_client($remote, $errNo, $errStr, $timeout);

        if (! $fp) {
            return ['ok' => false, 'message' => "Unable to connect to {$host}:{$port} - $errStr ($errNo)"];
        }

        stream_set_timeout($fp, $timeout);

        $banner = $this->smtpRead($fp);
        if (! $banner) {
            return ['ok' => false, 'message' => 'SMTP server returned no banner'];
        }

        $this->smtpWrite($fp, "EHLO localhost\r\n");
        $ehlo = $this->smtpRead($fp);

        // STARTTLS
        if (stripos($ehlo, 'STARTTLS') !== false && $encryption === 'tls') {
            $this->smtpWrite($fp, "STARTTLS\r\n");
            $resp = $this->smtpRead($fp);

            if (! preg_match('/^220/', $resp)) {
                fclose($fp);
                return ['ok' => false, 'message' => "STARTTLS refused: $resp"];
            }

            stream_socket_enable_crypto($fp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);

            $this->smtpWrite($fp, "EHLO localhost\r\n");
            $ehlo = $this->smtpRead($fp);
        }

        // AUTH
        if (! empty($username)) {
            $this->smtpWrite($fp, "AUTH LOGIN\r\n");
            $ask = $this->smtpRead($fp);

            $this->smtpWrite($fp, base64_encode($username) . "\r\n");
            $ask2 = $this->smtpRead($fp);

            $this->smtpWrite($fp, base64_encode($password) . "\r\n");
            $auth = $this->smtpRead($fp);

            if (! preg_match('/235/', $auth)) {
                return ['ok' => false, 'message' => "Authentication failed: $auth"];
            }
        }

        $this->smtpWrite($fp, "QUIT\r\n");
        fclose($fp);

        return ['ok' => true, 'message' => trim($banner)];
    }

    private function smtpRead($fp)
    {
        $data = '';
        while (($line = fgets($fp, 515)) !== false) {
            $data .= $line;
            if (preg_match('/^\d{3}\s/', $line)) {
                break;
            }

        }
        return $data ?: false;
    }

    private function smtpWrite($fp, $cmd)
    {
        fwrite($fp, $cmd);
    }

    /**
     * ======================================================
     * TEST RECAPTCHA KEYS
     * ======================================================
     */
    public function testRecaptcha()
    {
        $secret = config('services.recaptcha.secret_key');

        if (! $secret) {
            return response()->json([
                'status'  => 'danger',
                'message' => 'reCAPTCHA secret key is not set.',
            ], 422);
        }

        $response = Http::asForm()->post(
            "https://www.google.com/recaptcha/api/siteverify",
            ['secret' => $secret, 'response' => 'dummy']
        );

        if ($response->json('error-codes')) {
            return response()->json([
                'status'  => 'success',
                'message' => 'reCAPTCHA secret key is valid ✔',
            ]);
        }

        return response()->json([
            'status'  => 'danger',
            'message' => 'Unable to verify reCAPTCHA key.',
        ], 422);
    }



    // public function update(Request $request)
    // {
    //         $group = $request->route('group');
    //         if ($group === 'banners') {
    //             $settings = Setting::where('group', 'banners')->where('key', 'homepage')->first();
    //             $banners = json_decode($settings->value, 1);
    //             // $banners = [
    //             //     'banner_one' => [
    //             //         'banner_url' => '#',
    //             //         'banner_image' => null,
    //             //         'status' => 1,
    //             //     ],
    //             //     'banner_two' => [
    //             //         'banners' => [],
    //             //         'status' => 1,
    //             //     ],
    //             //     'banner_three' => [
    //             //         'banner_url' => '#',
    //             //         'banner_image' => null,
    //             //         'status' => 1,
    //             //     ],
    //             // ];
    //             // Banner 1
    //             if ($request->hasFile('banner_one_image')) {
    //                 $path = $request->file('banner_one_image')->store('uploads', 'public');
    //                 $banners['banner_one']['banner_image'] = $path;
    //             }

    //             $banners['banner_one']['banner_url'] = $request->banner_one_url;

    //             // Banner 2
    //             // $banners['banner_two']['banners'] = [];
    //             for ($i = 0; $i <= 1; $i++) {
    //                 $imgField = 'banner_two_image_' . $i;
    //                 $urlField = 'banner_two_url_' . $i;
    //                 if ($request->hasFile($imgField)) {
    //                     $path = $request->file($imgField)->store('uploads', 'public');
    //                     $banners['banner_two']['banners'][$i] = [
    //                         'banner_image' => $path,
    //                     ];
    //                 }
    //                 $banners['banner_two']['banners'][$i]['banner_url'] = $request->$urlField;
    //             }
    //             // Banner 3
    //             if ($request->hasFile('banner_three_image')) {
    //                 $path = $request->file('banner_three_image')->store('uploads', 'public');
    //                 $banners['banner_three']['banner_image'] = $path;
    //             }
    //             $banners['banner_three']['banner_url'] = $request->banner_three_url;

    //             $banners['banner_one']['status'] = $request->has('banner_one_status') ? 1 : 0;
    //             $banners['banner_two']['status'] = $request->has('banner_two_status') ? 1 : 0;
    //             $banners['banner_three']['status'] = $request->has('banner_three_status') ? 1 : 0;

    //             Setting::where('group', 'banners')->where('key', 'homepage')->update(['value' => json_encode($banners)]);
    //         } elseif ($group === 'footer') {
    //             // Footer grid menus with editable titles
    //             $grid2 = $request->input('grid_2_menus', []);
    //             $grid3 = $request->input('grid_3_menus', []);
    //             $grid2_title = $request->input('grid_2_title', 'Quick Links');
    //             $grid3_title = $request->input('grid_3_title', 'Resources');
    //             $footer_grid_2_menus = json_encode([
    //                 'title' => $grid2_title,
    //                 'menus' => array_values(array_filter($grid2, function($item) {
    //                     return !empty($item['name']) && !empty($item['url']);
    //                 })),
    //             ]);
    //             $footer_grid_3_menus = json_encode([
    //                 'title' => $grid3_title,
    //                 'menus' => array_values(array_filter($grid3, function($item) {
    //                     return !empty($item['name']) && !empty($item['url']);
    //                 })),
    //             ]);
    //             Setting::where('group', 'footer')->where('key', 'grid_2_menus')->update(['value' => $footer_grid_2_menus]);
    //             Setting::where('group', 'footer')->where('key', 'grid_3_menus')->update(['value' => $footer_grid_3_menus]);

    //             Setting::where('group', 'footer')->where('key', 'about')->update(['value' => $request->about]);
    //             Setting::where('group', 'footer')->where('key', 'address')->update(['value' => $request->address]);
    //             Setting::where('group', 'footer')->where('key', 'copyright')->update(['value' => $request->copyright]);

    //             if ($request->hasFile('logo')) {
    //                 $path = $request->file('logo')->store('uploads', 'public');
    //                 Setting::where('group', 'footer')->where('key', 'logo')->update(['value' => $path]);
    //             }
    //         } elseif ($group === 'social') {
    //             $links = $request->input('social_links', []);
    //             $links = array_values(array_filter($links, function($item) {
    //                 return !empty($item['title']) && !empty($item['url']);
    //             }));
    //             Setting::where('group', 'social')->where('key', 'links')->update(['value' => json_encode($links)]);
    //         } else {
    //             foreach ($request->except('_token') as $key => $value) {
    //                 Setting::where('key', $key)->update(['value' => $value]);
    //             }
    //         }

    //         Artisan::call('config:clear');
    //         Artisan::call('cache:clear');
    //         return redirect()->back()->with('success', 'Settings updated successfully.');
    // }

}
