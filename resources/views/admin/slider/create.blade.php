@extends('admin.layouts.master')
@section('title', 'Add Slider')
@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Add New Slider</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.slider.form')
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
