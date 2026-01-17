<?php
namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::truncate();

        // // ----------------------------
        // // SLIDERS
        // // ----------------------------
        // $homepage_sliders = json_encode([
        //     [
        //         'title'     => 'Connect Seamlessly With',
        //         'sub-title' => 'Next-Gen Networking Solutions',
        //         'btn-text'  => 'Explore Our Solutions',
        //         'btn-link'  => '#',
        //         'img-path'  => 'assets/img/frontline/network-solutions-slider.jpg',
        //     ],
        //     [
        //         'title'     => 'Power Your Business With',
        //         'sub-title' => 'Reliable UPS Backup Systems',
        //         'btn-text'  => 'See Our Products',
        //         'btn-link'  => '#',
        //         'img-path'  => 'assets/img/frontline/ups-1.jpg',
        //     ],
        //     [
        //         'title'     => 'Empower Your Growth With',
        //         'sub-title' => 'Trusted Technology Partners',
        //         'btn-text'  => 'View Our Brands',
        //         'btn-link'  => '#',
        //         'img-path'  => 'assets/img/frontline/it-infra.jpg',
        //     ],
        // ]);

        // // ----------------------------
        // // FOOTER MENUS & SOCIAL LINKS
        // // ----------------------------
        // $footer_social = json_encode([
        //     ['title' => 'facebook', 'icon' => 'fab fa-facebook-f', 'url' => 'https://facebook.com'],
        //     ['title' => 'twitter', 'icon' => 'fab fa-twitter', 'url' => 'https://twitter.com'],
        //     ['title' => 'linkedin', 'icon' => 'fab fa-linkedin-in', 'url' => 'https://linkedin.com'],
        //     ['title' => 'instagram', 'icon' => 'fab fa-instagram', 'url' => 'https://instagram.com'],
        // ]);

        // $footer_grid_2_menus = json_encode([
        //     'title' => 'Quick Links',
        //     'menus' => [
        //         ['name' => 'Home', 'url' => '/'],
        //         ['name' => 'About', 'url' => '/about'],
        //         ['name' => 'Solutions', 'url' => '/solutions'],
        //         ['name' => 'Services', 'url' => '/services'],
        //     ],
        // ]);

        // $footer_grid_3_menus = json_encode([
        //     'title' => 'Resources',
        //     'menus' => [
        //         ['name' => 'Privacy Policy', 'url' => '/privacy-policy'],
        //         ['name' => 'Terms & Conditions', 'url' => '/terms'],
        //         ['name' => 'Support', 'url' => '/support'],
        //         ['name' => 'Contact', 'url' => '/contact'],
        //     ],
        // ]);

        // // ----------------------------
        // // MAIN SETTINGS INSERT
        // // ----------------------------
        // DB::table('settings')->insert([

        //     // GENERAL
        //     [
        //         'group' => 'general',
        //         'key'   => 'site_title',
        //         'value' => 'Team Frontline',
        //     ],
        //     [
        //         'group' => 'general',
        //         'key'   => 'site_tagline',
        //         'value' => 'Your IT Power Partner',
        //     ],
        //     [
        //         'group' => 'general',
        //         'key'   => 'site_logo',
        //         'value' => 'assets/logo.svg',
        //     ],
        //     [
        //         'group' => 'general',
        //         'key'   => 'site_favicon',
        //         'value' => 'assets/favicon-32x32.png',
        //     ],
        //     [
        //         'group' => 'general',
        //         'key'   => 'theme_color',
        //         'value' => '#B60A6E',
        //     ],
        //     [
        //         'group' => 'general',
        //         'key'   => 'currency_icon',
        //         'value' => '₹',
        //     ],
        //     [
        //         'group' => 'general',
        //         'key'   => 'timezone',
        //         'value' => 'Asia/Kolkata',
        //     ],
        //     [
        //         'group' => 'general',
        //         'key'   => 'layout',
        //         'value' => 'LTR',
        //     ],
        //     [
        //         'group' => 'general',
        //         'key'   => 'contact_email',
        //         'value' => 'info@teamfrontline.com',
        //     ],
        //     [
        //         'group' => 'general',
        //         'key'   => 'contact_phone',
        //         'value' => '+91 99999 99999',
        //     ],
        //     [
        //         'group' => 'general',
        //         'key'   => 'address',
        //         'value' => '1234 Street Name, City, State, India',
        //     ],

        //     // APPEARANCE
        //     [
        //         'group' => 'appearance',
        //         'key'   => 'theme_mode',
        //         'value' => 'light',
        //     ],
        //     [
        //         'group' => 'appearance',
        //         'key'   => 'header_logo',
        //         'value' => 'assets/logo.svg',
        //     ],
        //     [
        //         'group' => 'appearance',
        //         'key'   => 'footer_logo',
        //         'value' => 'assets/logo-footer.svg',
        //     ],
        //     [
        //         'group' => 'appearance',
        //         'key'   => 'preloader_image',
        //         'value' => 'assets/img/preloader.gif',
        //     ],

        //     // FOOTER
        //     [
        //         'group' => 'footer',
        //         'key'   => 'footer_info',
        //         'value' => json_encode([
        //             'about_us'  => 'Team Frontline delivers integrated IT & Power Solutions for businesses across India.',
        //             'address'   => '1234 Street Name, City, State, Country',
        //             'phone'     => '+91 99999 99999',
        //             'email'     => 'info@teamfrontline.com',
        //             'copyright' => '© ' . date('Y') . ' Team Frontline. All Rights Reserved.',
        //             'grid_2_menus' => json_decode($footer_grid_2_menus),
        //             'grid_3_menus' => json_decode($footer_grid_3_menus),
        //         ]),
        //     ],
        //     [
        //         'group' => 'footer',
        //         'key'   => 'socials',
        //         'value' => $footer_social,
        //     ],

        //     // SLIDERS
        //     [
        //         'group' => 'sliders',
        //         'key'   => 'homepage',
        //         'value' => $homepage_sliders,
        //     ],

        //     // SEO
        //     [
        //         'group' => 'seo',
        //         'key'   => 'homepage',
        //         'value' => json_encode([
        //             'meta_title'       => 'Team Frontline - Power & IT Solutions',
        //             'meta_author'      => 'Team Frontline',
        //             'meta_keywords'    => 'Power Solutions, IT Infrastructure, Networking, Surveillance',
        //             'meta_description' => 'Leading provider of IT & Power Solutions — Networking, UPS, Surveillance & More.',
        //             'meta_image'       => 'assets/img/meta-default.jpg',
        //         ]),
        //     ],

        //     // ANALYTICS
        //     [
        //         'group' => 'analytics',
        //         'key'   => 'google',
        //         'value' => json_encode([
        //             'google_analytics_id' => 'G-XXXXXXXXXX',
        //             'google_tag_manager_id' => 'GTM-XXXXXXX',
        //         ]),
        //     ],

        //     // SOCIALS
        //     [
        //         'group' => 'socials',
        //         'key'   => 'footer_social_links',
        //         'value' => $footer_social,
        //     ],

        //     // PUSHER
        //     [
        //         'group' => 'pusher',
        //         'key'   => 'pusher_settings',
        //         'value' => json_encode([
        //             'pusher_app_id'  => 'your_app_id',
        //             'pusher_key'     => 'your_key',
        //             'pusher_secret'  => 'your_secret',
        //             'pusher_cluster' => 'your_cluster',
        //         ]),
        //     ],

        //     // SMTP
        //     [
        //         'group' => 'smtp',
        //         'key'   => 'mail_settings',
        //         'value' => json_encode([
        //             'mail_mailer'       => 'smtp',
        //             'mail_host'         => 'smtp.mailtrap.io',
        //             'mail_port'         => '2525',
        //             'mail_username'     => 'your_username',
        //             'mail_password'     => 'your_password',
        //             'mail_encryption'   => 'tls',
        //             'mail_from_address' => 'noreply@teamfrontline.com',
        //             'mail_from_name'    => 'Team Frontline',
        //         ]),
        //     ],

        //     // INTEGRATIONS
        //     [
        //         'group' => 'integrations',
        //         'key'   => 'chat_widget',
        //         'value' => json_encode([
        //             'enabled' => true,
        //             'provider' => 'tawk.to',
        //             'script' => '<script>/* Your chat widget here */</script>',
        //         ]),
        //     ],
        //     [
        //         'group' => 'integrations',
        //         'key'   => 'payment_gateway',
        //         'value' => json_encode([
        //             'provider' => 'razorpay',
        //             'key_id' => 'rzp_test_xxxxxxx',
        //             'key_secret' => 'xxxxxxxxx',
        //             'currency' => 'INR',
        //         ]),
        //     ],

        //     // SECURITY
        //     [
        //         'group' => 'security',
        //         'key'   => 'recaptcha',
        //         'value' => json_encode([
        //             'enabled' => true,
        //             'site_key' => 'your_site_key',
        //             'secret_key' => 'your_secret_key',
        //         ]),
        //     ],
        //     [
        //         'group' => 'security',
        //         'key'   => 'two_factor_auth',
        //         'value' => json_encode([
        //             'enabled' => false,
        //         ]),
        //     ],
        // ]);

        $footer_grid_2_menus = json_encode([
            'title' => 'Quick Links',
            'menus' => [
                ['name' => 'Home', 'url' => '/'],
                ['name' => 'About', 'url' => '/about'],
                ['name' => 'Solutions', 'url' => '/solutions'],
                ['name' => 'Services', 'url' => '/services'],
            ],
        ]);

        $footer_grid_3_menus = json_encode([
            'title' => 'Resources',
            'menus' => [
                ['name' => 'Privacy Policy', 'url' => '/privacy-policy'],
                ['name' => 'Terms & Conditions', 'url' => '/terms'],
                ['name' => 'Support', 'url' => '/support'],
                ['name' => 'Contact', 'url' => '/contact'],
            ],
        ]);

        $homepageSliders = json_encode([
            [
                'title'     => 'Connect Seamlessly With',
                'sub_title' => 'Next-Gen Networking Solutions',
                'btn_text'  => 'Explore Our Solutions',
                'btn_link'  => '#',
                'img_path'  => 'assets/img/frontline/network-solutions-slider.jpg',
                'status'    => 1,
            ],
            [
                'title'     => 'Power Your Business With',
                'sub_title' => 'Reliable UPS Backup Systems',
                'btn_text'  => 'See Our Products',
                'btn_link'  => '#',
                'img_path'  => 'assets/img/frontline/ups-1.jpg',
                'status'    => 1,
            ],
            [
                'title'     => 'Empower Your Growth With',
                'sub_title' => 'Trusted Technology Partners',
                'btn_text'  => 'View Our Brands',
                'btn_link'  => '#',
                'img_path'  => 'assets/img/frontline/it-infra.jpg',
                'status'    => 1,
            ],
        ]);

        $homepageBanners = json_encode([
            'banner_one'   => [
                'banner_url'   => '#',
                'banner_image' => 'uploads/media_644cf1a03b212.png',
                'status'       => 1,
            ],
            'banner_two'   => [
                'banners' => [
                    [
                        'banner_url'   => '#',
                        'banner_image' => 'uploads/media_644ce7818d45e.png',
                    ],
                    [
                        'banner_url'   => '#',
                        'banner_image' => 'uploads/media_644ce7818d45e.png',
                    ],
                ],
                'status'  => 1,
            ],
            'banner_three' => [
                'banner_url'   => '#',
                'banner_image' => 'uploads/media_644ce82555973.png',
                'status'       => 1,
            ],
        ]);

        $footerSocials = json_encode([
            [
                'title' => 'Facebook',
                'icon'  => 'fab fa-facebook-f',
                'url'   => 'https://facebook.com/teamfrontline',
            ],
            [
                'title' => 'LinkedIn',
                'icon'  => 'fab fa-linkedin-in',
                'url'   => 'https://linkedin.com/company/teamfrontline',
            ],
            [
                'title' => 'Instagram',
                'icon'  => 'fab fa-instagram',
                'url'   => 'https://instagram.com/teamfrontline',
            ],
        ]);

        $settings = [
            // 🔹 GENERAL
            ['group' => 'general', 'key' => 'site_name', 'value' => 'Team Frontline', 'status' => 1],
            ['group' => 'general', 'key' => 'site_email', 'value' => 'info@teamfrontline.com', 'status' => 1],
            ['group' => 'general', 'key' => 'site_phone', 'value' => '+91-484-2400631', 'status' => 1],
            ['group' => 'general', 'key' => 'address', 'value' => 'Team Frontline Ltd., Kochi, Kerala, India', 'status' => 1],
            ['group' => 'general', 'key' => 'currency_icon', 'value' => '₹', 'status' => 1],
            ['group' => 'general', 'key' => 'time_zone', 'value' => 'Asia/Kolkata', 'status' => 1],

            // 🔹 APPEARANCE
            ['group' => 'appearance', 'key' => 'theme_color', 'value' => '#B60A6E', 'status' => 1],
            ['group' => 'appearance', 'key' => 'theme_color2', 'value' => '#FFB1DF', 'status' => 1],
            ['group' => 'appearance', 'key' => 'bg_smoke', 'value' => '#FFB1DF', 'status' => 1],
            ['group' => 'appearance', 'key' => 'bg_smoke2', 'value' => '#FFE9F5', 'status' => 1],
            ['group' => 'appearance', 'key' => 'logo_light', 'value' => 'assets/logo-light.svg', 'status' => 1],
            ['group' => 'appearance', 'key' => 'logo_dark', 'value' => 'assets/logo.svg', 'status' => 1],
            ['group' => 'appearance', 'key' => 'favicon', 'value' => 'assets/favicon-32x32.png', 'status' => 1],

            // 🔹 MAIL
            ['group' => 'mail', 'key' => 'mail_mailer', 'value' => 'smtp', 'status' => 1],
            ['group' => 'mail', 'key' => 'mail_host', 'value' => 'smtp.mailtrap.io', 'status' => 1],
            ['group' => 'mail', 'key' => 'mail_port', 'value' => '2525', 'status' => 1],
            ['group' => 'mail', 'key' => 'mail_username', 'value' => 'your_username', 'status' => 1],
            ['group' => 'mail', 'key' => 'mail_password', 'value' => 'your_password', 'status' => 1],
            ['group' => 'mail', 'key' => 'mail_encryption', 'value' => 'tls', 'status' => 1],
            ['group' => 'mail', 'key' => 'mail_from_address', 'value' => 'no-reply@teamfrontline.com', 'status' => 1],
            ['group' => 'mail', 'key' => 'mail_from_name', 'value' => 'Team Frontline', 'status' => 1],

            // 🔹 PUSHER
            ['group' => 'pusher', 'key' => 'pusher_key', 'value' => 'your_pusher_key', 'status' => 1],
            ['group' => 'pusher', 'key' => 'pusher_secret', 'value' => 'your_pusher_secret', 'status' => 1],
            ['group' => 'pusher', 'key' => 'pusher_app_id', 'value' => 'your_pusher_app_id', 'status' => 1],
            ['group' => 'pusher', 'key' => 'pusher_cluster', 'value' => 'ap2', 'status' => 1],

            // 🔹 SEO
            // ['group' => 'seo', 'key' => 'meta_title', 'value' => 'Team Frontline - Power & IT Solutions', 'status' => 1],
            // ['group' => 'seo', 'key' => 'meta_description', 'value' => 'Leading provider of Power, Data Centre, Networking, and IT solutions.', 'status' => 1],
            // ['group' => 'seo', 'key' => 'meta_keywords', 'value' => 'Power Solutions, IT Infrastructure, Networking, Data Centre', 'status' => 1],

            // SEO
            [
                'group'  => 'seo',
                'key'    => 'default',
                'value'  => json_encode([
                    'meta_title'       => 'Team Frontline - Power & IT Solutions',
                    'meta_author'      => 'Team Frontline',
                    'meta_keywords'    => 'Power Solutions, IT Infrastructure, Networking, Data Centre',
                    'meta_description' => 'Leading provider of Power, Data Centre, Networking, and IT solutions',
                    'meta_image'       => 'assets/img/meta-default.jpg',
                ]),
                'status' => 1,
            ],
            [
                'group'  => 'seo',
                'key'    => 'homepage',
                'value'  => json_encode([
                    'meta_title'       => 'Team Frontline - Power & IT Solutions',
                    'meta_author'      => 'Team Frontline',
                    'meta_keywords'    => 'Power Solutions, IT Infrastructure, Networking, Surveillance',
                    'meta_description' => 'Leading provider of IT & Power Solutions — Networking, UPS, Surveillance & More.',
                    'meta_image'       => 'assets/img/meta-default.jpg',
                ]),
                'status' => 1,
            ],
            // 🔹 SOCIAL
            ['group' => 'social', 'key' => 'links', 'value' => $footerSocials, 'status' => 1],

            // 🔹 SLIDERS
            ['group' => 'sliders', 'key' => 'homepage', 'value' => $homepageSliders, 'status' => 1],

            // 🔹 BANNERS
            ['group' => 'banners', 'key' => 'homepage', 'value' => $homepageBanners, 'status' => 1],

            // 🦶 Footer Info
            ['group' => 'footer', 'key' => 'about', 'value' => 'Team Frontline is a leading IT and Power Solutions provider in Kerala, offering comprehensive technology solutions since 1995.', 'status' => 1],
            ['group' => 'footer', 'key' => 'address', 'value' => '1234 Street Name, City, State, Country', 'status' => 1],
            ['group' => 'footer', 'key' => 'grid_2_menus', 'value' => $footer_grid_2_menus, 'status' => 1],
            ['group' => 'footer', 'key' => 'grid_3_menus', 'value' => $footer_grid_3_menus, 'status' => 1],
            ['group' => 'footer', 'key' => 'copyright', 'value' => '© ' . date('Y') . ' Team Frontline. All rights reserved.', 'status' => 1],
            ['group' => 'footer', 'key' => 'logo', 'value' => 'assets/logo-light.svg', 'status' => 1],

            // INTEGRATIONS
            [
                'group'  => 'integrations',
                'key'    => 'chat_widget',
                'value'  => json_encode([
                    'enabled'  => true,
                    'provider' => 'tawk.to',
                    'script'   => '<script>/* Your chat widget here */</script>',
                ]),
                'status' => 1,
            ],
            [
                'group'  => 'integrations',
                'key'    => 'payment_gateway',
                'value'  => json_encode([
                    'provider'   => 'razorpay',
                    'key_id'     => 'rzp_test_xxxxxxx',
                    'key_secret' => 'xxxxxxxxx',
                    'currency'   => 'INR',
                ]),
                'status' => 1,
            ],

            // SECURITY
            [
                'group'  => 'security',
                'key'    => 'recaptcha',
                'value'  => json_encode([
                    'enabled'    => true,
                    'site_key'   => 'your_site_key',
                    'secret_key' => 'your_secret_key',
                ]),
                'status' => 1,
            ],
            [
                'group'  => 'security',
                'key'    => 'two_factor_auth',
                'value'  => json_encode([
                    'enabled' => false,
                ]),
                'status' => 1,
            ],
            // ANALYTICS
            [
                'group'  => 'analytics',
                'key'    => 'google',
                'value'  => json_encode([
                    'google_analytics_id'   => 'G-XXXXXXXXXX',
                    'google_tag_manager_id' => 'GTM-XXXXXXX',
                ]),
                'status' => 1,
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['group' => $setting['group'], 'key' => $setting['key']],
                ['value' => $setting['value'], 'status' => $setting['status']]
            );
        }
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
    }
}
