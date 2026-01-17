<!-- partials/filter-form.blade.php -->
<!-- NOTE: no <form> tag here, only filter fields -->
<div class="mb-3">
    <input type="text" name="search" class="form-control rounded-pill px-3"
           placeholder="Search products..." value="{{ request('search') }}">
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Category</label>
    <select name="category" class="form-select rounded-pill">
        <option value="">All</option>
        @foreach ($categories as $cat)
            <option value="{{ $cat->slug }}" @selected(request('category') == $cat->slug)>{{ $cat->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Brand</label>
    <select name="brand" class="form-select rounded-pill">
        <option value="">All</option>
        @foreach ($brands as $b)
            <option value="{{ $b->slug }}" @selected(request('brand') == $b->slug)>{{ $b->name }}</option>
        @endforeach
    </select>
</div>

<div class="row g-2 mb-3">
    <div class="col-6">
        <input type="number" name="price_min" class="form-control rounded-pill px-3" placeholder="Min" value="{{ request('price_min') }}">
    </div>
    <div class="col-6">
        <input type="number" name="price_max" class="form-control rounded-pill px-3" placeholder="Max" value="{{ request('price_max') }}">
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Sort By</label>
    <select name="sort" class="form-select rounded-pill">
        <option value="latest" @selected(request('sort') == 'latest')>Latest</option>
        <option value="price_asc" @selected(request('sort') == 'price_asc')>Price: Low → High</option>
        <option value="price_desc" @selected(request('sort') == 'price_desc')>Price: High → Low</option>
    </select>
</div>

<button type="button" id="reset-filters" class="btn btn-outline-primary w-100 rounded-pill mt-2">
    Reset Filters
</button>
