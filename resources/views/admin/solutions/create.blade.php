@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Create Solution</h4>
    <a href="{{ route('admin.solutions.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<form action="{{ route('admin.solutions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.solutions.form', ['solution' => null])
</form>
@endsection
