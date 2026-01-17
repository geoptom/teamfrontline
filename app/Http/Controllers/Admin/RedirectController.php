<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RedirectSlug;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Type → Model + Route Map
    |--------------------------------------------------------------------------
    */
    private $typeMap = [
        'product'  => ['model' => 'products',  'route' => 'products.show'],
        'category' => ['model' => 'categories','route' => 'category.show'],
        'blog'     => ['model' => 'blog',      'route' => 'blog-details'],
        'page'     => ['model' => 'pages',     'route' => 'pages.show'],
        'service'  => ['model' => 'services',  'route' => 'services.show'],
        'solution' => ['model' => 'solutions', 'route' => 'solutions.show'],
        'url'      => ['model' => 'url',       'route' => null], // Full-path redirect
    ];


    /*
    |--------------------------------------------------------------------------
    | INDEX (List)
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $redirects = RedirectSlug::when($search, function($q) use ($search) {
                $q->where('old_slug', 'like', "%$search%")
                  ->orWhere('new_slug', 'like', "%$search%")
                  ->orWhere('old_path', 'like', "%$search%")
                  ->orWhere('new_path', 'like', "%$search%");
            })
            ->orderBy('id','desc')
            ->paginate(20);

        return view('admin.redirects.index', compact('redirects', 'search'));
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $types = $this->getTypes();
        $currentType = null;

        return view('admin.redirects.create', compact('types', 'currentType'));
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ]);

        $type = $request->type;
        $map  = $this->typeMap[$type];

        // Type: FULL URL REDIRECT
        if ($type === 'url') {
            $request->validate([
                'old_path' => 'required',
            ]);

            RedirectSlug::create([
                'old_path'  => trim($request->old_path, '/'),
                'new_path'  => $request->new_path ? trim($request->new_path, '/') : null,
                'model'     => 'url',
                'route_name'=> null,
            ]);

            return redirect()->route('admin.redirects.index')
                ->with('success', 'URL redirect created successfully.');
        }

        // Type: SLUG REDIRECT
        $request->validate([
            'old_slug' => 'required',
        ]);

        RedirectSlug::create([
            'old_slug'   => trim($request->old_slug),
            'new_slug'   => $request->new_slug ? trim($request->new_slug) : null,
            'model'      => $map['model'],
            'route_name' => $map['route'],
        ]);

        return redirect()->route('admin.redirects.index')
            ->with('success', 'Redirect created successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit(RedirectSlug $redirect)
    {
        $types = $this->getTypes();

        // Detect type based on stored model
        $currentType = collect([
            'products'  => 'product',
            'categories'=> 'category',
            'blog'      => 'blog',
            'pages'     => 'page',
            'services'  => 'service',
            'solutions' => 'solution',
            'url'       => 'url'
        ])->get($redirect->model);

        return view('admin.redirects.edit', compact('redirect','types','currentType'));
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, RedirectSlug $redirect)
    {
        $request->validate([
            'type' => 'required',
        ]);

        $type = $request->type;
        $map  = $this->typeMap[$type];

        // URL redirect
        if ($type === 'url') {
            $request->validate([
                'old_path' => 'required',
            ]);

            $redirect->update([
                'old_path'  => trim($request->old_path, '/'),
                'new_path'  => $request->new_path ? trim($request->new_path, '/') : null,
                'model'     => 'url',
                'route_name'=> null,
                'is_active' => $request->is_active ?? 1,
            ]);

            return redirect()->route('admin.redirects.index')
                ->with('success', 'URL redirect updated successfully.');
        }

        // Slug redirect
        $request->validate([
            'old_slug' => 'required'
        ]);

        $redirect->update([
            'old_slug'   => trim($request->old_slug),
            'new_slug'   => $request->new_slug ? trim($request->new_slug) : null,
            'model'      => $map['model'],
            'route_name' => $map['route'],
            'is_active'  => $request->is_active ?? 1,
        ]);

        return redirect()->route('admin.redirects.index')
            ->with('success', 'Redirect updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy(RedirectSlug $redirect)
    {
        $redirect->delete();

        return redirect()->route('admin.redirects.index')
            ->with('success', 'Redirect deleted successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Helper
    |--------------------------------------------------------------------------
    */
    private function getTypes()
    {
        return [
            'product'  => 'Product',
            'category' => 'Category',
            'blog'     => 'Blog',
            'page'     => 'Page',
            'service'  => 'Service',
            'solution' => 'Solution',
            'url'      => 'Custom URL',
        ];
    }
}
