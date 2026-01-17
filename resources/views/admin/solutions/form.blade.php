<div class="card shadow-sm">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" value="{{ old('title', $solution->title ?? '') }}" class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Short Description</label>
            <textarea name="short_description" rows="3" class="form-control">{{ old('short_description', $solution->short_description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control wysiwyg" rows="6">{{ old('description', $solution->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if (!empty($solution?->image))
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $solution->image) }}" height="80" class="border rounded">
                </div>
            @endif
        </div>

        <div class="form-check form-switch">
            <input type="checkbox" name="status" class="form-check-input" id="status"
                {{ old('status', $solution->status ?? 1) ? 'checked' : '' }}>
            <label class="form-check-label" for="status">Active</label>
        </div>


        <div class="text-end">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save me-1"></i> Save
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">

    <script>
        $('.wysiwyg').summernote({
            height: 250,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
                ['view', ['codeview']]
            ]
        });
    </script>
@endpush
