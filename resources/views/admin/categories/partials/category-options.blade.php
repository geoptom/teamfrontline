@foreach ($categories as $category)
    <option value="{{ $category['id'] }}"
        {{ old('parent_id', $category['id'] ?? '') == $category['id'] ? 'selected' : '' }}>
        {{ $prefix . $category['name'] }}
    </option>
    @if (!empty($category['children']))
        @include('admin.categories.partials.category-options', [
            'categories' => $category['children'],
            'prefix' => $prefix . '— ',
        ])
    @endif
@endforeach
