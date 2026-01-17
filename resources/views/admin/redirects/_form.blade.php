<form
    action="{{ isset($redirect)
        ? route('admin.redirects.update', $redirect->id)
        : route('admin.redirects.store') }}"
    method="POST">

    @csrf

    @if(isset($redirect))
        @method('PUT')
    @endif


    <!-- Redirect Type -->
    <div class="mb-3">
        <label class="form-label fw-semibold">Redirect Type *</label>
        <select name="type" id="redirectType" class="form-select" required>
            <option value="">Select type</option>
            @foreach($types as $key => $label)
                <option value="{{ $key }}"
                    {{ (old('type', $currentType ?? '') == $key) ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
    </div>


    <!-- SLUG FIELDS -->
    <div id="slugFields" class="{{ (old('type', $currentType ?? '') == 'url') ? 'd-none' : '' }}">

        <div class="mb-3">
            <label class="form-label">Old Slug *</label>
            <input type="text"
                   name="old_slug"
                   class="form-control"
                   value="{{ old('old_slug', $redirect->old_slug ?? '') }}"
                   placeholder="old-slug-name">
        </div>

        <div class="mb-3">
            <label class="form-label">New Slug</label>
            <input type="text"
                   name="new_slug"
                   class="form-control"
                   value="{{ old('new_slug', $redirect->new_slug ?? '') }}"
                   placeholder="new-slug-name">
        </div>

    </div>


    <!-- URL FIELDS -->
    <div id="urlFields" class="{{ (old('type', $currentType ?? '') != 'url') ? 'd-none' : '' }}">

        <div class="mb-3">
            <label class="form-label">Old URL Path *</label>
            <input type="text"
                   name="old_path"
                   class="form-control"
                   value="{{ old('old_path', $redirect->old_path ?? '') }}"
                   placeholder="/about-us">
        </div>

        <div class="mb-3">
            <label class="form-label">New URL Path</label>
            <input type="text"
                   name="new_path"
                   class="form-control"
                   value="{{ old('new_path', $redirect->new_path ?? '') }}"
                   placeholder="/contact-us">
        </div>

    </div>


    <!-- ACTIVE STATUS -->
    @if(isset($redirect))
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="is_active" class="form-select">
                <option value="1" {{ $redirect->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$redirect->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    @endif


    <button class="btn btn-primary">
        {{ isset($redirect) ? 'Update Redirect' : 'Save Redirect' }}
    </button>

    <a href="{{ route('admin.redirects.index') }}" class="btn btn-secondary">Cancel</a>

</form>


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const typeSelect = document.getElementById("redirectType");
    const slugFields = document.getElementById("slugFields");
    const urlFields  = document.getElementById("urlFields");

    function toggleFields() {
        if (typeSelect.value === "url") {
            slugFields.classList.add('d-none');
            urlFields.classList.remove('d-none');
        } else {
            slugFields.classList.remove('d-none');
            urlFields.classList.add('d-none');
        }
    }

    typeSelect.addEventListener("change", toggleFields);
    toggleFields();
});
</script>
@endpush
