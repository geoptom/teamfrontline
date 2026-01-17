@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Blogs</h4>
    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Add New</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration + ($blogs->currentPage()-1) * $blogs->perPage() }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->category->name ?? '-' }}</td>
                        <td><img src="{{ asset('storage/' . $blog->image) }}" height="40"></td>
                        <td class="text-center">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input toggle-status" data-id="{{ $blog->id }}" {{ $blog->status ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this blog?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $blogs->links() }}
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).on('change', '.toggle-status', function() {
            const id = $(this).data('id');
            const isChecked = $(this).is(':checked');

            $.ajax({
                url: '{{ route('admin.blog.status-change') }}',
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    status: isChecked
                },
                success: function(response) {
                    const toast = `
                        <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow-sm" role="alert" style="z-index:1055;">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>`;
                    $('body').append(toast);
                    setTimeout(() => $('.alert').alert('close'), 3000);
                },
                error: function() { alert('Something went wrong!'); }
            });
        });
    </script>
@endpush
