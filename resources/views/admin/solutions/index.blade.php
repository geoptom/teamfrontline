@extends('admin.layouts.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Solutions</h4>
        <a href="{{ route('admin.solutions.create') }}" class="btn btn-primary">Add New</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solutions as $solution)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $solution->title }}</td>
                    <td><img src="{{ asset('storage/' . $solution->image) }}" height="40"></td>
                    <td class="text-center">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input toggle-status" data-id="{{ $solution->id }}"
                                {{ $solution->status ? 'checked' : '' }}>
                        </div>
                    </td>

                    <td>
                        <a href="{{ route('admin.solutions.edit', $solution->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('admin.solutions.destroy', $solution->id) }}" method="POST"
                            class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this solution?')"
                                class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $solutions->links() }}

    {{-- <script>
$('.toggle-status').on('change', function(){
    const id = $(this).data('id');
    $.post("{{ url('admin/solutions/status') }}/" + id, {_token: '{{ csrf_token() }}'}, function(){
        toastr.success('Status updated');
    });
});
</script> --}}
@endsection

@push('scripts')
    <script>
        $(document).on('change', '.toggle-status', function() {
            const id = $(this).data('id');
            const isChecked = $(this).is(':checked');

            $.ajax({
                url: '{{ route('admin.solutions.toggle-status', ':id') }}'.replace(':id', id),
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.success) {
                        const statusText = response.status ? 'enabled' : 'disabled';
                        const toast = `
                        <div class="alert alert-${response.status ? 'success' : 'warning'} alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow-sm" role="alert" style="z-index:1055;">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>`;
                        $('body').append(toast);
                        setTimeout(() => $('.alert').alert('close'), 3000);

                    }
                },
                error: function() {
                    alert('Something went wrong!');
                }
            });
        });
    </script>
@endpush
