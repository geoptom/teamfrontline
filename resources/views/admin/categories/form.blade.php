@csrf
<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">Category Name</label>
        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="parent_id" class="form-label">Parent Category</label>
        <select name="parent_id" id="parent_id" class="form-select form-control">
            <option value="">-- None --</option>
            @foreach ($formattedCategories as $cat)
                <option value="{{ $cat['id'] }}"
                    {{ old('parent_id', $category->parent_id ?? '') == $cat['id'] ? 'selected' : '' }}>
                    {{ $cat['name'] }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- <div class="col-md-6 mb-3">
        <label for="parent_id" class="form-label">Parent Category</label>
        <select name="parent_id" id="parent_id" class="form-select category-select">
            <option value="">-- None --</option>
            @foreach ($formattedCategories as $cat)
                <option value="{{ $cat['id'] }}"
                    {{ old('parent_id', $category->parent_id ?? '') == $cat['id'] ? 'selected' : '' }}>
                    {{ $cat['name'] }}
                </option>
            @endforeach
        </select>
    </div> --}}
    {{-- <div class="col-md-6">
        <label class="form-label">Parent Category</label>
        <select name="parent_id" class="form-select">
            <option value="">-- None --</option>
            @foreach ($groupedCategories as $group)
                <optgroup label="{{ $group['name'] }}">
                    @include('admin.categories.partials.category-options', [
                        'categories' => $group['children'],
                        'prefix' => '',
                    ])
                </optgroup>
            @endforeach
        </select>
    </div> --}}

    {{-- <div class="col-md-6">
        <label class="form-label">Parent Category</label>
        <select name="parent_id" class="form-select">
            <option value="">-- None --</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}"
                    {{ old('parent_id', $category->parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>
            @endforeach
        </select>
    </div> --}}

    {{-- <div class="col-md-6">
        <label class="form-label">Parent Category</label>
        <select name="parent_id" class="form-select">
            <option value="">-- None --</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}"
                    {{ old('parent_id', $category->parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>
            @endforeach
        </select>
    </div> --}}
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <label class="form-label">Icon</label>
        <div class="input-group">
            <input type="text" name="icon" id="icon" value="{{ old('icon', $category->icon ?? '') }}"
                class="form-control icon-picker" placeholder="Choose an icon">
            <button class="btn btn-outline-secondary" type="button">
                <i id="iconPreview" class="{{ old('icon', $category->icon ?? 'fa-solid fa-star') }}"></i>
            </button>
        </div>
        <small class="text-muted">
            Pick an icon or enter any
            <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a> class (e.g. <code>fa-solid
                fa-bolt</code>).
        </small>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">Category Thump Image</label>
        <input type="file" name="thump_image" class="form-control">
        @if (!empty($category->thump_image))
            <div class="mt-2">
                <img src="{{ asset('storage/' . $category->thump_image) }}" alt="" width="80" height="80"
                    class="rounded border">
                <a href="{{ route('admin.categories.remove-image', ['category' => $category->id, 'type' => 'thump_image']) }}"
                    class="btn btn-sm btn-outline-danger ms-2">Remove</a>
            </div>
        @endif
    </div>
    <div class="col-md-6">
        <label class="form-label">Category Banner</label>
        <input type="file" name="banner" class="form-control">
        @if (!empty($category->banner))
            <div class="mt-2">
                <img src="{{ asset('storage/' . $category->banner) }}" alt="Banner" width="150"
                    class="rounded border">
                <a href="{{ route('admin.categories.remove-image', ['category' => $category->id, 'type' => 'banner']) }}"
                    class="btn btn-sm btn-outline-danger ms-2">Remove</a>
            </div>
        @endif
    </div>
</div>


<div class="mb-3">
    <label class="form-label">Short Description</label>
    <textarea name="short_description" rows="3" class="form-control">{{ old('short_description', $category->short_description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control wysiwyg" rows="6">{{ old('description', $category->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Status</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" value="1"
            {{ old('status', $category->status ?? 1) == 1 ? 'checked' : '' }}>
        <label class="form-check-label">Active</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" value="0"
            {{ old('status', $category->status ?? 1) == 0 ? 'checked' : '' }}>
        <label class="form-check-label">Inactive</label>
    </div>
</div>

<button type="submit" class="btn btn-theme">Save</button>
<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>


@push('styles')
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/modules/fontawesome-iconpicker/css/fontawesome-iconpicker.min.css') }}">


    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <style>
        /* Match Choices.js dropdown height with Bootstrap input height */
        .choices__inner {
            min-height: 38px !important;
            /* same as .form-control */
            padding: 6px 12px !important;
            border-radius: 0.375rem;
            /* same as Bootstrap rounded-md */
        }

        /* .choices__input {
                margin-bottom: 0 !important;
                padding: 0 !important;
            } */

        /* Ensure consistent vertical alignment */
        /* .choices__inner,
            .choices__input {
                line-height: 1.5 !important;
                height: auto !important;
            } */
    </style>
@endpush

@push('scripts')
    {{-- Font Awesome Icon Picker --}}
    <script src="{{ asset('backend/assets/modules/fontawesome-iconpicker/js/fontawesome-iconpicker.min.js') }}"></script>

    {{-- Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <!-- JS -->
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}


    <script>
        $(function() {
            // Initialize icon picker
            $('.icon-picker').iconpicker({
                placement: 'bottomLeft',
                animation: false
            }).on('iconpickerSelected', function(event) {
                $('#iconPreview').attr('class', event.iconpickerValue);
            });

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

    {{-- <script>
        $(document).ready(function() {
            $('.category-select').select2({
                placeholder: 'Select Parent Category',
                allowClear: true,
                width: '100%'
            });
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const element = document.getElementById('parent_id');
            new Choices(element, {
                searchEnabled: true,
                itemSelectText: '',
                shouldSort: false,
                placeholder: true,
                placeholderValue: 'Select Parent Category'
            });
        });
    </script>
@endpush
