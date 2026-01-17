<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $blogs = Blog::latest()->paginate(15);
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::where('status', 1)->get();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $data = $request->validate([
            'image'           => ['required', 'image', 'max:3000'],
            'title'           => ['required', 'max:200', 'unique:blogs,title'],
            'category_id'     => ['required'],
            'excerpt'         => ['required'],
            'content'         => ['required'],
            'seo_title'       => ['nullable', 'max:200'],
            'seo_description' => ['nullable', 'max:200'],
            'status'          => ['boolean'],
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);

        // $request->validate([
        //     'image' => ['required', 'image', 'max:3000'],
        //     'title' => ['required', 'max:200', 'unique:blogs,title'],
        //     'category' => ['required'],
        //     'excerpt' => ['required'],
        //     'content' => ['required'],
        //     'seo_title' => ['nullable', 'max:200'],
        //     'seo_description' => ['nullable', 'max:200']
        // ]);

        // $imagePath = $this->uploadImage($request, 'image', 'uploads');

        // $blog = new Blog();
        // $blog->image = $imagePath;
        // $blog->title = $request->title;
        // $blog->slug = Str::slug($request->title);
        // $blog->category_id = $request->category;
        // $blog->user_id = Auth::user()->id;
        // $blog->excerpt = $request->excerpt;
        // $blog->content = $request->content;
        // $blog->seo_title = $request->seo_title;
        // $blog->seo_description = $request->seo_description;
        // $blog->status = $request->status;
        // $blog->save();

        toastr('Created successfully', 'success', 'success');

        return redirect()->route('admin.blog.index');
    }

    public function edit($id)
    {
        $blog       = Blog::findOrFail($id);
        $categories = BlogCategory::where('status', 1)->get();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->merge([
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $data = $request->validate([
            'image'           => ['nullable', 'image', 'max:3000'],
            'slug'            => 'nullable|string|max:255|unique:blogs,slug,' . ($blog->id ?? 'null'),
            'category_id'     => ['required'],
            'excerpt'         => ['required'],
            'content'         => ['required'],
            'seo_title'       => ['nullable', 'max:200'],
            'seo_description' => ['nullable', 'max:200'],
            'status'          => ['boolean'],
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        toastr('Update successfully', 'success', 'success');

        return redirect()->route('admin.blog.index');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $this->deleteImage($blog->image);
        $blog->comments()->delete();
        $blog->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $blog         = Blog::findOrFail($request->id);
        $blog->status = $request->status == 'true' ? 1 : 0;
        $blog->save();

        return response(['message' => 'Status has been updated!']);
    }
}
