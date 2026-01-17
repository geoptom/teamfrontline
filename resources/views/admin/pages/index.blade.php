@extends('admin.layouts.master')
@section('title', 'Manage Pages')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h4>Pages</h4>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Create Page</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Visible</th>
                        <th>Link</th>
                        {{-- <th>In Menu</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>
                                <input type="checkbox" class="toggle-visible" data-id="{{ $page->id }}" {{ $page->is_visible ? 'checked' : '' }}>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-secondary copy-link-btn" data-link="{{ url('/pages/'.$page->slug) }}">Copy Link</button>
                            </td>
                            {{-- <td>{{ $page->show_in_menu ? 'Yes' : 'No' }}</td> --}}
                            <td>
                                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this page?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                <a href="{{ url('/pages/'.$page->slug) }}" target="_blank" class="btn btn-sm btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $pages->links() }}
        </div>
    </div>
</div>
@push('scripts')
<script>
    document.querySelectorAll('.copy-link-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            navigator.clipboard.writeText(btn.getAttribute('data-link'));
            btn.textContent = 'Copied!';
            setTimeout(function(){ btn.textContent = 'Copy Link'; }, 1200);
        });
    });

    document.querySelectorAll('.toggle-visible').forEach(function(toggle) {
        toggle.addEventListener('change', function() {
            var pageId = toggle.getAttribute('data-id');
            var isVisible = toggle.checked ? 1 : 0;
            fetch("{{ route('admin.pages.toggleVisible') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ id: pageId, is_visible: isVisible })
            }).then(res => res.json()).then(data => {
                if(data.status !== 'success') {
                    alert('Failed to update status');
                } else {
                    const toast = `
                        <div class="alert alert-${data.is_visible == 1 ? 'success' : 'warning'} alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow-sm" role="alert" style="z-index:1055;">
                            Status changed successfully
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>`;
                    $('body').append(toast);
                    setTimeout(() => $('.alert').alert('close'), 3000);
                }
            });
        });
    });
</script>
@endpush
        </div>
    </div>
</div>
@endsection
