{{-- <div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $slider['title'] ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="sub_title" class="form-label">Subtitle</label>
            <input type="text" name="sub_title" id="sub_title" class="form-control" value="{{ old('sub_title', $slider['sub_title'] ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="btn_text" class="form-label">Button Text</label>
            <input type="text" name="btn_text" id="btn_text" class="form-control" value="{{ old('btn_text', $slider['btn_text'] ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="btn_link" class="form-label">Button Link</label>
            <input type="text" name="btn_link" id="btn_link" class="form-control" value="{{ old('btn_link', $slider['btn_link'] ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="img_path" class="form-label">Image</label>
            <input type="file" name="img_path" id="img_path" class="form-control" accept="image/*">
            @if (!empty($slider['img_path']))
                <div class="mt-2">
                    <img src="{{ asset($slider['img_path']) }}" alt="" width="120">
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="1" {{ (old('status', $slider['status'] ?? 1) == 1) ? 'selected' : '' }}>Active</option>
                <option value="0" {{ (old('status', $slider['status'] ?? 1) == 0) ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>
</div> --}}


<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Desktop Image (1920px wide)</label>
        <input type="file" name="img_desktop" class="form-control">
        @if (isset($slider['img_desktop']))
            <img src="{{ asset($slider['img_desktop']) }}" class="img-thumbnail mt-2" width="150">
        @endif
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Tablet Image (1200px wide)</label>
        <input type="file" name="img_tablet" class="form-control">
        @if (isset($slider['img_tablet']))
            <img src="{{ asset($slider['img_tablet']) }}" class="img-thumbnail mt-2" width="150">
        @endif
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Mobile Image (768px wide)</label>
        <input type="file" name="img_mobile" class="form-control">
        @if (isset($slider['img_mobile']))
            <img src="{{ asset($slider['img_mobile']) }}" class="img-thumbnail mt-2" width="150">
        @endif
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ $slider['title'] ?? '' }}">
</div>

<div class="mb-3">
    <label class="form-label">Sub Title</label>
    <textarea name="sub_title" class="form-control" rows="2">{{ $slider['sub_title'] ?? '' }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Button Text</label>
    <input type="text" name="btn_text" class="form-control" value="{{ $slider['btn_text'] ?? '' }}">
</div>

<div class="mb-3">
    <label class="form-label">Button Link</label>
    <input type="text" name="btn_link" class="form-control" value="{{ $slider['btn_link'] ?? '' }}">
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-select">
        <option value="1" {{ old('status', $slider['status'] ?? 1) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $slider['status'] ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
