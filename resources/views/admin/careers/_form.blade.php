@csrf
<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $career->title ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Location</label>
        <input type="text" name="location" class="form-control" value="{{ old('location', $career->location ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Type</label>
        <input type="text" name="type" class="form-control" value="{{ old('type', $career->type ?? '') }}">
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Summary</label>
        <textarea name="summary" class="form-control" rows="2">{{ old('summary', $career->summary ?? '') }}</textarea>
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control tinymce" rows="6">{{ old('description', $career->description ?? '') }}</textarea>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="1" {{ old('status', $career->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $career->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
</div>
