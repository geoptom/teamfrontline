@extends('admin.layouts.master')
@section('title', isset($brand) ? 'Edit Brand' : 'Add Brand')

@section('content')
    <h4>@yield('title')</h4>

    <form method="POST" enctype="multipart/form-data"
        action="{{ isset($brand) ? route('admin.brands.update', $brand) : route('admin.brands.store') }}">
        @csrf
        @if (isset($brand))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label class="form-label fw-bold">Brand Name</label>
            <input type="text" name="name" value="{{ old('name', $brand->name ?? '') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Logo</label>
            <input type="file" name="logo" class="form-control">
            @if (isset($brand) && $brand->logo)
                <img src="{{ asset('storage/' . $brand->logo) }}" class="rounded mt-2"
                    style="width:80px; height:80px; object-fit:cover;">
            @endif
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-theme">{{ isset($brand) ? 'Update' : 'Create' }}</button>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </form>
@endsection
