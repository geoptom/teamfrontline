<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Brand::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        $brands = $query->latest()->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp,svg|max:2048',
        ]);

        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('logo')) {
            $data['logo'] = 'storage/'.$request->file('logo')->store('brands', 'public');
        }

        Brand::create($data);
        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.form', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp,svg|max:2048',
        ]);

        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('logo')) {
            if ($brand->logo && file_exists(public_path('storage/'.$brand->logo))) {
                unlink(public_path('storage/'.$brand->logo));
            }
            $data['logo'] =  'storage/'.$request->file('logo')->store('brands', 'public');
        }

        $brand->update($data);
        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->logo && file_exists(public_path('storage/'.$brand->logo))) {
            unlink(public_path('storage/'.$brand->logo));
        }

        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }

    public function toggleStatus(Brand $brand)
    {
        $brand->status = !$brand->status;
        $brand->save();
        return response()->json([
            'success' => true,
            'status'  => $brand->status,
            'message' => 'Brand ' . ($brand->status ? 'activated' : 'deactivated') . ' successfully.',
        ]);
    }
}
