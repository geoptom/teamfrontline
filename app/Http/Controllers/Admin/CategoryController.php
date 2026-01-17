<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')
            ->when(request('search'), fn($q) => $q->where('name', 'like', '%' . request('search') . '%'))
            ->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories          = Category::all();
        $formattedCategories = $this->formatCategories($categories);
        return view('admin.categories.create', compact('formattedCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'parent_id'         => 'nullable|exists:categories,id',
            'short_description' => 'nullable|string',
            'description'       => 'nullable|string',
            'status'            => 'boolean',
            'icon'              => 'nullable|string',
            'thump_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner'            => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        if ($request->hasFile('thump_image')) {
            $validated['thump_image'] = $request->file('thump_image')->store('categories/thump_images', 'public');
        }

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('categories/banners', 'public');
        }
        // $validated['description'] = Purifier::clean($request->description, 'msword_safe');

        Category::create($validated);
        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully.');
    }

    public function edit(Category $category)
    {
        $categories          = Category::all()->where('id', '!=', $category->id);
        $formattedCategories = $this->formatCategories($categories);
        return view('admin.categories.edit', compact('category', 'formattedCategories'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'parent_id'         => 'nullable|exists:categories,id',
            'short_description' => 'nullable|string',
            'description'       => 'nullable|string',
            'icon'              => 'nullable|string',
            'thump_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner'            => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        if ($request->hasFile('thump_image')) {
            if ($category->thump_image && Storage::disk('public')->exists($category->thump_image)) {
                Storage::disk('public')->delete($category->thump_image);
            }
            $validated['thump_image'] = $request->file('thump_image')->store('categories/thump_images', 'public');
        }

        if ($request->hasFile('banner')) {
            if ($category->banner && Storage::disk('public')->exists($category->banner)) {
                Storage::disk('public')->delete($category->banner);
            }
            $validated['banner'] = $request->file('banner')->store('categories/banners', 'public');
        }
        // $validated['description'] = Purifier::clean($request->description, 'msword_safe');

        $category->update($validated);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

    public function removeImage(Category $category, $type)
    {
        if (! in_array($type, ['thump_image', 'banner'])) {
            abort(404);
        }

        if ($category->$type && Storage::disk('public')->exists($category->$type)) {
            Storage::disk('public')->delete($category->$type);
            $category->update([$type => null]);
        }

        return back()->with('success', ucfirst($type) . ' removed successfully.');
    }

    public function toggleStatus(Category $category)
    {
        $category->status = ! $category->status;
        $category->save();

        return response()->json([
            'success' => true,
            'status'  => $category->status,
            'message' => 'Category ' . ($category->status ? 'activated' : 'deactivated') . ' successfully.',
        ]);
    }

    /**
     * Build hierarchical category list (with indentation)
     */
    private function formatCategories($categories, $parentId = null, $prefix = '')
    {
        $result = [];

        foreach ($categories->where('parent_id', $parentId) as $category) {
            $result[] = [
                'id'   => $category->id,
                'name' => $prefix . $category->name,
            ];

            $children = $this->formatCategories($categories, $category->id, $prefix . '— ');
            $result   = array_merge($result, $children);
        }

        return $result;
    }

}
