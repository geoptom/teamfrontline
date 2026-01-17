<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SliderController extends Controller
{
    /* ----------------------------------------------------------
     | Utility: Upload Image
     ---------------------------------------------------------- */
    private function uploadImage(Request $request, string $key, $oldPath = null)
    {
        if (!$request->hasFile($key)) {
            return $oldPath; // Keep old image
        }

        $file = $request->file($key);
        $filename = 'slider_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('sliders', $filename, 'public');

        return 'storage/' . $path;
    }


    /* ----------------------------------------------------------
     | List Sliders
     ---------------------------------------------------------- */
    public function index()
    {
        $setting = Setting::where('group', 'sliders')->where('key', 'homepage')->first();
        $sliders = $setting ? json_decode($setting->value, true) ?? [] : [];

        return view('admin.slider.index', compact('sliders'));
    }


    /* ----------------------------------------------------------
     | Create Form
     ---------------------------------------------------------- */
    public function create()
    {
        return view('admin.slider.create');
    }


    /* ----------------------------------------------------------
     | Store New Slider (with 3-image support)
     ---------------------------------------------------------- */
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'nullable',
            'sub_title'  => 'nullable',
            'btn_text'   => 'nullable',
            'btn_link'   => 'nullable',
            'img_desktop' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'img_tablet'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'img_mobile'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'     => 'required|in:0,1',
        ]);

        $setting = Setting::where('group', 'sliders')->where('key', 'homepage')->first();
        $sliders = $setting ? json_decode($setting->value, true) ?? [] : [];

        // Upload image files
        $imgDesktop = $this->uploadImage($request, 'img_desktop');
        $imgTablet  = $this->uploadImage($request, 'img_tablet', $imgDesktop);
        $imgMobile  = $this->uploadImage($request, 'img_mobile', $imgDesktop);

        $sliders[] = [
            'title'        => $request->title,
            'sub_title'    => $request->sub_title,
            'btn_text'     => $request->btn_text,
            'btn_link'     => $request->btn_link,
            'img_desktop'  => $imgDesktop,
            'img_tablet'   => $imgTablet,
            'img_mobile'   => $imgMobile,
            'status'       => (int)$request->status,
        ];

        // Save
        if ($setting) {
            $setting->value = json_encode($sliders);
            $setting->save();
        } else {
            Setting::create([
                'group' => 'sliders',
                'key'   => 'homepage',
                'value' => json_encode($sliders),
                'status' => 1,
            ]);
        }

        Artisan::call('cache:clear');

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider added successfully!');
    }


    /* ----------------------------------------------------------
     | Edit Form
     ---------------------------------------------------------- */
    public function edit($index)
    {
        $setting = Setting::where('group', 'sliders')->where('key', 'homepage')->first();
        $sliders = $setting ? json_decode($setting->value, true) ?? [] : [];

        if (!isset($sliders[$index])) {
            abort(404);
        }

        $slider = $sliders[$index];
        $sliderIndex = $index;

        return view('admin.slider.edit', compact('slider', 'sliderIndex'));
    }


    /* ----------------------------------------------------------
     | Update Slider (with 3-image support)
     ---------------------------------------------------------- */
    public function update(Request $request, $index)
    {
        $request->validate([
            'title'      => 'nullable',
            'sub_title'  => 'nullable',
            'btn_text'   => 'nullable',
            'btn_link'   => 'nullable',
            'img_desktop' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'img_tablet'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'img_mobile'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'     => 'required|in:0,1',
        ]);

        $setting = Setting::where('group', 'sliders')->where('key', 'homepage')->first();
        $sliders = $setting ? json_decode($setting->value, true) ?? [] : [];

        if (!isset($sliders[$index])) {
            abort(404);
        }

        $old = $sliders[$index];

        // Upload updated files or keep old
        $desktop = $this->uploadImage($request, 'img_desktop', $old['img_desktop'] ?? ($old['img_path'] ?? null));
        $tablet  = $this->uploadImage($request, 'img_tablet',  $old['img_tablet']  ?? $desktop);
        $mobile  = $this->uploadImage($request, 'img_mobile',  $old['img_mobile']  ?? $desktop);

        $sliders[$index] = [
            'title'        => $request->title,
            'sub_title'    => $request->sub_title,
            'btn_text'     => $request->btn_text,
            'btn_link'     => $request->btn_link,
            'img_desktop'  => $desktop,
            'img_tablet'   => $tablet,
            'img_mobile'   => $mobile,
            'status'       => (int)$request->status,
        ];

        $setting->value = json_encode($sliders);
        $setting->save();

        Artisan::call('cache:clear');

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider updated successfully!');
    }


    /* ----------------------------------------------------------
     | Delete Slider
     ---------------------------------------------------------- */
    public function destroy($index)
    {
        $setting = Setting::where('group', 'sliders')->where('key', 'homepage')->first();
        $sliders = $setting ? json_decode($setting->value, true) ?? [] : [];

        if (!isset($sliders[$index])) {
            abort(404);
        }

        array_splice($sliders, $index, 1);

        $setting->value = json_encode($sliders);
        $setting->save();

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider deleted successfully!');
    }
}
