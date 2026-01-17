@extends('admin.layouts.master')
@section('title', 'Products')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Products</h3>
        <div>

            <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-theme">+ Create</a>
            <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#importModal">
                Import Products
            </button>
        </div>

    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Search name or SKU">
        </div>
        <div class="col-md-3">
            <select name="category" class="form-select">
                <option value="">All Categories</option>
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}" @selected(request('category') == $c->id)>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="brand" class="form-select">
                <option value="">All Brands</option>
                @foreach ($brands as $b)
                    <option value="{{ $b->id }}" @selected(request('brand') == $b->id)>{{ $b->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 d-flex">
            <button class="btn btn-outline-secondary me-2">Filter</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-danger">Reset</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Thumb</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr id="product-row-{{ $p->id }}">
                        <td style="width:80px">
                            <img src="{{ $p->mainImage() ? asset($p->mainImage()) : asset('assets/img/shape/no-image.png') }}"
                                class="img-fluid rounded" style="max-height:60px;">
                        </td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->sku }}</td>
                        <td>{{ $p->category->name ?? '-' }}</td>
                        <td>{{ $p->brand->name ?? '-' }}</td>
                        <td>₹{{ number_format($p->price, 2) }}</td>
                        <td>{{ $p->qty }}</td>
                        <td>
                            <button data-url="{{ route('admin.products.toggleFeatured', $p) }}"
                                class="btn btn-sm toggle-featured {{ $p->is_featured ? 'btn-success' : 'btn-outline-secondary' }}">
                                {{ $p->is_featured ? 'Yes' : 'No' }}
                            </button>
                        </td>
                        <td>
                            <button data-url="{{ route('admin.products.toggleActive', $p) }}"
                                class="btn btn-sm toggle-active {{ $p->status ? 'btn-success' : 'btn-outline-secondary' }}">
                                {{ $p->status ? 'Active' : 'Inactive' }}
                            </button>
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $p) }}"
                                class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.products.destroy', $p) }}" method="POST" class="d-inline-block"
                                onsubmit="return confirm('Delete product?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>


    <!-- Import Modal -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('admin.products.import') }}" enctype="multipart/form-data"
                class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Products (CSV / Excel)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="import-step-1">
                        <input type="file" name="file" id="import_file" class="form-control" accept=".csv,.xlsx,.xls"
                            required>

                        <select name="has_header" id="skip_header" class="form-control mt-2">
                            <option value="1" selected>Yes, first row is header</option>
                            <option value="0">No</option>
                        </select>

                        <button type="button" id="previewBtn" class="btn btn-primary mt-3 w-100">
                            Preview File
                        </button>
                    </div>

                    <div id="import-step-2" class="d-none">
                        <h6>Preview (First 5 Rows)</h6>
                        <table class="table table-bordered" id="preview-table"></table>

                        <button type="submit" class="btn btn-success w-100 mt-2">Confirm Import</button>
                    </div>
                    <div id="progress-section" class="d-none">
                        <div class="progress mt-3">
                            <div id="import-progress" class="progress-bar" style="width: 0%;">0%</div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                    <a href="{{ route('admin.products.sample.csv') }}" class="btn btn-sm btn-secondary">
                        Download Sample CSV
                    </a>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-theme">Import</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Active toggle
            $('.toggle-active').on('click', function() {
                const btn = $(this);
                const url = btn.data('url');
                $.post(url, {
                    _token: '{{ csrf_token() }}'
                }, function(res) {
                    if (res.status) {
                        btn.removeClass('btn-outline-secondary').addClass('btn-success').text(
                            'Active');
                    } else {
                        btn.removeClass('btn-success').addClass('btn-outline-secondary').text(
                            'Inactive');
                    }
                }).fail(() => alert('Error'));
            });

            // Featured toggle
            $('.toggle-featured').on('click', function() {
                const btn = $(this);
                const url = btn.data('url');
                $.post(url, {
                    _token: '{{ csrf_token() }}'
                }, function(res) {
                    if (res.is_featured) {
                        btn.removeClass('btn-outline-secondary').addClass('btn-success').text(
                            'Yes');
                    } else {
                        btn.removeClass('btn-success').addClass('btn-outline-secondary').text('No');
                    }
                }).fail(() => alert('Error'));
            });
        });

        $('#previewBtn').click(function() {
            const formData = new FormData();
            formData.append('file', $('#import_file')[0].files[0]);
            formData.append('has_header', $('#skip_header').val());
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route('admin.products.import.preview') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    $('#import-step-1').addClass('d-none');
                    $('#import-step-2').removeClass('d-none');

                    let html = "";

                    res.preview.forEach((row, index) => {
                        html += "<tr>";
                        row.forEach(col => html += `<td>${col ?? ""}</td>`);
                        html += "</tr>";
                    });

                    $("#preview-table").html(html);
                },
                error: function() {
                    alert("Invalid file or format.");
                }
            });
        });

        $('form').on('submit', function() {
            $('#progress-section').removeClass('d-none');

            let progress = 0;
            const interval = setInterval(() => {
                progress += 5;
                if (progress >= 95) clearInterval(interval);
                $('#import-progress').css('width', progress + '%').text(progress + '%');
            }, 300);
        });
    </script>
@endpush
