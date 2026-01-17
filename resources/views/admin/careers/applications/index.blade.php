@extends('admin.layouts.master')
@section('title', 'Applications for ' . $career->title)
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Applications — {{ $career->title }}</h4>
        <a href="{{ route('admin.careers.index') }}" class="btn btn-secondary">Back to Careers</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Submitted</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $app)
                        <tr>
                            <td>{{ $app->name }}</td>
                            <td>{{ $app->email }}</td>
                            <td>{{ $app->phone }}</td>
                            <td>{{ $app->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                @if($app->status)
                                    <span class="badge bg-success">Reviewed</span>
                                @else
                                    <span class="badge bg-warning">New</span>
                                @endif
                            </td>
                            <td>
                                @if($app->resume_path)
                                    <a href="{{ route('admin.careers.applications.download', $app) }}" class="btn btn-sm btn-primary">Download</a>
                                @endif

                                <button class="btn btn-sm btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#cover-{{ $app->id }}">View</button>

                                <form action="{{ route('admin.careers.applications.status', $app) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="{{ $app->status ? 0 : 1 }}">
                                    <button class="btn btn-sm btn-{{ $app->status ? 'secondary' : 'success' }}">{{ $app->status ? 'Mark New' : 'Mark Reviewed' }}</button>
                                </form>

                                <form action="{{ route('admin.careers.applications.destroy', $app) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Delete application?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr class="collapse" id="cover-{{ $app->id }}">
                            <td colspan="6">
                                <strong>Cover Letter</strong>
                                <div class="mt-2">{{ $app->cover_letter }}</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No applications yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $applications->links() }}
        </div>
    </div>
</div>
@endsection
