@extends('admin.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Brands</h4>
    <a href="{{ route('admin.brands.create') }}" class="btn btn-theme">Add Brand</a>
</div>

<div class="mb-3">
    <input type="text" id="brandSearch" class="form-control" placeholder="Search brands...">
</div>

<div class="row g-3" id="brandList">
    @foreach($brands as $brand)
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    @if($brand->logo)
                        <img src="{{ asset('storage/'.$brand->logo) }}" class="rounded mb-2" style="max-width: 100%;; max-height:50px; object-fit:cover;" alt="{{ $brand->name }}">
                    @else
                        <div class="bg-light rounded mb-2" style="width:80px; height:80px; line-height:80px;">No Image</div>
                    @endif
                    <h6 class="fw-semibold mb-2 text-truncate">{{ $brand->name }}</h6>
                    <div class="form-check form-switch d-flex justify-content-center mb-2">
                        <input class="form-check-input toggle-status" type="checkbox" data-id="{{ $brand->id }}" {{ $brand->status ? 'checked' : '' }}>
                    </div>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.brands.edit', $brand) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" onsubmit="return confirm('Delete this brand?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-3">
    {{ $brands->links() }}
</div>

@push('scripts')
<script>
    // AJAX toggle status
    // document.querySelectorAll('.toggle-status').forEach(el => {
    //     el.addEventListener('change', function() {
    //         fetch(`/admin/brands/toggle-status/${this.dataset.id}`, {
    //             method: 'POST',
    //             headers: {
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //             }
    //         });
    //     });
    // });

    $(function() {
    $('.toggle-status').on('change', function() {
        const categoryId = $(this).data('id');
        const isChecked = $(this).is(':checked');
        const row = $(this).closest('tr');

        $.ajax({
            url: `/admin/brands/toggle-status/${this.dataset.id}`,
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

    // Simple search
    const brandSearch = document.getElementById('brandSearch');
    brandSearch.addEventListener('input', function() {
        const search = this.value.toLowerCase();
        document.querySelectorAll('#brandList .col-md-3').forEach(card => {
            const name = card.querySelector('h6').textContent.toLowerCase();
            card.style.display = name.includes(search) ? '' : 'none';
        });
    });
</script>
@endpush
@endsection
