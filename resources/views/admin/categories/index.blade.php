@extends('admin.layouts.master')

@section('title', 'Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-theme mb-0">Categories</h4>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-theme btn-sm">+ Add Category</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="GET" class="row g-2 mb-3">
                <div class="col-md-4">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Search category...">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-outline-theme">Search</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="50">#</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th width="100">Status</th>
                            <th width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->parent?->name ?? '-' }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input toggle-status" type="checkbox"
                                            data-id="{{ $category->id }}" {{ $category->status ? 'checked' : '' }}>
                                    </div>
                                </td>

                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="btn btn-sm btn-outline-theme">Edit</a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Are you sure to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $categories->links() }}
        </div>
    </div>
@endsection
@push('scripts')
<script>
$(function() {
    $('.toggle-status').on('change', function() {
        const categoryId = $(this).data('id');
        const isChecked = $(this).is(':checked');
        const row = $(this).closest('tr');

        $.ajax({
            url: `/admin/categories/${categoryId}/toggle-status`,
            method: 'PATCH',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function(res) {
                if (res.success) {
                    const toast = `
                        <div class="alert alert-${res.status ? 'success' : 'warning'} alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow-sm" role="alert" style="z-index:1055;">
                            ${res.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>`;
                    $('body').append(toast);
                    setTimeout(() => $('.alert').alert('close'), 3000);
                }
            },
            error: function() {
                alert('Error updating status.');
                $(this).prop('checked', !isChecked); // revert toggle on error
            }.bind(this)
        });
    });
});
</script>
@endpush
