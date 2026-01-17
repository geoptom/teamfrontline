@extends('admin.layouts.master')
@section('title', 'Edit Slider')
@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Edit Slider</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.sliders.update', $sliderIndex) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.slider.form')
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
