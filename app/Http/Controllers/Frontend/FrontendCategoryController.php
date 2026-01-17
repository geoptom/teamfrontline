<?php
namespace App\Http\Controllers\Frontend;

use App\Helper\SeoHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontendCategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        // Get subcategories
        $subcategories = Category::where('parent_id', $category->id)
            ->where('status', 1)
            ->orderBy('position')
            ->get();

        // If this category has no subcategories, show its products
        // $products = collect();
        // if ($subcategories->isEmpty()) {
        $products = $category->products()->where('status', 1)->paginate(12);
        // }

        $seo = new SeoHelper();

        $seo->setSeoTags('products.category', [
            'title'       => $category->name . ' | TeamFrontline',
            'description' => strip_tags($category->description),
            'keywords'    => [$category->name],
        ]);

        $seo->addBreadcrumbSchema([
            [
                '@type'    => 'ListItem',
                'position' => 1,
                'name'     => 'Home',
                'item'     => url('/'),
            ],
            [
                '@type'    => 'ListItem',
                'position' => 2,
                'name'     => $category->name,
                'item'     => url()->current(),
            ],
        ]);

        return view('frontend.categories.show', compact('category', 'subcategories', 'products'));
    }
}
