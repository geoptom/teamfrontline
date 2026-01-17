@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Edit Blog</h4>
    <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    @include('admin.blog.form', ['blog' => $blog])
</form>
@endsection
