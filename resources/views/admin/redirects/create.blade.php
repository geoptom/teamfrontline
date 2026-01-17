@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Add New Redirect</h4>

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

        $currentType = old('type');
    @endphp

    @include('admin.redirects._form', ['types' => $types])
</div>
@endsection
