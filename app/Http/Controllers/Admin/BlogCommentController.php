<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function index()
    {
        $comments = BlogComment::latest()->paginate(20);
        return view('admin.blog.blog-comment.index', compact('comments'));
    }

    public function destory($id)
    {
        $comment = BlogComment::findOrFail($id);
        $comment->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
