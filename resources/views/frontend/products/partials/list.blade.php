@push('style')
    <style>
        .quick-view-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            opacity: 0;
            transition: opacity 0.28s ease;
            border-radius: 0.75rem 0.75rem 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: none;
        }

        /* Show overlay only on hover */
        .product-card:hover .quick-view-overlay {
            opacity: 1;
            pointer-events: auto;
        }

        /* Initially hide the button */
        .quick-view-overlay a.btn {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.28s ease;
        }

        /* Show button on hover */
        .product-card:hover .quick-view-overlay a.btn {
            opacity: 1;
            pointer-events: auto;
        }
    </style>
@endpush

{{-- @forelse($products as $product)
<div class="col-md-4 col-sm-6">
    <div class="card border-0 shadow-sm product-card h-100">
        <img src="{{ $product->thumb_image ?? asset('images/no-image.png') }}"
             class="card-img-top rounded-top" alt="{{ $product->name }}">
        <div class="card-body">
            <h6 class="fw-bold mb-1">{{ $product->name }}</h6>
            <p class="text-muted small mb-2">{{ $product->brand->name ?? '' }}</p>
            <p class="text-truncate small">{{ Str::limit($product->short_description, 60) }}</p>
        </div>
        <div class="card-footer bg-white border-0">
            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-primary w-100">
                <i class="bi bi-eye me-1"></i> View Details
            </a>
        </div>
    </div>
</div>
@empty
<p class="text-center text-muted py-4">No products found.</p>
@endforelse --}}
{{-- @foreach ($products as $product)
<div class="col-md-4 product-item">
    <div class="card border-0 shadow-sm h-100">
        <div class="ratio ratio-4x3">
            <img src="{{ asset($product->thumb_image) }}" class="card-img-top object-fit-cover"
                 alt="{{ $product->name }}">
        </div>
        <div class="card-body d-flex flex-column">
            <h6 class="fw-semibold text-truncate">{{ $product->name }}</h6>
            <p class="text-muted small mb-2">{{ Str::limit($product->short_description, 70) }}</p>
            <div class="mt-auto d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">₹{{ number_format($product->price, 2) }}</span>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
    </div>
</div>
@endforeach --}}
{{-- <style>
.product-card {
    transition: all 0.3s ease-in-out;
}
.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.1);
}
.wsus__product_img img {
    transition: transform 0.4s ease-in-out;
}
.wsus__product_img:hover img {
    transform: scale(1.05);
}
</style>

@foreach ($products as $product)
<div class="col-md-4 col-sm-6">
    <div class="wsus__product_item shadow-sm border-0 rounded-3 h-100 overflow-hidden product-card">
        <div class="wsus__product_img position-relative">
            <img src="{{ $product->thumb_image ?? asset('images/no-image.png') }}"
                 class="img-fluid w-100"
                 alt="{{ $product->name }}">

            @if ($product->discount > 0)
                <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                    -{{ $product->discount }}%
                </span>
            @endif
        </div>

        <div class="wsus__product_content p-3">
            <h6 class="fw-semibold text-truncate mb-1">
                <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none">
                    {{ $product->name }}
                </a>
            </h6>
            <p class="text-muted small mb-1">{{ $product->brand->name ?? '' }}</p>
            <p class="text-primary fw-bold mb-2">
                @if ($product->price)
                    ₹{{ number_format($product->price, 2) }}
                @else
                    <span class="text-muted">Contact for price</span>
                @endif
            </p>
            <a href="{{ route('products.show', $product->slug) }}"
               class="btn btn-outline-primary btn-sm w-100">
                <i class="bi bi-eye me-1"></i> View Details
            </a>
        </div>
    </div>
</div>
@endforeach --}}


{{-- @foreach ($products as $product)
<div class="col-md-4 col-sm-6">
    <div class="card border-0 shadow-sm h-100 rounded-3 product-card overflow-hidden">
        <div class="ratio ratio-4x3 bg-light">
            <img src="{{ asset($product->thumb_image ?? 'images/no-image.png') }}"
                 alt="{{ $product->name }}"
                 class="card-img-top object-fit-cover">
        </div>

        <div class="card-body d-flex flex-column">
            <h6 class="fw-semibold text-truncate">{{ $product->name }}</h6>
            <p class="text-muted small mb-2">{{ Str::limit($product->short_description, 70) }}</p>
            <div class="mt-auto d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">₹{{ number_format($product->price, 2) }}</span>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
    </div>
</div>
@endforeach --}}

{{-- @foreach ($products as $product)
<div class="col-6 col-md-4 col-lg-3 col-xl-2-4">
    <div class="card border-0 shadow-sm h-100 rounded-3 product-card overflow-hidden">
        <div class="ratio ratio-1x1 bg-light">
            <img src="{{ asset($product->thumb_image ?? 'images/no-image.png') }}"
                 alt="{{ $product->name }}"
                 class="card-img-top object-fit-cover">
        </div>

        <div class="card-body d-flex flex-column">
            <h6 class="fw-semibold text-truncate" title="{{ $product->name }}">
                {{ $product->name }}
            </h6>
            <p class="text-muted small mb-2">{{ Str::limit($product->short_description, 70) }}</p>

            <div class="mt-auto d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">₹{{ number_format($product->price, 2) }}</span>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-primary">
                    View
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach
 --}}


{{-- @foreach ($products as $product)
<div class="col-6 col-md-4 col-lg-4 col-xl-2-4">
    <div class="card border-0 shadow-sm h-100 rounded-3 product-card overflow-hidden position-relative">
        <div class="ratio ratio-1x1 bg-light position-relative">
            <img src="{{ asset($product->thumb_image ?? 'images/no-image.png') }}"
                 alt="{{ $product->name }}"
                 class="card-img-top object-fit-cover">

            <!-- Quick View Overlay -->
            <div class="quick-view-overlay d-flex flex-column justify-content-center align-items-center text-center">
                <h6 class="text-white mb-2">{{ Str::limit($product->name, 25) }}</h6>
                <p class="text-white small mb-3">{{ Str::limit($product->short_description, 50) }}</p>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-light">View Details</a>
            </div>
        </div>

        <div class="card-body d-flex flex-column">
            <h6 class="fw-semibold text-truncate" title="{{ $product->name }}">
                {{ $product->name }}
            </h6>
            <p class="text-muted small mb-2">{{ Str::limit($product->short_description, 70) }}</p>

            <div class="mt-auto d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">₹{{ number_format($product->price, 2) }}</span>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-primary">
                    View
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach --}}
{{-- @foreach ($products as $product)
<div class="col-6 col-md-4 col-lg-4 col-xl-2-4">
    <div class="card border-0 shadow-sm h-100 product-card">
        <div class="ratio ratio-1x1 bg-light position-relative">
            <img src="{{ asset($product->thumb_image ?? 'images/no-image.png') }}"
                 alt="{{ $product->name }}"
                 class="card-img-top object-fit-cover">

            <div class="quick-view-overlay d-flex flex-column justify-content-center align-items-center text-center">
                <h6 class="text-white mb-2">{{ Str::limit($product->name, 25) }}</h6>
                <p class="text-white small mb-3">{{ Str::limit($product->short_description, 50) }}</p>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-light">View Details</a>
            </div>
        </div>

        <div class="card-body d-flex flex-column mt-2">
            <h6 class="fw-semibold text-truncate">{{ $product->name }}</h6>
            <p class="text-muted small mb-2">{{ Str::limit($product->short_description, 70) }}</p>
            <div class="mt-auto d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">₹{{ number_format($product->price, 2) }}</span>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-primary">View</a>
            </div>
        </div>
    </div>

</div>
@endforeach --}}


{{-- @foreach ($products as $product)
    <div class="col-6 col-md-4 col-lg-4 col-xl-2-4">
        <div class="card border-0 shadow-sm h-100 product-card">
            <div class="ratio ratio-4x3 bg-light position-relative">
                <img src="{{ asset($product->thumb_image ?? 'images/no-image.png') }}" alt="{{ $product->name }}"
                    class="card-img-top object-fit-cover img-fluid w-100 img_1">

                <div class="quick-view-overlay d-flex flex-column justify-content-center align-items-center text-center">
                    <h6 class="text-white mb-2">{{ Str::limit($product->name, 25) }}</h6>
                    <p class="text-white small mb-3">{{ Str::limit($product->short_description, 50) }}</p>
                    <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-light">View Details</a>
                </div>
            </div>

            <div class="card-body d-flex flex-column mt-2">
                <h6 class="fw-semibold text-truncate">{{ $product->name }}</h6>
                <p class="text-muted small mb-2">{{ Str::limit($product->short_description, 70) }}</p>
                <div class="mt-auto d-flex justify-content-between align-items-center">
                    <span class="fw-bold text-primary">₹{{ number_format($product->price, 2) }}</span>
                    <a href="{{ route('products.show', $product->slug) }}"
                        class="btn btn-sm btn-outline-primary">View</a>
                </div>
            </div>
        </div>

    </div>
@endforeach --}}
{{-- @foreach ($products as $product)
<div class="col-6 col-md-4 col-lg-4">
    <div class="card border-0 shadow-sm h-100 product-card">
        <div class="ratio ratio-4x3 bg-light position-relative">
            <img src="{{ asset($product->thumb_image ?? 'images/no-image.png') }}"  alt="{{ $product->name }}"  class="card-img-top img-fluid w-100 object-fit-cover">

            <div class="quick-view-overlay d-flex flex-column justify-content-center align-items-center text-center px-3">
                <h6 class="text-white mb-2">{{ Str::limit($product->name, 25) }}</h6>
                <p class="text-white small mb-3">{{ Str::limit($product->short_description, 50) }}</p>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-light rounded-pill">View Details</a>
            </div>
        </div>

        <div class="card-body d-flex flex-column mt-2">
            <h6 class="fw-semibold text-truncate">{{ $product->name }}</h6>
            <p class="text-muted small mb-2">{{ Str::limit($product->short_description, 70) }}</p>
            <div class="mt-auto d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">₹{{ number_format($product->price, 2) }}</span>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-primary rounded-pill">View</a>
            </div>
        </div>
    </div>
</div>
@endforeach --}}

{{-- <!-- partials/list.blade.php --> --}}
@foreach ($products as $product)
    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
        <div class="card border-0 shadow-sm h-100 product-card">
            <div class="ratio ratio-4x3 bg-light position-relative rounded-top">
                <img src="{{ $product->thumb_image ? getImageUrl($product->thumb_image) : asset('assets/img/shape/no-image.png') }}"
                    alt="{{ $product->name }}" class="card-img-top img-fluid w-100 h-100 object-fit-cover rounded-top">
                <div class="quick-view-overlay d-flex justify-content-center align-items-center">
                    <a href="{{ route('products.show', $product->slug) }}"
                        class="btn btn-light btn-sm text-primary fw-semibold px-3 py-1 rounded-pill">
                        View Details
                    </a>
                </div>
            </div>
            <div class="card-body text-center p-3">
                <h6 class="card-title fw-semibold mb-1 text-truncate">
                    <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none">
                        {{ $product->name }}
                    </a>
                </h6>
                @if ($product->brand)
                    <small class="text-muted d-block mb-1">{{ $product->brand->name }}</small>
                @endif
                {{-- @if ($product->price)
                    <span class="fw-bold text-primary">₹{{ number_format($product->price, 2) }}</span>
                @endif --}}
            </div>
        </div>
    </div>
@endforeach




{{--
    <div class="col-xl-4 col-sm-6">
        <div class="wsus__product_item">
            <span class="wsus__new">{{ productType($product->product_type) }}</span>
            <a class="wsus__pro_link" href="{{ route('products.show', $product->slug) }}">
                <img src="{{ asset($product->thumb_image) }}" alt="product" class="img-fluid w-100 img_1" />
                <img src="@if (isset($product->images[0]->image)) {{ asset($product->images[0]->image) }}@else{{ asset($product->thumb_image) }} @endif" alt="product" class="img-fluid w-100 img_2" />
            </a>
            <ul class="wsus__single_pro_icon">
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="show_product_modal"
                        data-id="{{ $product->id }}"><i class="far fa-eye"></i></a></li>
                <li><a href="#" class="add_to_wishlist" data-id="{{ $product->id }}"><i
                            class="far fa-heart"></i></a></li>
            </ul>
            <div class="wsus__product_details">
                <a class="wsus__category" href="#">{{ $product->category->name }} </a>
                <p class="wsus__pro_rating">

                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $product->ratings_avg_review)
                            <i class="fas fa-star"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor

                    <span>({{ $product->reviews_count }} review)</span>
                </p>
                <a class="wsus__pro_name"
                    href="{{ route('products.show', $product->slug) }}">{{ limitText($product->name, 53) }}</a>
                @if (checkDiscount($product))
                    <p class="wsus__price">{{ $settings['currency_icon'] }}{{ $product->offer_price }}
                        <del>{{ $settings['currency_icon'] }}{{ $product->price }}</del></p>
                @else
                    <p class="wsus__price">{{ $settings['currency_icon'] }}{{ $product->price }}</p>
                @endif
                <form class="shopping-cart-form">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    @foreach ($product->variants as $variant)
                        @if ($variant->status != 0)
                            <select class="d-none" name="variants_items[]">
                                @foreach ($variant->productVariantItems as $variantItem)
                                    @if ($variantItem->status != 0)
                                        <option value="{{ $variantItem->id }}"
                                            {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                            {{ $variantItem->name }} (${{ $variantItem->price }})</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    @endforeach
                    <input class="" name="qty" type="hidden" min="1" max="100" value="1" />
                    <button class="add_cart" type="submit">add to cart</button>
                </form>
            </div>
        </div>
    </div> --}}
