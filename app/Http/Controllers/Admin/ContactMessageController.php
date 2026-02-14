<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->filter;
        $search = $request->search;

        $messages = ContactMessage::when($filter == 'unread', fn($q) => $q->where('is_read', 0))
            ->when($filter == 'read', fn($q) => $q->where('is_read', 1))
            ->when($search, function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.messages.index', compact('messages', 'filter', 'search'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);

        // Mark as read
        $message->update(['is_read' => 1]);

        return view('admin.messages.show', compact('message'));
    }

    public function markRead($id)
    {
        ContactMessage::where('id', $id)->update(['is_read' => 1]);

        return back();
    }

    public function destroy($id)
    {
        ContactMessage::where('id', $id)->delete();
        return back()->with('success', 'Message deleted');
    }
}
