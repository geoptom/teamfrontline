<?php
namespace App\Http\Controllers\Frontend;

use App\Helper\SeoHelper;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('status', true)->latest()->get();
        (new SeoHelper())->setSeoTags('services.index');

        return view('frontend.services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->where('status', true)->firstOrFail();
        $seo     = new SeoHelper();

        $seo->setSeoTags('services.show', [
            'title'       => $service->title . ' | TeamFrontline',
            'description' => $service->short_description,
            'keywords'    => [$service->title],
        ]);

        $seo->addBreadcrumbSchema([
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services.index')],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $service->title, 'item' => url()->current()],
        ]);

        return view('frontend.services.show', compact('service'));
    }
}
