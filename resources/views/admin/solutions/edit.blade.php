@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Edit Solution</h4>
    <a href="{{ route('admin.solutions.index') }}" class="btn btn-secondary">Back to List</a>
</div>


<form action="{{ route('admin.solutions.update', $solution->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.solutions.form', ['solution' => $solution])
</form>
@endsection
