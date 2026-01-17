<div class="row">
    <div class="col-md-12 mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $page->title ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug', $page->slug ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Banner Image</label>
        <input type="file" name="banner_image" class="form-control">
        @if(!empty($page->banner_image))
            <img src="{{ asset('storage/' . $page->banner_image) }}" alt="" style="max-height:80px;" class="mt-2">
        @endif
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Excerpt</label>
        <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $page->excerpt ?? '') }}</textarea>
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Content</label>
        <textarea name="content"  class="form-control wysiwyg" rows="8">{{ old('content', $page->content ?? '') }}</textarea>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Visible</label>
        <div class="form-check">
            <input type="checkbox" name="is_visible" class="form-check-input" value="1" {{ (old('is_visible', $page->is_visible ?? 1) ? 'checked' : '') }}>
            <label class="form-check-label">Show on site</label>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Show in Menu</label>
        <div class="form-check">
            <input type="checkbox" name="show_in_menu" class="form-check-input" value="1" {{ (old('show_in_menu', $page->show_in_menu ?? 0) ? 'checked' : '') }}>
            <label class="form-check-label">Add to menu</label>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">SEO Title</label>
        <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title', $page->seo_title ?? '') }}">
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">SEO Description</label>
        <textarea name="seo_description" class="form-control" rows="2">{{ old('seo_description', $page->seo_description ?? '') }}</textarea>
    </div>
</div>


@push('styles')

    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('scripts')
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