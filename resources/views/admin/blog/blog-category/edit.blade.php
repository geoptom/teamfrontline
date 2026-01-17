@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Edit Blog Category</h4>
    <a href="{{ route('admin.blog-category.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.blog-category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="1" {{ $category->status ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="0" {{ !$category->status ? 'checked' : '' }}>
                    <label class="form-check-label">Inactive</label>
                </div>
            </div>

            <button class="btn btn-primary">Save</button>
            <a href="{{ route('admin.blog-category.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection
