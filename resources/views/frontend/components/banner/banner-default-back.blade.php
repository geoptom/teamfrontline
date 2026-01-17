{{-- <div class="default-hero-wrapper">
    <div class="swiper defaultHeroSwiper">
        <div class="swiper-wrapper">

            @foreach ($sliders as $slider)
            <div class="swiper-slide">
                <div class="hero-inner" data-bg-src="{{ $slider['img_desktop'] }}">
                    <div class="slide-overlay"></div>

                    <div class="container text-center text-white py-5">
                        <h3 class="banner-title">{!! $slider['title'] !!}</h3>
                        <h1 class="banner-title fw-bold">{!! $slider['sub_title'] !!}</h1>

                        <a href="{{ $slider['btn_link'] }}" class="btn btn-theme btn-lg rounded-pill mt-3">
                            {!! $slider['btn_text'] !!}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div> --}}

@push('styles')
    <style>
        .th-hero-bg {
            background-position: center !important;
            background-size: cover !important;
            background-repeat: no-repeat !important;
        }

        /* FIX 1 — Ensure hero background fits mobile screen */
        /* #hero .th-hero-bg {
                            min-height: 280px !important;
                            max-height: 480px !important;
                            display: flex;
                            align-items: center;
                        } */

        /* FIX 2 — Ensure slide content doesn’t force height */
        #hero .hero-inner {
            min-height: auto !important;
            padding: 40px 0 !important;
        }

        /* FIX 3 — Reduce hero title + subtitle size on mobile */
        @media(max-width: 767px) {
            #hero .hero-title {
                font-size: 1.6rem !important;
                line-height: 1.3 !important;
            }

            #hero .sub-title {
                font-size: 1.1rem !important;
            }
        }

        /* FIX 4 — The bottom hero-over-image is pushing hero too tall → reduce spacing */
        @media(max-width: 767px) {
            #hero .hero-over-image {
                margin-top: -40px !important;
                /* Pull up so hero is not stretched */
                padding-top: 0 !important;
            }

            #hero .hero-over-image img {
                /* max-height: 140px !important; */
                width: auto;
            }

            #hero .hero1-item .box-text {
                font-size: .8rem;
            }
        }

        /* FIX 5 — Reduce empty white space caused by container padding */
        @media(max-width: 767px) {
            #hero .container {
                padding-left: 10px !important;
                padding-right: 10px !important;
            }
        }

        @media(max-width:767px) {
            #hero .swiper-slide {
                min-height: 360px !important;
                max-height: 100dvh !important;
            }
        }
    </style>

    <style>
        /* Overall container */
        .hero-section {
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        /* Stable height */
        .hero-section .swiper-slide {
            /* min-height: 500px; */
            /* height: 500px; */
            position: relative;
            background-size: cover;
            background-position: center;
            display: flex !important;
            align-items: center;
        }

        /* Mobile height */
        @media(max-width: 767px) {
            .hero-section .swiper-slide {
                min-height: 330px;
                height: 330px;
            }
        }

        /* Dark overlay */
        .hero-section .swiper-slide::before {
            content: "";
            position: absolute;
            inset: 0;
            /* background: rgba(0, 0, 0, 0.55); */
            z-index: 1;
        }

        /* Content */
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
            color: #fff;
        }

        .hero-style1 .sub-title {
            font-size: 2.2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: .9;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
            margin: 15px 0;
        }

        .hero-btn {
            padding: 0.75rem 2rem;
            border-radius: 50px;
            border: 2px solid #fff;
            color: #fff;
            transition: .25s;
        }

        .hero-btn:hover {
            background: #fff;
            color: #000;
        }

        /* Mobile text adjustments */
        @media(max-width: 767px) {
            .hero-title {
                font-size: 1.6rem;
            }

            .hero-content {
                text-align: center;
            }
        }

        /* Swiper nav buttons */
        .hero-nav {
            color: #fff;
            transition: opacity .25s;
        }

        .hero-nav:hover {
            opacity: .7;
        }

        /* Pagination dots */
        .swiper-pagination-bullet {
            background: #fff !important;
        }
    </style>
@endpush
@php $sliders = json_decode($settings['sliders']['homepage'] ?? '[]', true); @endphp


<div class="th-hero-wrapper hero-1" id="hero">
    <div class="swiper hero-slider-1" id="heroSlide1">
        <div class="swiper-wrapper">

            @foreach ($sliders as $slider)
                @php
                    if($slider['status'] != 1) {
                        continue;
                    }
                    $desktop = $slider['img_desktop'] ?? $slider['img_path'];
                    $tablet = $slider['img_tablet'] ?? $desktop;
                    $mobile = $slider['img_mobile'] ?? $tablet;
                @endphp
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" {{-- data-bg-src="{{ $slider['img_desktop'] }}" --}} data-desktop="{{ asset($desktop) }}"
                            data-tablet="{{ asset($tablet) }}" data-mobile="{{ asset($mobile) }}">
                            <div class="hero-shape-1" data-ani="slideinleft" data-ani-delay="0.7s"><img
                                    src="assets/img/bg/hero_overlay_1.png" alt=""></div>
                        </div>
                        <div class="container">
                            {{-- <div class="hero-style1"><span class="sub-title d-none d-lg-block" data-ani="slideindown"
                                    data-ani-delay="0.2s">&nbsp;</span>
                                <h1 class="hero-title" data-ani="slideinleft d-none d-lg-block" data-ani-delay="0.4s">
                                    &nbsp;</h1>
                                <div class="btn-group justify-content-lg-start justify-content-center d-none d-lg-block"
                                    data-ani="slideinup" data-ani-delay="0.6s">&nbsp;</div>
                            </div> --}}
                            <div class="hero-style1"><span class="sub-title d-none d-lg-block" data-ani="slideindown"
                                    data-ani-delay="0.2s">{!! $slider['title'] !!}</span>
                                <h1 class="hero-title d-none d-lg-block" data-ani="slideinleft" data-ani-delay="0.4s">
                                    {!! $slider['sub_title'] !!}</h1>
                                <div class="btn-group justify-content-lg-start justify-content-center d-none d-lg-block"
                                    data-ani="slideinup" data-ani-delay="0.6s"><a href="{{ $slider['btn_link'] }}"
                                        class="th-btn style1 th-icon"><span class="btn-text"
                                            data-back="{!! $slider['btn_text'] !!}"
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
                <div class="col-xl-5 col-lg-4 col-md-4 d-none d-md-block">
                    <div class="hero-image global-img"><img src="{{ asset('assets/img/frontline/ups-server.jpg') }}"
                            alt="">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 ">
                    <div class="hero1-item">
                        {{-- <div class="box-icon"><img src="assets/img/icon/doller.svg" alt=""></div> --}}
                        <div class="box-content">
                            <h3 class="box-title">Affordable Solutions</h3>
                            <p class="box-text">Experience reliable and cost-effective energy options tailored for
                                your
                                needs. Our services help you save on utility bills while supporting a sustainable
                                future.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 d-none d-md-block">
                    <div class="hero-image global-img"><img
                            src="{{ asset('assets/img/frontline/router-cctv-camera.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    {{-- <script>
        const heroSwiper = new Swiper("#heroSlide1", {
            effect: "fade",
            fadeEffect: {
                crossFade: true
            },
            loop: true,
            speed: 900,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".slider-next",
                prevEl: ".slider-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
        });
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            function applyHeroImages() {
                const width = window.innerWidth;

                document.querySelectorAll(".th-hero-bg").forEach(slide => {
                    let bgImg;

                    if (width <= 768) {
                        bgImg = slide.dataset.mobile;
                    } else if (width <= 992) {
                        bgImg = slide.dataset.tablet;
                    } else {
                        bgImg = slide.dataset.desktop;
                    }

                    slide.style.backgroundImage = `url('${bgImg}')`;
                });
            }

            applyHeroImages();
            window.addEventListener("resize", applyHeroImages);

            // new Swiper("#heroSlider", {
            //     loop: true,
            //     speed: 800,
            //     autoplay: {
            //         delay: 4500,
            //         disableOnInteraction: false,
            //     },
            //     pagination: {
            //         el: ".swiper-pagination",
            //         clickable: true,
            //     },
            //     navigation: {
            //         nextEl: ".swiper-button-next",
            //         prevEl: ".swiper-button-prev",
            //     },
            // });
        });
    </script>
@endpush
