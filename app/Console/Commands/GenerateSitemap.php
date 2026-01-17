<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Solution;
use App\Models\Service;
use App\Models\Page;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap for Taj Polymers website';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // -------------------------------
        // ADD STATIC PAGES
        // -------------------------------
        $staticPages = [
            '/',
            '/about',
            '/contact',
            '/services',
            '/solutions',
            '/products',
            '/terms-and-conditions',
            '/blog',
        ];

        foreach ($staticPages as $path) {
            $sitemap->add(
                Url::create(url($path))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8)
            );
        }

        // -------------------------------
        // PRODUCTS
        // -------------------------------
        Product::where('status', 1)->get()->each(function ($product) use ($sitemap) {
            $sitemap->add(
                Url::create(route('products.show', $product->slug))
                    ->setLastModificationDate($product->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.9)
            );
        });

        // -------------------------------
        // CATEGORIES
        // -------------------------------
        Category::all()->each(function ($category) use ($sitemap) {
            $sitemap->add(
                Url::create(route('category.show', $category->slug))
                    ->setPriority(0.7)
            );
        });

        // -------------------------------
        // BLOG POSTS
        // -------------------------------
        Blog::where('status', 1)->get()->each(function ($blog) use ($sitemap) {
            $sitemap->add(
                Url::create(route('blog-details', $blog->slug))
                    ->setLastModificationDate($blog->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.7)
            );
        });

        // -------------------------------
        // SOLUTIONS
        // -------------------------------
        Solution::where('status', 1)->get()->each(function ($item) use ($sitemap) {
            $sitemap->add(
                Url::create(route('solutions.show', $item->slug))
                    ->setPriority(0.7)
            );
        });

        // -------------------------------
        // SERVICES
        // -------------------------------
        Service::where('status', 1)->get()->each(function ($item) use ($sitemap) {
            $sitemap->add(
                Url::create(route('services.show', $item->slug))
                    ->setPriority(0.7)
            );
        });

        // -------------------------------
        // CMS PAGES
        // -------------------------------
        Page::where('is_visible', 1)->get()->each(function ($page) use ($sitemap) {
            $sitemap->add(
                Url::create(route('pages.show', $page->slug))
                    ->setPriority(0.6)
            );
        });

        // SAVE SITEMAP
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully ✔');
    }
}
