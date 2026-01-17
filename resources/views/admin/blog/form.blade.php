<div class="card shadow-sm">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" value="{{ old('title', $blog->title ?? '') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if (!empty($blog?->image))
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $blog->image) }}" height="80" class="border rounded">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control">
                <option value="">Select</option>
                @isset($categories)
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (old('category_id', $blog->category_id ?? '') == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                @endisset
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Short Description</label>
            <textarea name="excerpt" class="form-control " rows="6">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control wysiwyg" rows="6">{{ old('content', $blog->content ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Seo Title</label>
            <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title', $blog->seo_title ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Seo Description</label>
            <textarea name="seo_description" class="form-control">{{ old('seo_description', $blog->seo_description ?? '') }}</textarea>
        </div>

        <div class="form-check form-switch mb-3">
            <input type="checkbox" name="status" class="form-check-input" id="status"
                {{ old('status', $blog->status ?? 1) ? 'checked' : '' }} value="1">
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
