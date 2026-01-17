<form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($product))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Product Name</label>
                        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
                            class="form-control" required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label fw-semibold">Short Description</label>
                        <textarea name="short_description" class="form-control" rows="3">{{ old('short_description', $product->short_description ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="long_description" class="form-control wysiwyg" rows="6">{{ old('long_description', $product->long_description ?? '') }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="features" class="form-label">Features</label>
                        <textarea name="features" id="features" class="form-control wysiwyg">{{ old('features', $product->features ?? '') }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="specifications" class="form-label">Specifications</label>
                        <textarea name="specifications" id="specifications" class="form-control wysiwyg">{{ old('specifications', $product->specifications ?? '') }}</textarea>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Product UID</label>
                        <input type="text" name="product_uid" value="{{ old('product_uid', $product->product_uid ?? '') }}"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Brand</label>
                        <select name="brand_id" class="form-select">
                            <option value="">Select Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category</label>
                        <select name="category_id" class="form-select">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Price</label>
                        <input type="number" name="price" step="0.01" class="form-control"
                            value="{{ old('price', $product->price ?? '') }}">
                    </div>

                    <div class="mb-3 form-check form-switch">
                        <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured"
                            value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="is_featured">Featured Product</label>
                    </div>

                    <div class="mb-3 form-check form-switch">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1"
                            {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="is_active">Active</label>
                    </div>
                </div>
            </div>

            <!-- Image Upload -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <label class="form-label fw-semibold">Product Images</label>
                    <input type="file" name="images[]" multiple class="form-control mb-3">

                    @if (isset($product) && $product->images->count())
                        <div class="d-flex flex-wrap gap-3">
                            @foreach ($product->images as $image)
                                <div class="position-relative" style="width: 100px; height: 100px;">
                                    <img src="{{ asset($image->image) }}" alt="Product Image"
                                        class="img-thumbnail w-100 h-100" style="object-fit: cover;">
                                    <button type="button"
                                        class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-image-btn"
                                        data-url="{{ route('admin.products.remove-image', ['product' => $product->id, 'image' => $image->id]) }}">
                                        &times;
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="text-end mt-4">
        <button type="submit" class="btn btn-theme px-4">Save Product</button>
    </div>
</form>

@push('scripts')
    <script>
        $(document).on('click', '.remove-image-btn', function() {
            const url = $(this).data('url');
            const $btn = $(this);

            if (!confirm('Are you sure you want to remove this image?')) return;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    if (res.success) {
                        $btn.closest('div.position-relative').fadeOut(300, function() {
                            $(this).remove();
                        });
                    } else {
                        alert('Failed to remove image');
                    }
                },
                error: function() {
                    alert('Something went wrong.');
                }
            });
        });
    </script>


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    {{-- Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <script>
        $(function() {
            // Initialize WYSIWYG editor
            $('.wysiwyg').summernote({
                height: 250,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['codeview']]
                ]
            });
        });
    </script>
@endpush
