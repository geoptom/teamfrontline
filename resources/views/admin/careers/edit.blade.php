@extends('admin.layouts.master')
@section('title', 'Edit Career')
@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Career</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.careers.update', $career) }}" method="POST">
                @method('PUT')
                @include('admin.careers._form')
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
