<?php
namespace App\Http\Controllers\Frontend;

use App\Helper\SeoHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Solution;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $banner          = $request->banner;
        $popularCategory = [];
        // $brands           = Brand::where('status', 1)->where('is_featured', 1)->get();
        $featuredProducts = Product::with('brand')
            ->where('is_featured', true)
            ->where('status', 1)
            ->latest()
            ->take(20)
            ->get();
        $featuredProduct = Product::with('brand')
            ->where('is_featured', true)
            ->where('status', 1)
            ->latest()
            ->first();
        $popularCategories = false;
        // $popularCategories = Category::withCount('products')
        // ->where('status', 1)
        // ->whereNull('parent_id')
        // ->take(10)
        // ->get();
        $topCategories = false;
        // $topCategories = Category::with(['products' => fn($q) => $q->where('is_featured', 1)->take(6)])
        //     ->where('status', 1)
        //     ->whereNull('parent_id')
        //     ->get();

        $typeBaseProducts                  = $this->getTypeBaseProduct();
        $categoryProductSliderSectionOne   = false;
        $categoryProductSliderSectionTwo   = false;
        $categoryProductSliderSectionThree = false;

        // banners
        $settings = Setting::where('status', 1)->where('group', 'homepage')->pluck('value', 'key')->toArray();

        $recentBlogs = Blog::with(['category', 'user'])->where('status', 1)->orderBy('id', 'DESC')->take(8)->get();

        $solutions = Solution::where('status', 1)
            ->take(10)
            ->get();
        $services = Service::where('status', 1)
            ->take(10)
            ->get();
        (new SeoHelper())->setSeoTags('home');

        return view('frontend.home.home',
            compact(
                'popularCategory',
                'featuredProducts',
                'featuredProduct',
                'popularCategories',
                'topCategories',
                // 'brands',
                'typeBaseProducts',
                'categoryProductSliderSectionOne',
                'categoryProductSliderSectionTwo',
                'categoryProductSliderSectionThree',
                'settings',
                'recentBlogs',
                'solutions',
                'services',
                'banner'

            ));
    }

    public function getTypeBaseProduct()
    {
        $typeBaseProducts = [];

        $typeBaseProducts['new_arrival'] = Product::with(['variants', 'category', 'productImageGalleries'])
            ->where(['product_type' => 'new_arrival', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['featured_product'] = Product::with(['variants', 'category', 'productImageGalleries'])
            ->where(['product_type' => 'featured_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['top_product'] = Product::with(['variants', 'category', 'productImageGalleries'])
            ->where(['product_type' => 'top_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['best_product'] = Product::with(['variants', 'category', 'productImageGalleries'])
            ->where(['product_type' => 'best_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();

        return $typeBaseProducts;
    }

    public function vendorPage()
    {
        $vendors = Vendor::where('status', 1)->paginate(20);
        return view('frontend.pages.vendor', compact('vendors'));
    }

    public function vendorProductsPage(string $id)
    {

        $products = Product::where(['status' => 1, 'is_approved' => 1, 'vendor_id' => $id])->orderBy('id', 'DESC')->paginate(12);

        $categories = Category::where(['status' => 1])->get();
        $brands     = Brand::where(['status' => 1])->get();
        $vendor     = Vendor::findOrFail($id);

        return view('frontend.pages.vendor-product', compact('products', 'categories', 'brands', 'vendor'));

    }

    public function ShowProductModal(string $id)
    {
        $product = Product::findOrFail($id);

        $content = view('frontend.layouts.modal', compact('product'))->render();

        return Response::make($content, 200, ['Content-Type' => 'text/html']);
    }
}
