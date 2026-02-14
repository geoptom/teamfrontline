<?php
namespace App\Http\Controllers\Frontend;

use App\Helper\SeoHelper;
use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Models\About;
use App\Models\ContactMessage;
use App\Models\Page;
use App\Models\Solution;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

        if (config('services.recaptcha.enable')) {
            $verify = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => config('services.recaptcha.secret_key'),
                'response' => $request->recaptcha_token,
            ]);

            if (! $verify->json('success') || $verify->json('score') < 0.5) {
                return response()->json([
                    'status' => 'error',
                    'errors' => ['recaptcha' => 'Failed Google reCAPTCHA verification'],
                ]);
            }
        }

        $request->validate([
            'name'    => ['required', 'max:200'],
            'number'  => ['required', 'max:200'],
            'email'   => ['required', 'email'],
            'subject' => ['required', 'max:200'],
            'message' => ['required', 'max:1000'],
        ]);

        $message = ContactMessage::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->number,
            'message'    => $request->message,
            'subject'    => $request->subject,
            'ip_address' => $request->ip(),
        ]);


        if (config('contact.forward_enabled')) {
            foreach (config('contact.forward_to') as $email) {
                // Mail::to($email)->send(new ContactMessageMail($message));
                Mail::to($email)->send(new Contact($message));
            }
        }


        return response()->json([
            'status'  => 'success',
            'message' => 'Thank you! Your message has been received.',
        ]);

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
