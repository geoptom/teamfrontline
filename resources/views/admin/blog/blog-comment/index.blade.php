@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Blog Comments</h4>
    <!-- no create button for comments -->
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Blog</th>
                    <th>Name</th>
                    <th>Comment</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $loop->iteration + ($comments->currentPage()-1) * $comments->perPage() }}</td>
                        <td>{{ $comment->blog->title ?? '-' }}</td>
                        <td>{{ $comment->name ?? ($comment->user->name ?? '-') }}</td>
                        <td>{{ Str::limit($comment->comment, 120) }}</td>
                        <td>{{ $comment->created_at->diffForHumans() }}</td>
                        <td>
                            <form action="{{ route('admin.blog-comments.destory', $comment->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this comment?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $comments->links() }}
    </div>
</div>

@endsection

@push('scripts')
    <script>
        // Optional JS for comments
    </script>
@endpush
