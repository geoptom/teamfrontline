@extends('admin.layouts.master')
@section('title', 'Careers')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Careers</h4>
        <a href="{{ route('admin.careers.create') }}" class="btn btn-primary">New Career</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($careers as $career)
                        <tr>
                            <td>{{ $career->title }}</td>
                            <td>{{ $career->location }}</td>
                            <td>{{ $career->type }}</td>
                            <td>{{ $career->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('admin.careers.edit', $career) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <a href="{{ route('admin.careers.applications.index', $career) }}" class="btn btn-sm btn-info">Applications</a>
                                <form action="{{ route('admin.careers.destroy', $career) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Delete career?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $careers->links() }}
        </div>
    </div>
</div>
@endsection
