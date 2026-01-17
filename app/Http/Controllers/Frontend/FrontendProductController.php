<?php
namespace App\Http\Controllers\Frontend;

use App\Helper\SeoHelper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendProductController extends Controller
{

    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $brands     = Brand::where('status', 1)->get();
        (new SeoHelper())->setSeoTags('products');

        return view('frontend.products.index', compact('categories', 'brands'));
    }

    public function filter(Request $request)
    {
        $query = Product::with(['category', 'brand'])->where('status', 1);

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->brand) {
            $query->whereHas('brand', fn($q) => $q->where('slug', $request->brand));
        }

        if ($request->price_min) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->price_max) {
            $query->where('price', '<=', $request->price_max);
        }

        if ($request->sort == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        $products = $query->paginate(9);

        if ($request->ajax()) {
            return view('frontend.products.partials.list', compact('products'))->render();
        }

        // If accessed directly (no AJAX)
        $categories = Category::where('status', 1)->get();
        $brands     = Brand::where('status', 1)->get();

        return view('frontend.products.index', compact('products', 'categories', 'brands'));
    }

    public function show($slug)
    {
        $product = Product::with(['category.parent'])
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 1)
            ->take(6)
            ->get();

        $seo = new SeoHelper();

        $seo->setSeoTags('products.show', [
            'title'       => $product->name . ' | TeamFrontline Kerala',
            'description' => $product->seo_description ?: $product->short_description,
            'keywords'    => [$product->name, $product->category->name],
        ]);

        // Product Schema
        JsonLd::setType('Product');
        JsonLd::addValue('name', $product->name);
        JsonLd::addValue('description', $product->short_description);
        JsonLd::addImage(asset($product->mainImage()));
        JsonLd::addValue('brand', $product->brand->name ?? null);

        // Breadcrumb Schema
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
                'name'     => $product->category->name,
                'item'     => route('products.index', ['category' => $product->category->slug]),
            ],
            [
                '@type'    => 'ListItem',
                'position' => 3,
                'name'     => $product->name,
                'item'     => url()->current(),
            ],
        ]);

        return view('frontend.products.show', compact('product', 'relatedProducts'));
    }

    // public function index(Request $request)
    // {
    //     $query = Product::with('category', 'brand', 'images')
    //         ->where('status', 1);

    //     // Search by name
    //     if ($request->filled('search')) {
    //         $query->where('name', 'like', '%' . $request->search . '%');
    //     }

    //     // Filter by category
    //     if ($request->filled('category')) {
    //         $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
    //     }

    //     // Filter by brand
    //     if ($request->filled('brand')) {
    //         $query->whereHas('brand', fn($q) => $q->where('slug', $request->brand));
    //     }

    //     // Price range filter
    //     if ($request->filled('price_min')) {
    //         $query->where('price', '>=', $request->price_min);
    //     }

    //     if ($request->filled('price_max')) {
    //         $query->where('price', '<=', $request->price_max);
    //     }

    //     // Sorting
    //     switch ($request->get('sort')) {
    //         case 'price_asc':
    //             $query->orderBy('price', 'asc');
    //             break;
    //         case 'price_desc':
    //             $query->orderBy('price', 'desc');
    //             break;
    //         default:
    //             $query->latest();
    //             break;
    //     }

    //     $products   = $query->paginate(12)->withQueryString();
    //     $categories = Category::where('status', 1)->get();
    //     $brands     = Brand::where('status', 1)->get();

    //     return view('frontend.pages.product', compact('products', 'categories', 'brands'));
    // }

    // public function show($slug)
    // {
    //     $product = Product::with('category', 'brand', 'images', 'variants.items')
    //         ->where('slug', $slug)
    //         ->firstOrFail();

    //     return view('frontend.pages.product-detail', compact('product'));
    // }

    // public function productsIndex(Request $request)
    // {
    //     if($request->has('category')){
    //         $category = Category::where('slug', $request->category)->firstOrFail();
    //         $products = Product::withAvg('reviews', 'rating')->withCount('reviews')
    //         ->with(['variants', 'category', 'productImageGalleries'])
    //         ->where([
    //             'category_id' => $category->id,
    //             'status' => 1,
    //             'is_approved' => 1
    //         ])
    //         ->when($request->has('range'), function($query) use ($request){
    //             $price = explode(';', $request->range);
    //             $from = $price[0];
    //             $to = $price[1];

    //             return $query->where('price', '>=', $from)->where('price', '<=', $to);
    //         })
    //         ->paginate(12);
    //     }elseif($request->has('subcategory')){
    //         $category = SubCategory::where('slug', $request->subcategory)->firstOrFail();
    //         $products = Product::withAvg('reviews', 'rating')->withCount('reviews')
    //         ->with(['variants', 'category', 'productImageGalleries'])
    //         ->where([
    //             'sub_category_id' => $category->id,
    //             'status' => 1,
    //             'is_approved' => 1
    //         ])
    //         ->when($request->has('range'), function($query) use ($request){
    //             $price = explode(';', $request->range);
    //             $from = $price[0];
    //             $to = $price[1];

    //             return $query->where('price', '>=', $from)->where('price', '<=', $to);
    //         })
    //         ->paginate(12);
    //     }elseif($request->has('childcategory')){
    //         $category = ChildCategory::where('slug', $request->childcategory)->firstOrFail();

    //         $products = Product::withAvg('reviews', 'rating')->withCount('reviews')
    //         ->with(['variants', 'category', 'productImageGalleries'])
    //         ->where([
    //             'child_category_id' => $category->id,
    //             'status' => 1,
    //             'is_approved' => 1
    //         ])
    //         ->when($request->has('range'), function($query) use ($request){
    //             $price = explode(';', $request->range);
    //             $from = $price[0];
    //             $to = $price[1];

    //             return $query->where('price', '>=', $from)->where('price', '<=', $to);
    //         })
    //         ->paginate(12);
    //     }elseif($request->has('brand')){
    //        $brand = Brand::where('slug', $request->brand)->firstOrFail();

    //         $products = Product::withAvg('reviews', 'rating')->withCount('reviews')
    //         ->with(['variants', 'category', 'productImageGalleries'])
    //         ->where([
    //             'brand_id' => $brand->id,
    //             'status' => 1,
    //             'is_approved' => 1
    //         ])
    //         ->when($request->has('range'), function($query) use ($request){
    //             $price = explode(';', $request->range);
    //             $from = $price[0];
    //             $to = $price[1];

    //             return $query->where('price', '>=', $from)->where('price', '<=', $to);
    //         })
    //         ->paginate(12);
    //     }elseif($request->has('search')){
    //         $products = Product::withAvg('reviews', 'rating')->withCount('reviews')
    //         ->with(['variants', 'category', 'productImageGalleries'])
    //         ->where(['status' => 1, 'is_approved' => 1])
    //         ->where(function ($query) use ($request){
    //             $query->where('name', 'like', '%'.$request->search.'%')
    //                 ->orWhere('long_description', 'like', '%'.$request->search.'%')
    //                 ->orWhereHas('category', function($query) use ($request){
    //                     $query->where('name', 'like', '%'.$request->search.'%')
    //                         ->orWhere('long_description', 'like', '%'.$request->search.'%');
    //                 });
    //         })
    //         ->paginate(12);

    //     }else {
    //         $products = Product::withAvg('reviews', 'rating')->withCount('reviews')
    //         ->with(['variants', 'category', 'productImageGalleries'])
    //         ->where(['status' => 1, 'is_approved' => 1])->orderBy('id', 'DESC')->paginate(12);
    //     }

    //     $categories = Category::where(['status' => 1])->get();
    //     $brands = Brand::where(['status' => 1])->get();
    //     // banner ad
    //     $productpage_banner_section = Adverisement::where('key', 'productpage_banner_section')->first();
    //     $productpage_banner_section = json_decode($productpage_banner_section?->value);

    //     return view('frontend.pages.product', compact('products', 'categories', 'brands', 'productpage_banner_section'));
    // }
    /** Show product detail page */
    // public function showProduct(string $slug)
    // {
    //     $product = Product::with(['vendor', 'category', 'productImageGalleries', 'variants', 'brand'])->where('slug', $slug)->where('status', 1)->first();
    //     $reviews = ProductReview::where('product_id', $product->id)->where('status', 1)->paginate(10);
    //     return view('frontend.pages.product-detail', compact('product', 'reviews'));
    // }

    public function chageListView(Request $request)
    {
        Session::put('product_list_style', $request->style);
    }

    public function getProductsFromCategory(Request $request)
    {
        $category = $request->query('category');
        $query    = Product::query();

        if ($category && $category !== 'all') {
            $query->where('category_id', $category);
        }

        $query->where('is_featured', 1)->where('status', 1);
        // Select only needed fields
        $products = $query->with(['category', 'brand'])->get(['id', 'name', 'slug', 'thumb_image', 'price', 'offer_price', 'short_description']);

        return response()->json($products);
    }
}
