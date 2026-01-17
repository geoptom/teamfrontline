<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductImportLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Excel;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand']);

        // Filters
        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->q . '%')
                    ->orWhere('sku', 'like', '%' . $request->q . '%');
            });
        }
        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('id', $request->category));
        }
        if ($request->filled('brand')) {
            $query->whereHas('brand', fn($q) => $q->where('id', $request->brand));
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $products = $query->latest()->paginate(20)->withQueryString();

        $categories = Category::where('status', 1)->get();
        $brands     = Brand::where('status', 1)->get();

        return view('admin.products.index', compact('products', 'categories', 'brands'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $brands     = Brand::where('status', 1)->get();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'              => 'required|string|max:255',
            // 'slug'              => ['nullable', 'string', 'max:255', Rule::unique('products', 'slug')],
            'category_id'       => 'required|exists:categories,id',
            'brand_id'          => 'nullable|exists:brands,id',
            'product_uid'       => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description'  => 'nullable|string',
            'features'          => 'nullable|string',
            'specifications'    => 'nullable|string',
            'sku'               => 'nullable|string|unique:products,sku',
            'price'             => 'required|numeric|min:0',
            'qty'               => 'nullable|integer|min:0',
            'is_featured'       => 'nullable|boolean',
            'status'            => 'nullable|boolean',
        ]);

        $data['slug']        = $data['slug'] ?? Str::slug($data['name']) . '-' . Str::random(5);
        $data['is_approved'] = 1;

        $product = Product::create($data);

        // handle main thumb_image if provided
        if ($request->hasFile('thumb_image')) {
            $path = $request->file('thumb_image')->store('products', 'public');
            $product->update(['thumb_image' => 'storage/' . $path]);
        }

        // multiple images handled via separate endpoint (or you can handle here)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => 'storage/' . $path,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('status', 1)->get();
        $brands     = Brand::where('status', 1)->get();
        $product->load('images');
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'              => 'required|string|max:255',
            // 'slug'              => ['nullable', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($product->id)],
            'category_id'       => 'required|exists:categories,id',
            'brand_id'          => 'nullable|exists:brands,id',
            'product_uid'       => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description'  => 'nullable|string',
            'features'          => 'nullable|string',
            'specifications'    => 'nullable|string',
            'sku'               => ['nullable', 'string', Rule::unique('products', 'sku')->ignore($product->id)],
            'price'             => 'required|numeric|min:0',
            'qty'               => 'nullable|integer|min:0',
            'is_featured'       => 'nullable|boolean',
            'status'            => 'nullable|boolean',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']) . '-' . Str::random(5);

        $product->update($data);

        if ($request->hasFile('thumb_image')) {
            // delete old if exists (starts with storage/)
            if ($product->thumb_image && Str::startsWith($product->thumb_image, 'storage/')) {
                Storage::disk('public')->delete(Str::after($product->thumb_image, 'storage/'));
            }
            $path = $request->file('thumb_image')->store('products', 'public');
            $product->update(['thumb_image' => 'storage/' . $path]);
        }

        // handle images upload if present
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => 'storage/' . $path,
                ]);
            }
        }

        return redirect()->route('admin.products.edit', $product)->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        // Optionally delete images files
        foreach ($product->images as $img) {
            if (Str::startsWith($img->image, 'storage/')) {
                Storage::disk('public')->delete(Str::after($img->image, 'storage/'));
            }
            $img->delete();
        }
        if ($product->thumb_image && Str::startsWith($product->thumb_image, 'storage/')) {
            Storage::disk('public')->delete(Str::after($product->thumb_image, 'storage/'));
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }

    // AJAX toggles
    public function toggleActive(Request $request, Product $product)
    {
        $product->status = ! $product->status;
        $product->save();
        return response()->json(['status' => $product->status]);
    }

    public function toggleFeatured(Request $request, Product $product)
    {
        $product->is_featured = ! $product->is_featured;
        $product->save();
        return response()->json(['is_featured' => $product->is_featured]);
    }

    // endpoint to upload images via AJAX (optional)
    public function uploadImages(Request $request, Product $product)
    {
        $request->validate(['images.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120']);
        $created = [];
        foreach ($request->file('images', []) as $img) {
            $path = $img->store('products', 'public');
            $pi   = ProductImage::create([
                'product_id' => $product->id,
                'image'      => 'storage/' . $path,
            ]);
            $created[] = $pi;
        }
        return response()->json(['created' => $created]);
    }

    public function removeImage(Product $product, ProductImage $image)
    {
        if ($image->product_id === $product->id) {
            if (file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
            }
            $image->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 403);
    }

    public function importForm()
    {
        return redirect()->route('admin.products.index')->with('showImportModal', true);
    }

    // Handle file upload and import
    public function import(Request $request)
    {
        $request->validate([
            'file'       => 'required|file|mimes:csv,txt,xlsx,xls',
            'has_header' => 'nullable|in:0,1',
        ]);

        try {
            Excel::import(
                new \App\Imports\ProductImport($request->has_header),
                $request->file('file')
            );

            return back()->with('success', 'Products imported successfully!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            return back()->withErrors($e->failures());
        } catch (\Throwable $e) {
            return back()->withErrors(['file' => $e->getMessage()]);
        }
    }

    protected function createProductFromRecord(array $record)
    {
        // basic sanitization and mapping
        $name = $record['name'] ?? null;
        if (! $name) {
            return null;
        }

        $sku         = $record['sku'] ?? null;
        $slug        = Str::slug($name);
        $price       = isset($record['price']) ? floatval($record['price']) : 0;
        $salePrice   = isset($record['sale_price']) ? floatval($record['sale_price']) : null;
        $description = $record['description'] ?? null;
        $stock       = isset($record['stock']) ? intval($record['stock']) : 0;
        $status      = isset($record['status']) ? intval($record['status']) : 1;

        // category
        $categoryName = $record['category'] ?? null;
        $categoryId   = null;
        if ($categoryName) {
            $category   = Category::firstOrCreate(['name' => trim($categoryName)], ['slug' => Str::slug($categoryName)]);
            $categoryId = $category->id;
        }

        // brand
        $brandName = $record['brand'] ?? null;
        $brandId   = null;
        if ($brandName) {
            $brand   = Brand::firstOrCreate(['name' => trim($brandName)], ['slug' => Str::slug($brandName)]);
            $brandId = $brand->id;
        }

        // create product
        $product = Product::create([
            'name'        => $name,
            'slug'        => $this->uniqueSlugForProduct($slug),
            'sku'         => $sku,
            'price'       => $price,
            'sale_price'  => $salePrice,
            'description' => $description,
            'stock'       => $stock,
            'status'      => $status,
            'category_id' => $categoryId,
            'brand_id'    => $brandId,
        ]);

        // images: if CSV contains comma-separated public URLs or storage paths, we attach the first as feature image
        if (! empty($record['images'])) {
            $images = is_string($record['images']) ? array_map('trim', explode(',', $record['images'])) : (array) $record['images'];
            if (! empty($images[0])) {
                // if it's a URL, you might want to download; here we save the path or URL into product->image if your schema supports it
                if (filter_var($images[0], FILTER_VALIDATE_URL)) {
                    $product->image = $images[0];
                } else {
                    // if image path relative to storage/app/public
                    $product->image = $images[0];
                }
                $product->save();
            }
        }

        return $product;
    }

    public function downloadSampleCsv()
    {
        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="sample_products.csv"',
        ];

        $columns = [
            'name',
            'sku',
            'price',
            'sale_price',
            'category',
            'brand',
            'description',
            'stock',
            'status',
            'images',
        ];

        $callback = function () use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            fputcsv($file, [
                'Sample Product',
                'SKU123',
                '999.00',
                '799.00',
                'Electronics',
                'Sony',
                'Example description goes here',
                '12',
                '1',
                'image1.jpg,image2.jpg',
            ]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function importPreview(Request $request)
    {
        $request->validate([
            'file'       => 'required',
            'has_header' => 'required|in:0,1',
        ]);

        $path = $request->file('file')->getRealPath();

        $data = \Maatwebsite\Excel\Facades\Excel::toArray([], $path)[0];

        $hasHeader = $request->has_header;

        $preview = array_slice($data, 0, 5);

        return response()->json([
            'preview' => $preview,
            'header'  => $hasHeader ? $data[0] : null,
        ]);
    }

    public function importLogs()
    {
        return view('admin.products.import-logs', [
            'logs' => ProductImportLog::latest()->paginate(20),
        ]);
    }

}
