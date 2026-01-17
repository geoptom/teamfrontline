@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">

    <h4 class="mb-3">Edit Redirect</h4>

    @php
        $types = [
            'product'  => 'Product',
            'category' => 'Category',
            'blog'     => 'Blog',
            'page'     => 'Page',
            'service'  => 'Service',
            'solution' => 'Solution',
            'url'      => 'Custom URL',
        ];

        // Detect type based on model stored
        $currentType = collect([
            'products'  => 'product',
            'categories'=> 'category',
            'blog'      => 'blog',
            'pages'     => 'page',
            'services'  => 'service',
            'solutions' => 'solution',
            'url'       => 'url'
        ])->get($redirect->model);
    @endphp

    @include('admin.redirects._form', ['redirect' => $redirect, 'types' => $types, 'currentType' => $currentType])

</div>
@endsection
