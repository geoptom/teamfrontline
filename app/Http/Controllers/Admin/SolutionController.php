<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::latest()->paginate(15);
        return view('admin.solutions.index', compact('solutions'));
    }

    public function create()
    {
        return view('admin.solutions.create');
    }

    public function store(Request $request)
    {
        // Normalize checkbox input
        $request->merge([
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:solutions,slug,' . ($solution->id ?? 'null'),
            'short_description' => 'nullable|string|max:500',
            'description'       => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'            => 'boolean',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/solutions', 'public');
        }

        Solution::create($data);

        return redirect()->route('admin.solutions.index')->with('success', 'Solution created successfully.');
    }

    public function edit(Solution $solution)
    {
        return view('admin.solutions.edit', compact('solution'));
    }

    public function update(Request $request, Solution $solution)
    {
        $request->merge([
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:solutions,slug,' . ($solution->id ?? 'null'),
            'short_description' => 'nullable|string|max:500',
            'description'       => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'            => 'boolean',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/solutions', 'public');
        }

        $solution->update($data);

        return redirect()->route('admin.solutions.index')->with('success', 'Solution updated successfully.');
    }

    public function destroy(Solution $solution)
    {
        $solution->delete();
        return back()->with('success', 'Solution deleted successfully.');
    }

    public function toggleStatus(Solution $solution)
    {
        $solution->status = ! $solution->status;
        $solution->save();

        return response()->json([
            'success' => true,
            'status'  => $solution->status,
            'message' => 'Solution status updated successfully!',
        ]);
    }

}
