@extends('admin.layouts.master')
@section('title', 'Add Product')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-theme mb-0">Add Product</h4>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm border-0">
        @csrf
        @include('admin.products.form', ['product' => null])
    </form>
</div>
@endsection
