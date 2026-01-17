@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Blog Categories</h4>
    <a href="{{ route('admin.blog-category.create') }}" class="btn btn-primary">Add New</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration + ($categories->currentPage()-1) * $categories->perPage() }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td class="text-center">{{ $category->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('admin.blog-category.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.blog-category.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this category?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $categories->links() }}
    </div>
</div>

@endsection

@push('scripts')
    <script>
        // Optional extra JS for categories
    </script>
@endpush
