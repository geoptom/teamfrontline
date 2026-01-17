@extends('admin.layouts.master')
@section('title', 'Create Page')
@section('content')
<div class="container-fluid">
    <h4>Create Page</h4>

    <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.pages._form')
        <button type="submit" class="btn btn-primary">Save Page</button>
    </form>
</div>
@endsection
