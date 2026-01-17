<div class="card shadow-sm">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Icon</label>
            <div class="input-group">
                <input type="text" name="icon" id="icon" value="{{ old('icon', $service->icon ?? '') }}"
                    class="form-control icon-picker" placeholder="Choose an icon">
                <button class="btn btn-outline-secondary" type="button">
                    <i id="iconPreview" class="{{ old('icon', $service->icon ?? 'fa-solid fa-star') }}"></i>
                </button>
            </div>
            <small class="text-muted">
                Pick an icon or enter any
                <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a> class (e.g. <code>fa-solid
                    fa-bolt</code>).
            </small>
        </div>

        <div class="mb-3">
            <label class="form-label">Short Description</label>
            <textarea name="short_description" rows="3" class="form-control">{{ old('short_description', $service->short_description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control wysiwyg" rows="6">{{ old('description', $service->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if (!empty($service?->image))
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $service->image) }}" height="80" class="border rounded">
                </div>
            @endif
        </div>

        {{-- <div class="form-check form-switch">
            <input type="checkbox" name="status" class="form-check-input" id="status"
                {{ old('status', $service->status ?? 1) ? 'checked' : '' }}>
            <label class="form-check-label" for="status">Active</label>
        </div> --}}

        <div class="form-check form-switch">
            <input type="checkbox" name="status" class="form-check-input" id="status"
                {{ old('status', $service->status ?? 1) ? 'checked' : '' }} value="1">
            <label class="form-check-label" for="status">Active</label>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-theme">
                <i class="fa fa-save me-1"></i> Save
            </button>
        </div>
    </div>
</div>

@push('styles')
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/modules/fontawesome-iconpicker/css/fontawesome-iconpicker.min.css') }}">


    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('scripts')
    {{-- Font Awesome Icon Picker --}}
    <script src="{{ asset('backend/assets/modules/fontawesome-iconpicker/js/fontawesome-iconpicker.min.js') }}"></script>

    {{-- Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

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
@endpush
