@extends('admin.layouts.master')

@section('content')

<h4>Contact Messages</h4>

<form class="row mb-3">
    <div class="col-md-4">
        <select name="filter" class="form-select" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="unread" {{ $filter=='unread'?'selected':'' }}>Unread</option>
            <option value="read" {{ $filter=='read'?'selected':'' }}>Read</option>
        </select>
    </div>

    <div class="col-md-4">
        <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ $search }}">
    </div>

    <div class="col-md-4">
        <button class="btn btn-primary w-100">Filter</button>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th><th>Email</th><th>Phone</th><th>Status</th><th>Date</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($messages as $m)
        <tr>
            <td>{{ $m->name }}</td>
            <td>{{ $m->email }}</td>
            <td>{{ $m->phone }}</td>
            <td>{!! $m->is_read ? '<span class="badge bg-success">Read</span>' : '<span class="badge bg-warning">Unread</span>' !!}</td>
            <td>{{ $m->created_at->format('d M Y h:i A') }}</td>
            <td>
                <a href="{{ route('admin.messages.show', $m->id) }}" class="btn btn-sm btn-info text-white">View</a>

                <form method="POST" action="{{ route('admin.messages.delete', $m->id) }}" class="d-inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Delete?')" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $messages->links() }}

@endsection
