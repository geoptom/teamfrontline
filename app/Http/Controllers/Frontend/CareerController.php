<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::where('status', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.careers.index', compact('careers'));
    }

    public function show($slug)
    {
        $career = Career::where('slug', $slug)->firstOrFail();
        return view('frontend.careers.show', compact('career'));
    }

    public function apply(Request $request, $id)
    {
        $career = Career::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'cover_letter' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120'
        ]);

        $path = null;
        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
        }

        CareerApplication::create([
            'career_id' => $career->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'cover_letter' => $data['cover_letter'] ?? null,
            'resume_path' => $path,
            'status' => 0,
        ]);

        return redirect()->back()->with('success', 'Your application was submitted.');
    }
}
