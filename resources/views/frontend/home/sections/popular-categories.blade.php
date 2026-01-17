{{-- <section class="popular-categories py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0 text-theme">Popular Categories</h4>
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-theme rounded-pill">
                View All
            </a>
        </div>

        <div class="swiper categorySwiper">
            <div class="swiper-wrapper">
                @foreach ($popularCategories as $category)
                    <div class="swiper-slide">
                        <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                           class="category-card text-decoration-none text-center d-block p-4 shadow-sm bg-white rounded-3">
                            <div class="category-image-wrapper mb-3">
                                <img src="{{ $category->thumb_image ? asset($category->thumb_image) : asset('assets/img/shape/no-image.png') }}"
                                     alt="{{ $category->name }}" class="category-img">
                            </div>
                            <h6 class="fw-semibold text-dark mb-1">{{ $category->name }}</h6>
                            <p class="text-muted small mb-0">{{ $category->products_count ?? 0 }} Products</p>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Swiper Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section> --}}
@if ($popularCategories)
    <section class="popular-categories py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0 text-theme">Popular Categories</h4>
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-theme rounded-pill">
                    View All
                </a>
            </div>

            <div class="swiper commonSwiper">
                <div class="swiper-wrapper">
                    @foreach ($popularCategories as $category)
                        <div class="swiper-slide">
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                                class="category-card d-block bg-white text-center rounded-4 p-4 shadow-sm text-decoration-none">
                                <div class="ratio ratio-1x1 mb-3">
                                    <img src="{{ $category->thumb_image ? asset($category->thumb_image) : asset('assets/img/shape/no-image.png') }}"
                                        alt="{{ $category->name }}" class="object-fit-cover rounded-4 w-100 h-100">
                                </div>
                                <h6 class="fw-semibold text-dark mb-1">{{ $category->name }}</h6>
                                <p class="small text-muted mb-0">{{ $category->products_count ?? 0 }} Products</p>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

@endif
