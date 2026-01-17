@extends('admin.layouts.master')
@section('title', 'Homepage Sliders')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Homepage Sliders</h4>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">Add New Slider</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $slider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $slider['title'] }}</td>
                            <td>{{ $slider['sub_title'] }}</td>
                            <td><img src="{{ asset($slider['img_desktop'] ?? '') }}" alt="" width="80"></td>
                            <td>
                                @if($slider['status'])
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.sliders.edit', $loop->index) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.sliders.destroy', $loop->index) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this slider?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">No sliders found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
