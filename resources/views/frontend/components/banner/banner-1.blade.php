<section class="full-width-slider banner-type-1">
    <div class="swiper bannerSwiper1 bg-smoke">
        <div class="swiper-wrapper">
            @php $index = 1; @endphp
            @foreach ($products as $product)
                <div class="swiper-slide" data-bg-src="{{ asset($product->background_image) }}">

                    <div class="slide-overlay"></div>

                    <div
                        class="slide-content container d-flex align-items-center justify-content-between flex-column flex-md-row">

                        {{-- EVEN SLIDES → TEXT LEFT, IMAGE RIGHT --}}
                        @if ($index % 2 === 0)
                            {{-- TEXT LEFT --}}
                            <div class="text-content text-light order-2 order-md-1 banner-text-col">
                                <h2 class="banner-title fw-bold text-smoke">{{ $product->name }}</h2>
                                <p class="banner-desc text-smoke">{{ Str::limit($product->short_description, 120) }}</p>
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="btn btn-theme btn-outline-theme btn-lg rounded-pill px-4">
                                    Shop Now
                                </a>
                            </div>

                            {{-- IMAGE RIGHT (white box) --}}
                            <div class="image-box bg-white rounded shadow p-4 order-1 order-md-2 banner-image-col">
                                <img src="{{ getImageUrl($product->mainImage()) }}" alt="{{ $product->name }}"
                                    class="img-fluid banner-image">
                            </div>
                        @else
                            {{-- ODD SLIDES → IMAGE LEFT, TEXT RIGHT --}}

                            {{-- IMAGE LEFT (no box) --}}
                            <div
                                class="image-left d-flex justify-content-center align-items-center order-1 order-md-1 banner-image-col">
                                <img src="{{ $product->id == 35 ? getImageUrl($product->mainImage()) : asset('uploads/800x600-gxe-1-3kva-hero-image.webp') }}"
                                    alt="{{ $product->name }}" class="img-fluid banner-image">
                            </div>

                            {{-- TEXT RIGHT --}}
                            <div class="text-content text-light order-2 order-md-2 banner-text-col">
                                <h2 class="banner-title fw-bold text-smoke">{{ $product->name }}</h2>
                                <p class="banner-desc text-smoke">{{ Str::limit($product->short_description, 120) }}</p>
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="btn btn-theme btn-outline-theme btn-lg rounded-pill px-4">
                                    Shop Now
                                </a>
                            </div>
                        @endif

                        @php $index++; @endphp
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation -->
        <div class="swiper-button-next text-theme"></div>
        <div class="swiper-button-prev text-theme"></div>

        <!-- Pagination -->
        {{-- <div class="swiper-pagination"></div> --}}
    </div>
</section>

<style>
    /* ---------------------------------------------
   ORIGINAL DESIGN — CLEAN OPTIMIZED CSS
---------------------------------------------- */

    .banner-type-1 .swiper-slide {
        position: relative;
        min-height: 500px;
        display: flex !important;
        align-items: center;
    }

    .banner-type-1 .slide-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, .55);
        z-index: 1;
    }

    .banner-type-1 .slide-content {
        position: relative;
        z-index: 2;
        width: 100%;
        padding: 2rem 0;
        gap: 2rem;
    }

    .banner-text-col {
        flex: 0 0 50%;
        max-width: 50%;
    }

    .banner-image-col {
        flex: 0 0 50%;
        max-width: 50%;
        height: 350px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .banner-image {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }

    .image-box {
        background: #fff !important;
        border-radius: .75rem;
        height: 350px;
    }

    .image-left {
        background: transparent;
        height: 350px;
    }

    /* ---------------------------------------------
   MOBILE RESPONSIVE FIXES
---------------------------------------------- */

    @media(max-width: 767px) {
        .banner-type-1 .slide-content {
            flex-direction: column !important;
            text-align: center;
            padding: 1.5rem !important;
        }

        .banner-text-col,
        .banner-image-col {
            max-width: 100% !important;
            flex: unset !important;
        }

        .image-box,
        .image-left {
            height: 260px !important;
            margin-bottom: 1rem;
        }

        .banner-title {
            font-size: 1.5rem !important;
        }

        .banner-desc {
            font-size: .85rem !important;
            margin-bottom: 1rem;
        }

        .banner-type-1 .btn {
            padding: .5rem 1.25rem;
            font-size: .9rem;
        }
    }
</style>
