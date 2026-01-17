<?php
namespace App\Http\Controllers\Frontend;

use App\Helper\SeoHelper;
use App\Http\Controllers\Controller;
use App\Models\Solution;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::active()->latest()->paginate(12);
        (new SeoHelper())->setSeoTags('solutions.index');
        return view('frontend.solutions.index', compact('solutions'));
    }

    public function show($slug)
    {
        $solution = Solution::where('slug', $slug)->firstOrFail();

        $seo = new SeoHelper();

        $seo->setSeoTags('solutions.show', [
            'title'       => $solution->title . ' | TeamFrontline',
            'description' => $solution->short_description,
            'keywords'    => [$solution->title],
        ]);

        $seo->addBreadcrumbSchema([
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Solutions', 'item' => route('solutions.index')],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $solution->title, 'item' => url()->current()],
        ]);

        return view('frontend.solutions.show', compact('solution'));
    }
}
