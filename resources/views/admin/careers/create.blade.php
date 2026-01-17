@extends('admin.layouts.master')
@section('title', 'New Career')
@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Create Career</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.careers.store') }}" method="POST">
                @include('admin.careers._form')
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
