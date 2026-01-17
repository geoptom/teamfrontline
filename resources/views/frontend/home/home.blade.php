@extends('frontend.layouts.master')
@section('title')
    Home
@endsection
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
        :root {
            --swiper-theme-color: {{ $settings['appearance']['theme_color'] ?? '#B60A6E' }};
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #B60A6E !important;
        }

        /* Equal height feature cards */
        .space-top .row {
            display: flex;
            align-items: stretch;
        }

        .space-top .feature-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .space-top .feature-card .box-text {
            flex-grow: 1;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
@endpush


@section('content')
    @php $banners = json_decode($settings['banners']['homepage'] ?? '{}', true); @endphp

    {{-- @include('frontend.home.sections.banner-slider') --}}
    @include('frontend.components.banner._engine', [
        'bannerType' => $banner,
        'products' => $featuredProducts,
        'sliders' => $sliders ?? [],
    ])


    <div class="position-relative overflow-hidden space-top">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-md-6 col-xl-3">
                    <div class="feature-card th-ani">
                        <div class="box-icon"><img src="assets/img/icon/feature_1_1.svg" alt="Icon"></div>
                        <h3 class="box-title"><a href="{{ route('about') }}">IT Solutions</a></h3>
                        <p class="box-text">System integration and IT solutions tailored to Corporate, Government, Academic, and SME segments. Proven expertise across diverse sectors with world-class technology implementation.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="feature-card th-ani">
                        <div class="box-icon"><img src="assets/img/icon/counter_card_1_1.svg" alt="Icon"></div>
                        <h3 class="box-title"><a href="{{ route('about') }}">Complete Product Range</a></h3>
                        <p class="box-text">From Servers & Storage to Desktops, Networking Solutions, Thermal Management, and Peripherals. Comprehensive IT hardware and infrastructure solutions for every business need.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="feature-card th-ani">
                        <div class="box-icon"><img src="assets/img/icon/feature_1_3.svg" alt="Icon"></div>
                        <h3 class="box-title"><a href="{{ route('about') }}">Security Solutions</a></h3>
                        <p class="box-text">Comprehensive power and surveillance systems ensuring business continuity, efficiency, and safety. Advanced CCTV and security infrastructure tailored to your needs.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="feature-card th-ani">
                        <div class="box-icon"><img src="assets/img/icon/about_1_1.svg" alt="Icon"></div>
                        <h3 class="box-title"><a href="{{ route('about') }}">Professional Services</a></h3>
                        <p class="box-text">Expert Installation, Maintenance, AMC/ASC Services, and Facility Management. Comprehensive support for Data Centre, Connectivity, Networking, and Surveillance Solutions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.home.sections.large-banner')

    @include('frontend.home.sections.featured-products')

    @include('frontend.home.sections.brand-slider')


    @include('frontend.home.sections.solutions')


    {{-- @include('frontend.home.sections.popular-categories') --}}


    <section class="bg-theme">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-6 cta-item_wrapp">
                    <div class="cta-item">
                        <div class="box-icon"><img src="{{ asset('assets/img/icon/IT & Connectivity Solutions.png') }}"
                                alt="" width="70"></div>
                        <h3 class="box-title">IT & Connectivity Solutions</h3>
                        <p class="box-text">End-to-end IT infrastructure, networking, and data centre solutions empowering
                            businesses with reliable connectivity, performance, and scalability.</p>
                    </div>
                </div>
                <div class="col-lg-6 cta-item_wrapp">
                    <div class="cta-item">
                        <div class="box-icon"><img src="{{ asset('assets/img/icon/Power & Security Solutions.png') }}"
                                alt="" width="70"></div>
                        <h3 class="box-title">Power & Security Solutions</h3>
                        <p class="box-text">Comprehensive power and surveillance systems ensuring business continuity,
                            efficiency, and safety across all operations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- @include('frontend.home.sections.top-category-product') --}}


    {{-- @include('frontend.home.sections.hot-deals') --}}

    {{-- @include('frontend.home.sections.category-product-slider-one') --}}

    {{-- @include('frontend.home.sections.category-product-slider-two') --}}


    {{-- @include('frontend.home.sections.weekly-best-item') --}}

    @include('frontend.home.sections.services')
    @include('frontend.home.sections.banner-two-column')

    @include('frontend.home.sections.blog')
@endsection

@push('scripts')
    <script>
        // document.addEventListener("DOMContentLoaded", () => {
        //     new Swiper(".commonSwiper", {
        //         slidesPerView: 2,
        //         spaceBetween: 15,
        //         loop: true,
        //         autoplay: {
        //             delay: 3000,
        //             disableOnInteraction: false,
        //         },
        //         navigation: {
        //             nextEl: ".swiper-button-next",
        //             prevEl: ".swiper-button-prev",
        //         },
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

// document.addEventListener("DOMContentLoaded", () => {
//     document.querySelectorAll('.category-products-swiper').forEach(swiperEl => {

//         const swiper = new Swiper(swiperEl, {
//             slidesPerView: 2,
//             spaceBetween: 15,
//             loop: true,
//             loopAdditionalSlides: 10,

//             navigation: {
//                 nextEl: swiperEl.querySelector('.swiper-button-next'),
//                 prevEl: swiperEl.querySelector('.swiper-button-prev'),
//             },

//             breakpoints: {
//                 576: { slidesPerView: 3 },
//                 768: { slidesPerView: 4 },
//                 992: { slidesPerView: 5 },
//                 1200: { slidesPerView: 6 },
//             },
//         });

//         // ⭐ CRITICAL FIX ⭐
//         swiper.on('imagesReady', () => {
//             swiper.update();
//             swiper.updateSlides();
//             swiper.updateSize();
//             swiper.slideToLoop(0);
//         });
//     });
// });


    </script>
@endpush
