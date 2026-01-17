@extends('admin.layouts.master')
@section('title', 'Edit Page')
@section('content')
<div class="container-fluid">
    <h4>Edit Page</h4>

    <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.pages._form')
        <button type="submit" class="btn btn-primary">Update Page</button>
    </form>
</div>
@endsection
