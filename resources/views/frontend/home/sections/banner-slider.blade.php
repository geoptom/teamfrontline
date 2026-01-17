<!-- Swiper CSS -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@if ($banner == '1')

    @php $sliders = json_decode($settings['sliders']['homepage'] ?? '[]', true); @endphp
    <!-- Include Swiper CSS -->

    <section class="full-width-slider">
        <div class="swiper mySwiper bg-smoke">
            <div class="swiper-wrapper">
                @php $index = 1; @endphp
                @foreach ($featuredProducts as $product)
                    <div class="swiper-slide" style="background-image: url('{{ asset($product->background_image) }}')">
                        <div class="slide-overlay1"></div>
                        <div
                            class="slide-content d-flex align-items-center justify-content-between container flex-column flex-md-row">
                            @if ($index % 2 === 0)
                                {{-- Text Left --}}
                                <div class="text-content text-light order-2 order-md-1"
                                    style="flex: 0 0 50%; max-width: 50%;">
                                    <h2 class="display-5 fw-bold text-smoke">{{ $product->name }}</h2>
                                    <p class="lead text-smoke">{{ Str::limit($product->short_description, 120) }}</p>
                                    <a href="{{ route('products.show', $product->slug) }}"
                                        class="btn btn-theme btn-outline-theme btn-lg rounded-pill px-4">Shop Now</a>
                                </div>
                                {{-- Image Right with white box --}}
                                <div class="image-box bg-white rounded shadow p-4 d-flex justify-content-center align-items-center order-1 order-md-2"
                                    style="flex: 0 0 50%; max-width: 50%; height: 350px;">
                                    <img src="{{ getImageUrl($product->mainImage()) }}" alt="{{ $product->name }}"
                                        class="img-fluid"
                                        style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                </div>
                            @else
                                {{-- Image Left without box --}}
                                <div class="image-left d-flex justify-content-center align-items-center order-1 order-md-1"
                                    style="flex: 0 0 50%; max-width: 50%; height: 350px;">
                                    <img src="{{ asset($product->id == 35 ? getImageUrl($product->mainImage()) : 'uploads/800x600-gxe-1-3kva-hero-image.webp') }}"
                                        alt="{{ $product->name }}" class="img-fluid"
                                        style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                </div>
                                {{-- Text Right --}}
                                <div class="text-content text-light order-2 order-md-2"
                                    style="flex: 0 0 50%; max-width: 50%;">
                                    <h2 class="display-5 fw-bold text-smoke">{{ $product->name }}</h2>
                                    <p class="lead text-smoke">{{ Str::limit($product->short_description, 120) }}</p>
                                    <a href="{{ route('products.show', $product->slug) }}"
                                        class="btn btn-theme btn-outline-theme btn-lg rounded-pill px-4">Shop Now</a>
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
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Swiper JS -->
    <script>
        new Swiper('.mySwiper', {
            loop: true,
            autoHeight: false,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>

    <style>
        /* Padding top to prevent overlap with fixed menu */
        .full-width-slider {
            padding-top: 60px;
            /* adjust according to your menu height */
        }

        .mySwiper .swiper-slide {
            position: relative;
            background-size: cover;
            background-position: center center;
            min-height: 500px;
            display: flex !important;
            align-items: center;
        }

        .mySwiper .slide-overlay1 {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        .mySwiper .slide-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1140px;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #f8f9fa;
            gap: 2rem;
        }

        .mySwiper .text-content h2 {
            font-weight: 700;
            font-size: 2.5rem;
        }

        .mySwiper .text-content p.lead {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #f8f9fa !important;
        }

        .mySwiper .image-box {
            background-color: #fff;
            border-radius: 0.75rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 350px;
            max-width: 50%;
            flex: 0 0 50%;
        }

        .mySwiper .image-box img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        .mySwiper .image-left {
            background: transparent !important;
            box-shadow: none !important;
            padding: 0 !important;
            height: 350px;
            max-width: 50%;
            flex: 0 0 50%;
        }

        .mySwiper .image-left img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        @media (max-width: 767.98px) {
            .mySwiper .slide-content {
                flex-direction: column;
                text-align: center;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .mySwiper .image-box,
            .mySwiper .image-left,
            .mySwiper .text-content {
                max-width: 100%;
                flex: none;
            }

            .mySwiper .image-box,
            .mySwiper .image-left {
                height: 300px;
                margin-bottom: 1rem;
            }

            .mySwiper .text-content {
                width: 100%;
                margin-bottom: 1.5rem;
            }

            /* Hide description paragraph on mobile */
            .mySwiper .text-content p.lead {
                /* display: none !important; */
                font-size: .85rem;
            }

            /* Smaller font sizes on mobile */
            .mySwiper .text-content h2 {
                font-size: 1.5rem;
            }

            /* Smaller button on mobile */
            .mySwiper .text-content a.btn {
                padding: 0.375rem 1rem;
                font-size: 0.875rem;
            }
        }
    </style>
@elseif($banner == '2')
    <style>
        //* Swiper slide styling */
        .mySwiper .swiper-slide {
            position: relative;
            background-size: cover;
            background-position: center center;
            min-height: 500px;
            display: flex !important;
            align-items: center;
        }

        /* Dark translucent overlay covering whole slide */
        .mySwiper .slide-overlay1 {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        /* Slide content above overlay */
        .mySwiper .slide-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1140px;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #f8f9fa;
            gap: 2rem;
        }

        /* Text content */
        .mySwiper .text-content h2 {
            font-weight: 700;
            font-size: 2.5rem;
        }

        .mySwiper .text-content p.lead {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #f8f9fa !important;
        }

        /* Product image box - right side */
        .mySwiper .image-box {
            background-color: #fff;
            border-radius: 0.75rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 350px;
            max-width: 50%;
            flex: 0 0 50%;
        }

        .mySwiper .image-box img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        /* Left side image without box */
        .mySwiper .image-left {
            background: transparent !important;
            box-shadow: none !important;
            padding: 0 !important;
            height: 350px;
            max-width: 50%;
            flex: 0 0 50%;
        }

        .mySwiper .image-left img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        /* Add top padding to prevent overlap with fixed menu */
        .full-width-slider,
        .full-width-banner {
            padding-top: 70px;
            /* Adjust to your menu height */
        }

        .full-width-banner {
            background-image: url('{{ asset('assets/img/frontline/network-solutions-slider.jpg') }}');
            background-size: cover;
            /* Cover whole area */
            background-repeat: no-repeat;
            background-position: center center;
            width: 100vw;
            /* Full viewport width */
            margin-left: calc(-50vw + 50%);
            /* Aligns container correctly */
            overflow: hidden;
            position: relative;
            color: white;
        }

        /* Dark overlay */
        .slide-overlay1 {
            /* position: absolute; */
            /* inset: 0; */
            background-color: rgba(0, 0, 0, 0.75);
            /* z-index: 1; */
        }

        /* Slide content above overlay */
        .slide-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1140px;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #f8f9fa;
            gap: 2rem;
        }


        /* Responsive */
        @media (max-width: 767.98px) {
            .mySwiper .slide-content {
                flex-direction: column;
                text-align: center;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .mySwiper .image-box,
            .mySwiper .image-left,
            .mySwiper .text-content {
                max-width: 100%;
                flex: none;
            }

            /* Smaller height for images on mobile */
            .mySwiper .image-box,
            .mySwiper .image-left {
                height: 220px !important;
                margin-bottom: 1rem;
                height: 140px !important;
            }

            .mySwiper .text-content {
                width: 100%;
                margin-bottom: 1.5rem;
            }

            /* Hide description paragraph on mobile */
            .mySwiper .text-content p.lead {
                font-size: 0.85rem !important;
            }

            /* Smaller font sizes on mobile */
            .mySwiper .text-content h2 {
                font-size: 1.5rem;
            }

            /* Smaller buttons on mobile */
            .mySwiper .text-content a.btn {
                padding: 0.375rem 1rem;
                font-size: 0.875rem;
            }
        }
    </style>

    <!-- Swiper CSS -->

    <section class="full-width-banner text-white d-flex align-items-center " style="min-height: 400px;">
        <div class="swiper myBannerSwiper slide-overlay1" style="min-height: 400px;">
            <div class="swiper-wrapper">

                @foreach ($featuredProducts as $product)
                    <div class="swiper-slide">
                        <div class="row align-items-center rounded p-4 shadow-sm" style="min-height: 400px;">
                            <!-- Image column -->
                            <div class="col-md-6 mb-4 mb-md-0 d-flex justify-content-center align-items-center">
                                <div class="image-box bg-white rounded shadow p-4"
                                    style="">
                                    <img src="{{ getImageUrl($product->mainImage()) }}" alt="{{ $product->name }}"
                                        class="img-fluid" >
                                </div>
                            </div>

                            <!-- Text column -->
                            <div class="col-md-6">
                                <h2 class="display-5 fw-bold text-smoke">{{ $product->name }}</h2>
                                <p class="lead text-smoke2">{{ Str::limit($product->short_description, 120) }}</p>
                                {{-- <a href="{{ route('products.show', $product->slug) }}"
                                    class="btn btn-lg btn-outline-primary rounded-pill px-4">Shop Now</a> --}}

                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="btn  btn-theme btn-outline-theme btn-lg  rounded-pill px-4">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Navigation arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Pagination dots -->
            {{-- <div class="swiper-pagination"></div> --}}
        </div>
    </section>

    <!-- Include Swiper JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.myBannerSwiper', {
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoHeight: true, // disables dynamic height
            });
        });
    </script>
@elseif($banner == '3')
    <section class="container my-5">
        <div class="row align-items-center bg-light rounded p-4 shadow-sm">
            <!-- Left: Product Image -->
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ getImageUrl($featuredProduct->thumb_image) }}" alt="{{ $featuredProduct->name }}"
                    class="img-fluid rounded shadow" style="max-height: 400px; object-fit: cover; width: 100%;">
            </div>

            <!-- Right: Text & CTA -->
            <div class="col-md-6">
                <h2 class="display-5 fw-bold">{{ $featuredProduct->name }}</h2>
                <p class="lead text-secondary">
                    {{ Str::limit($featuredProduct->description, 120) }}
                </p>
                <p class="fs-4 text-primary fw-semibold">₹{{ number_format($featuredProduct->price, 2) }}</p>
                <a href="{{ route('products.show', $featuredProduct->slug) }}"
                    class="btn btn-lg btn-outline-primary rounded-pill px-4">
                    Shop Now
                </a>
            </div>
        </div>
    </section>
@elseif($banner == '4')
    <div class="swiper myProductSwiper">
        <div class="swiper-wrapper">
            @foreach ($featuredProducts as $product)
                <div class="swiper-slide card shadow-sm p-2" style="border-radius:0.75rem;">
                    <img src="{{ getImageUrl($product->thumb_image) }}" alt="{{ $product->name }}"
                        class="card-img-top rounded" style="height:180px; object-fit:cover;">
                    <div class="card-body text-center p-2">
                        <h6 class="card-title text-truncate" title="{{ $product->name }}">{{ $product->name }}</h6>
                        <p class="text-primary fw-semibold my-1">₹{{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product->slug) }}"
                            class="btn btn-sm btn-outline-primary">View
                            Details</a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Pagination dots -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Include Swiper JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.myProductSwiper', {
                slidesPerView: 4,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                    640: {
                        slidesPerView: 2
                    },
                    992: {
                        slidesPerView: 3
                    },
                    1200: {
                        slidesPerView: 4
                    },
                },
            });
        });
    </script>
@elseif($banner == '5')
    <!-- Slider container -->
    <div class="swiper myProductSwiper">
        <div class="swiper-wrapper">
            @foreach ($featuredProducts as $product)
                <div class="swiper-slide card">
                    <img src="{{ getImageUrl($product->thumb_image) }}" alt="{{ $product->name }}"
                        class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">₹{{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary">View
                            Details</a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script>
        var swiper = new Swiper('.myProductSwiper', {
            slidesPerView: 4,
            spaceBetween: 20,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                },
            }
        });
    </script>
@else
<style>
/* Force hero background on mobile if theme JS fails */
.th-hero-bg[data-bg-src] {
    background-size: cover !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
    min-height: 350px !important;
}

/* Mobile-specific height fix */
@media (max-width: 767px) {
    .th-hero-bg[data-bg-src] {
        min-height: 280px !important;
    }
}
</style>

<script>
// Ensure data-bg-src always applies
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("[data-bg-src]").forEach(el => {
        const img = el.getAttribute("data-bg-src");
        if (img) el.style.backgroundImage = `url('${img}')`;
    });
});
</script>

    @php $sliders = json_decode($settings['sliders']['homepage'] ?? '[]', true); @endphp
    <div class="th-hero-wrapper hero-1" id="hero">
        <div class="swiper th-slider hero-slider-1" id="heroSlide1" data-slider-options='{"effect":"fade", "autoplay": { "delay": 1000, "disableOnInteraction": false }}'>
            <div class="swiper-wrapper">

                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="hero-inner">
                            <div class="th-hero-bg" data-bg-src="{{ $slider['img_path'] }}">
                                <div class="hero-shape-1" data-ani="slideinleft" data-ani-delay="0.7s"><img
                                        src="assets/img/bg/hero_overlay_1.png" alt=""></div>
                            </div>
                            <div class="container">
                                <div class="hero-style1"><span class="sub-title" data-ani="slideindown"
                                        data-ani-delay="0.2s">{!! $slider['title'] !!}</span>
                                    <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.4s">
                                        {!! $slider['sub_title'] !!}</h1>
                                    <div class="btn-group justify-content-lg-start justify-content-center"
                                        data-ani="slideinup" data-ani-delay="0.6s"><a
                                            href="{{ $slider['btn_link'] }}" class="th-btn style1 th-icon"><span
                                                class="btn-text" data-back="{!! $slider['btn_text'] !!}"
                                                data-front="{!! $slider['btn_text'] !!}"></span><i
                                                class="fa-regular fa-arrow-right ms-2"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button data-slider-prev="#heroSlide" class="slider-arrow slider-prev"><i
                    class="far fa-arrow-left"></i></button>
            <button data-slider-next="#heroSlide" class="slider-arrow slider-next"><i
                    class="far fa-arrow-right"></i></button>
        </div>
        <div class="hero-over-image">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-5 col-lg-4">
                        <div class="hero-image global-img"><img
                                src="{{ asset('assets/img/frontline/ups-server.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="hero1-item">
                            <div class="box-icon"><img src="assets/img/icon/doller.svg" alt=""></div>
                            <div class="box-content">
                                <h3 class="box-title">Affordable Solutions</h3>
                                <p class="box-text">Experience reliable and cost-effective energy options tailored for
                                    your
                                    needs. Our services help you save on utility bills while supporting a sustainable
                                    future.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="hero-image global-img"><img
                                src="{{ asset('assets/img/frontline/router-cctv-camera.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
{{--
<div class="position-relative overflow-hidden space-top">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-md-6 col-xl-3">
                <div class="feature-card th-ani">
                    <div class="box-icon">
                        <img src="assets/img/icon/feature_1_1.svg" alt="Icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="box-title"><a href="service-details.html">Energy Solutions</a></h3>
                    <p class="box-text">Solar panels with PV cells convert sunlight directly into electricity. PV panels
                        are often installed on rooftops, in solar farms.</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="feature-card th-ani">
                    <div class="box-icon"><img src="assets/img/icon/feature_1_2.svg" alt="Icon"></div>
                    <h3 class="box-title"><a href="service-details.html">Global Expertise</a></h3>
                    <p class="box-text">Global expertise" refers to having a broad, in-depth understanding, knowledge,
                        and proficiency in a particular field or subject</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="feature-card th-ani">
                    <div class="box-icon"><img src="assets/img/icon/feature_1_3.svg" alt="Icon"></div>
                    <h3 class="box-title"><a href="service-details.html">Home Appliance</a></h3>
                    <p class="box-text">A home appliance refers to any electrical or mechanical device that assists in
                        household tasks making daily life more convenient</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="feature-card th-ani">
                    <div class="box-icon"><img src="assets/img/icon/feature_1_4.svg" alt="Icon"></div>
                    <h3 class="box-title"><a href="service-details.html">Easy Installation</a></h3>
                    <p class="box-text">Easy installation refers to the process of setting up or assembling a product,
                        system, or device with minimal the effort.</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="position-relative overflow-hidden space-top">
    <div class="container">
        <div class="row gy-4 justify-content-center">

            <div class="col-md-6 col-xl-3">
                <div class="feature-card th-ani text-center">
                    {{-- <div class="box-icon">
                        <img src="{{ asset('assets/img/icon/feature_1_1.svg') }}" alt="Power Solutions">
                        <i class="fas fa-bolt"></i>
                    </div> --}}
                    <div class="icon mb-3 text-theme fs-1">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="box-title"><a href="{{ route('solutions.index') }}">Power Solutions</a></h3>
                    <p class="box-text">
                        Reliable UPS, batteries, and backup systems for continuous operations.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="feature-card th-ani text-center">
                    {{-- <div class="box-icon">
                        <img src="{{ asset('assets/img/icon/feature_1_2.svg') }}" alt="Networking">
                        <i class="fas fa-network-wired"></i>
                    </div> --}}
                    <div class="icon mb-3 text-theme fs-1">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3 class="box-title"><a href="{{ route('solutions.index') }}">Networking</a></h3>
                    <p class="box-text">
                        Scalable, secure, and high-speed networking infrastructure solutions.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="feature-card th-ani text-center">
                    {{-- <div class="box-icon">
                        <img src="{{ asset('assets/img/icon/feature_1_3.svg') }}" alt="Data Center">
                        <i class="fas fa-database"></i>
                    </div> --}}
                    <div class="icon mb-3 text-theme fs-1">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3 class="box-title"><a href="{{ route('solutions.index') }}">Data Center</a></h3>
                    <p class="box-text">
                        Efficient, flexible, and intelligent thermal and power management.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="feature-card th-ani text-center">
                    {{-- <div class="box-icon">
                        <img src="{{ asset('assets/img/icon/feature_1_4.svg') }}" alt="Messaging">
                        <i class="fas fa-envelope-open-text"></i>
                    </div> --}}
                    <div class="icon mb-3 text-theme fs-1">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h3 class="box-title"><a href="{{ route('solutions.index') }}">Messaging</a></h3>
                    <p class="box-text">
                        Reliable business communication and mailing solutions that scale.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="about-area overflow-hidden space-top" id="about-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7">
                <div class="title-area mb-40 text-center"><span class="sub-title">Who We Are</span>
                    <h2 class="sec-title">Your trusted partner in technology and power infrastructure.</h2>
                </div>
            </div>
        </div>
        <div class="row gy-4 align-items-center">
            <div class="col-xl-7 mb-30 mb-xl-0">
                <div class="img-box1">
                    <div class="img1 th-parallax"><img src="{{ asset('assets/img/frontline/directors1.jpg') }}"
                            alt="About"></div>
                    <div class="about-wrapp">
                        <div class="discount-wrapp">
                            <a href="#" class="play-btn ">
                                <img src="https://demo.brightontechnologies.in/assets/apple-touch-icon.png"
                                    alt="">
                            </a>
                            <div class="discount-tag"><span class="discount-anime"> Team Frontline since 1996</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="ps-xxl-5 ms-xxl-5 me-xl-2">
                    <p class="mb-25">At Team Frontline, we combine innovation, expertise, and reliability to deliver
                        world-class IT and Power Solutions.
                        From data centers to connectivity, from energy management to security systems — our solutions
                        are designed to build smarter, more efficient workplaces.

                        We believe in long-term partnerships, consistent support, and delivering measurable value to
                        every client.</p>
                    <div class="checklist list-two-column mb-20">
                        <ul>
                            <li><i class="fa-sharp fa-solid fa-badge-check"></i>Proven Experience</li>
                            <li><i class="fa-sharp fa-solid fa-badge-check"></i>Technical Excellence</li>
                            <li><i class="fa-sharp fa-solid fa-badge-check"></i>Global Standards</li>
                            <li><i class="fa-sharp fa-solid fa-badge-check"></i>Enduring Trust</li>
                        </ul>
                    </div>
                    <div class="btn-group mt-30 justify-content-start"><a href="{{ route('about') }}"
                            class="th-btn black-btn th-icon"><span class="btn-text" data-back="More About Us"
                                data-front="More About Us"></span><i class="fa-regular fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space-extra2-top overflow-hidden">
    <div class="container">
        <div class="counter-card-wrap style3">
            <div class="counter-card">
                <div class="box-icon"><img src="{{ asset('assets/img/icon/success-1.png') }}" alt=""
                        style="height: 50px"></div>
                <h3 class="box-number"><span class="counter-number">29</span>+</h3>
                <div class="media-body">
                    <p class="box-text mb-n1">Years of Successfull Existance</p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="counter-card">
                <div class="box-icon"><img src="{{ asset('assets/img/icon/key-accounts.png') }}" alt=""
                        style="height: 50px"></div>
                <h3 class="box-number"><span class="counter-number">500</span>+</h3>
                <div class="media-body">
                    <p class="box-text mb-n1">Key Accounts</p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="counter-card">
                <div class="box-icon"><img src="{{ asset('assets/img/icon/awards.png') }}" alt=""
                        style="height: 50px"></div>
                <h3 class="box-number"><span class="counter-number">50</span>+</h3>
                <div class="media-body">
                    <p class="box-text mb-n1">Awards & Recognition</p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="counter-card">
                <div class="box-icon"><img src="{{ asset('assets/img/icon/business-icon.png') }}" alt=""
                        style="height: 50px"></div>
                <h3 class="box-number"><span class="counter-number">50</span>+</h3>
                <div class="media-body">
                    <p class="box-text mb-n1">Principal Company's <br>Representation</p>
                </div>
            </div>
            <div class="divider"></div>
        </div>
    </div>
</div>
