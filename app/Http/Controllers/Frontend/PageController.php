<?php
namespace App\Http\Controllers\Frontend;

use App\Helper\SeoHelper;
use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Models\About;
use App\Models\EmailConfiguration;
use App\Models\Page;
use App\Models\Solution;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    // public function about()
    // {
    //     $about = About::first();
    //     return view('frontend.pages.about', compact('about'));
    // }
    public function about(Request $request)
    {
        (new SeoHelper())->setSeoTags('about');

        return view('frontend.pages.about');
    }

    public function termsAndCondition()
    {
        $terms = TermsAndCondition::first();
        return view('frontend.pages.terms-and-condition', compact('terms'));
    }

    public function contact()
    {
        $solutions = Solution::where('status', 1)->select('title')->get();
        (new SeoHelper)->setSeoTags('contact');
        return view('frontend.pages.contact', compact('solutions'));
    }

    public function handleContactForm(Request $request)
    {
        $request->validate([
            'name'    => ['required', 'max:200'],
            'email'   => ['required', 'email'],
            'subject' => ['required', 'max:200'],
            'message' => ['required', 'max:1000'],
        ]);

        $setting = EmailConfiguration::first();

        Mail::to($setting->email)->send(new Contact($request->subject, $request->message, $request->email));

        return response(['status' => 'success', 'message' => 'Mail sent successfully!']);

    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->where('is_visible', 1)->firstOrFail();

        $seo = new SeoHelper();

        $seo->setSeoTags('page.show', [
            'title'       => $page->title . ' | TeamFrontline',
            'description' => $page->seo_description ?? $page->excerpt,
        ]);

        $seo->addBreadcrumbSchema([
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => $page->title, 'item' => url()->current()],
        ]);

        return view('frontend.pages.show', compact('page'));
    }
}
