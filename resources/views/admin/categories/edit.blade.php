@extends('admin.layouts.master')
@section('title', 'Edit Category')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold text-theme mb-0">Edit Category</h4>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-theme btn-sm rounded-pill">Back</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.categories.form')
            {{-- <div class="mt-4">
                <button class="btn btn-theme px-4">Update</button>
            </div> --}}
        </form>
    </div>
</div>
@endsection
