<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1'
        ]);
        $data['slug'] = Str::slug($data['title']);
        // ensure unique slug
        $base = $data['slug'];
        $i = 1;
        while (Career::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $base . '-' . $i++;
        }
        Career::create($data);
        return redirect()->route('admin.careers.index')->with('success', 'Career created');
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1'
        ]);
        if ($career->title !== $data['title']) {
            $data['slug'] = Str::slug($data['title']);
            $base = $data['slug'];
            $i = 1;
            while (Career::where('slug', $data['slug'])->where('id', '!=', $career->id)->exists()) {
                $data['slug'] = $base . '-' . $i++;
            }
        }
        $career->update($data);
        return redirect()->route('admin.careers.index')->with('success', 'Career updated');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Career removed');
    }
}
