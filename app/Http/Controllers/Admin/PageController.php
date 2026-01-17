<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'slug'            => 'nullable|string|max:255|unique:pages,slug',
            'excerpt'         => 'nullable|string',
            'content'         => 'nullable|string',
            'banner_image'    => 'nullable|image|max:2048',
            'seo_title'       => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'is_visible'      => 'sometimes|boolean',
            'show_in_menu'    => 'sometimes|boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('uploads', 'public');
        }

        $data['is_visible']   = $request->has('is_visible') ? 1 : 0;
        $data['show_in_menu'] = $request->has('show_in_menu') ? 1 : 0;

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:255',
            'slug'            => 'nullable|string|max:255|unique:pages,slug,' . $page->id,
            'excerpt'         => 'nullable|string',
            'content'         => 'nullable|string',
            'banner_image'    => 'nullable|image|max:2048',
            'seo_title'       => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'is_visible'      => 'sometimes|boolean',
            'show_in_menu'    => 'sometimes|boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('uploads', 'public');
        }

        $data['is_visible']   = $request->has('is_visible') ? 1 : 0;
        $data['show_in_menu'] = $request->has('show_in_menu') ? 1 : 0;

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Page deleted.');
    }

    public function toggleVisible(Request $request)
    {
        $page             = Page::findOrFail($request->id);
        $page->is_visible = $request->is_visible ? 1 : 0;
        $page->save();
        return response()->json(['status' => 'success', 'is_visible' => $page->is_visible ]);
    }
}
