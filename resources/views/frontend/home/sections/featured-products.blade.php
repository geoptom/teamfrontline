{{-- <section class="featured-products py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0 text-theme">Featured Products</h4>
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-theme rounded-pill">
                View All
            </a>
        </div>

        <div id="featuredCarousel" class="swiper">

            <div class="swiper mySwiper">
                <div class="swiper-wrapper mb-4">
                    @foreach ($featuredProducts as $product)
                        <div class="swiper-slide">
                            <div class="p-4 bg-gray-50 rounded-xl hover:shadow-md transition">
                                <img src="{{ $product->thumb_image ? asset($product->thumb_image) : asset('assets/img/shape/no-image.png') }}"
                                    alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-xl mb-3" />
                                <h6 class="card-title fw-semibold mb-1 text-truncate">
                                    <a href="{{ route('products.show', $product->slug) }}"
                                        class="text-dark text-decoration-none">
                                        {{ $product->name }}
                                    </a>
                                </h6>
                                <p class="text-sm text-gray-600 line-clamp-2">{{ $product->short_description }}</p>
                                <div class="mt-2 font-semibold" style="color: var(--theme-color, #B60A6E);">
                                    ₹{{ number_format($product->price) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation Buttons -->
                <div class="swiper-button-next "></div>
                <div class="swiper-button-prev "></div>
            </div>

        </div>
</section> --}}

{{-- <div class="bg-white rounded-2xl shadow p-6">
    <h2 class="text-2xl font-semibold mb-4" style="color: var(--theme-color, #B60A6E);">
        Featured Products
    </h2>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($featuredProducts as $product)
                <div class="swiper-slide">
                    <div class="p-4 bg-gray-50 rounded-xl hover:shadow-md transition">
                        <img
                            src="{{ $product->thumb_image && 1==2 ? asset('storage/' . $product->thumb_image) : asset('assets/img/shape/no-image.png') }}"
                            alt="{{ $product->name }}"
                            class="w-full h-48 object-cover rounded-xl mb-3"
                        />
                        <h3 class="font-semibold text-lg text-gray-800 truncate">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-600 line-clamp-2">{{ $product->short_description }}</p>
                        <div class="mt-2 font-semibold" style="color: var(--theme-color, #B60A6E);">
                            ₹{{ number_format($product->price) }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation Buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div> --}}


{{-- <section class="featured-products py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0 text-theme">Featured Products</h4>
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-theme rounded-pill">
                View All
            </a>
        </div>

        <div id="featuredCarousel" class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($featuredProducts as $product)
                    <div class="swiper-slide">
                        <div class="p-4 bg-white rounded-3 shadow-sm product-card h-100">
                            <div class="image-wrapper mb-3">
                                <img src="{{ $product->thumb_image ? asset($product->thumb_image) : asset('assets/img/shape/no-image.png') }}"
                                    alt="{{ $product->name }}"
                                    class="product-img" />
                            </div>
                            <h6 class="card-title fw-semibold mb-1 text-truncate">
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="">
                                    {{ $product->name }}
                                </a>
                            </h6>
                            <p class="text-muted small mb-2">{{ $product->short_description }}</p>
                            <div class="fw-semibold text-theme">
                                ₹{{ number_format($product->price) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section> --}}
@push('styles')
    <style>
        .product-card {
            height: 100%;
            min-height: 330px;
        }

        .category-products-swiper .swiper-slide {
            flex-shrink: 0;
        }
    </style>
@endpush
@if ($featuredProducts)
    <section class="featured-products py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0 text-theme">Featured Products</h4>
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-theme rounded-pill">
                    View All
                </a>
            </div>

            <div class="swiper category-products-swiper" id="featuredProductsSlider1">
                <div class="swiper-wrapper">
                    @foreach ($featuredProducts as $product)
                        <div class="swiper-slide">
                            <a href="{{ route('products.show', $product->slug) }}"
                                class="text-decoration-none text-dark d-block h-100">

                                <div class="product-card p-3 bg-white rounded-4 h-100 text-center">
                                    <div class="ratio ratio-1x1 mb-3">
                                        <img src="{{ $product->mainImage() ? getImageUrl($product->mainImage()) : asset('assets/img/shape/no-image.png') }}"
                                            alt="{{ $product->name }}" class="object-fit-cover rounded-4 w-100 h-100">
                                    </div>

                                    <h6 class="fw-semibold mb-1 text-truncate">
                                        {{ $product->name }}
                                    </h6>

                                    <div class="fw-bold text-theme">{{ $product->brand->name }}</div>
                                    <p class="small text-muted line-clamp-2 mb-1">
                                        {{ Illuminate\Support\Str::limit($product->short_description, 70) }}</p>
                                </div>

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

@push('scripts')
    <script>
        // document.addEventListener("DOMContentLoaded", () => {
        //     new Swiper("#featuredProductsSlider", {
        //         "loop": true,
        //         slidesPerView: 2,
        //         spaceBetween: 15,
        //         loop: true,
        //         loopAdditionalSlides: 10,
        //         navigation: {
        //             nextEl: ".swiper-button-next",
        //             prevEl: ".swiper-button-prev",
        //         },
        //         "autoplay": {
        //             "delay": 2000,
        //             "disableOnInteraction": false
        //         },
        //         "speed": 400,
        //         breakpoints: {
        //             576: {
        //                 slidesPerView: 3
        //             },
        //             768: {
        //                 slidesPerView: 4
        //             },
        //             992: {
        //                 slidesPerView: 5
        //             },
        //             1200: {
        //                 slidesPerView: 6
        //             },
        //         },
        //     });
        // });


        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll('.category-products-swiper').forEach(swiperEl => {

                const swiper = new Swiper(swiperEl, {
                    slidesPerView: 2,
                    spaceBetween: 15,
                    loop: true,
                    loopAdditionalSlides: 10,

                    navigation: {
                        nextEl: swiperEl.querySelector('.swiper-button-next'),
                        prevEl: swiperEl.querySelector('.swiper-button-prev'),
                    },

                    breakpoints: {
                        576: { slidesPerView: 3 },
                        768: { slidesPerView: 4 },
                        992: { slidesPerView: 5 },
                        1200: { slidesPerView: 6 },
                    },
                });

                // ⭐ CRITICAL FIX ⭐
                swiper.on('imagesReady', () => {
                    swiper.update();
                    swiper.updateSlides();
                    swiper.updateSize();
                    swiper.slideToLoop(0);
                });
            });
        });
    </script>
    {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {

                new Swiper(".productSwiper", {
                    slidesPerView: 2,
                    spaceBetween: 15,
                    loop: false,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        576: {
                            slidesPerView: 3
                        },
                        768: {
                            slidesPerView: 4
                        },
                        992: {
                            slidesPerView: 5
                        },
                        1200: {
                            slidesPerView: 6
                        },
                    },
                });
            });
        </script> --}}
@endpush
