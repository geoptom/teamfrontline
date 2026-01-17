@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Create Blog</h4>
    <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.blog.form', ['blog' => null])
</form>
@endsection
