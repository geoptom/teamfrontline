@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Create Service</h4>
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.services.form', ['service' => null])
</form>
@endsection
