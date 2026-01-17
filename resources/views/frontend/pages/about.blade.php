@extends('frontend.layouts.master')

@section('title', 'About Us - ' . ($settings['general']['site_name'] ?? 'Team Frontline'))

@section('content')


    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/bg/installation-bg-1.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">About Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-area overflow-hidden overflow-hidden space" id="about-sec">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-7 mb-30 mb-xl-0">
                    <div class="img-box3">
                        <div class="img1"><img src="{{asset('assets/img/frontline/data-center.jpg')}}" alt="About"></div>
                        <div class="img2"><img src="{{asset('assets/img/frontline/ups_1.jpg')}}" alt="About"></div>
                        {{-- <div class="img1"><img src="assets/img/normal/about_3_1.jpg" alt="About"></div>
                        <div class="img2"><img src="assets/img/normal/about_3_2.jpg" alt="About"></div> --}}
                        <div class="about-wrapp">
                            <div class="discount-wrapp style2">
                                <h2 class="box-counter"><span class="counter-number">29</span></h2>
                                <div class="discount-tag"><span class="discount-anime">Team Frontline since 1996</span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="about-shape"><img src="assets/img/shape/shape-4.png" alt=""></div> --}}
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="ps-xxl-5 ms-xxl-5 me-xl-2">
                        <div class="title-area mb-40"><span class="sub-title">About Team Frontline Limited</span>
                            <h2 class="sec-title">Pioneering IT Solutions Since 1996</h2>
                        </div>

                        <p class="text-muted mb-3">
                            <strong>Team Frontline Limited</strong>, established in <strong>June 1996</strong>, is one of
                            the
                            leading System Integrators and IT Solution providers in Kerala. Into our third decade of
                            operations, we continue to deliver world-class products and technology solutions across diverse
                            sectors — including Corporate, Government, Academic, Research, and SME segments.
                        </p>
                        <p class="text-muted mb-3">
                            Over the years, we have successfully partnered with major global IT principals and vendors to
                            provide integrated solutions tailored to our clients’ needs. Our strength lies in staying close
                            to our customers — understanding their challenges, helping them embrace technological change,
                            and ensuring that innovation drives real business value.
                        </p>
                        <p class="text-muted">
                            It’s no wonder that while many similar companies have faded, <strong>Team Frontline
                                Limited</strong>
                            continues to stay ahead — evolving, resilient, and trusted by clients across Kerala and beyond.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-title overflow-hidden" data-bg-src="assets/img/bg/choose_bg_3.png">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5">
                    <div class="space-extra">
                        <div class="title-area mb-30"><span class="sub-title">Why Choose Us</span>
                            {{-- <h2 class="sec-title sec-title2 text-white">Switch to Solar Sustainable, Affordable, & Reliable
                                Energy</h2> --}}
                        </div>
                        <div class="choose-feature2-wrap">
                            <div class="choose-feature2">
                                <div class="box-icon bg-theme"><i class="fa-solid fa-bullseye fa-2x text-white"></i></div>
                                <div class="media-body">
                                    <h3 class="box-title">Our Mission</h3>
                                    <p class="box-text"> The mission of Team Frontline is to gain knowledge and expertise to deliver optimized, high-quality IT solutions that support customer growth. We aim to be a trusted technology partner — growing alongside our clients as a respected and responsible corporate citizen.</p>
                                </div>
                            </div>
                            <div class="choose-feature2">
                                <div class="box-icon bg-theme"><i class="fa-solid fa-handshake fa-2x text-white"></i></div>
                                <div class="media-body">
                                    <h3 class="box-title">Our Approach</h3>
                                    <p class="box-text"> Our approach with discerning customers is to act as their long-term technology partner. We go beyond their current needs, helping them tap into the advantages of emerging technologies while maintaining a cost-effective, sustainable outlook. With a strong focus on customer satisfaction, we provide continuous product, solution, and after-sales support — every step of the way.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="choose-wrapper2">
                        <div class="choose-item2">
                            <div class="choose-img"><img src="{{asset('assets/img/frontline/cctv-01.jpg')}}" alt=""></div>
                            <div class="choose-content">
                                <h3 class="box-number"><span class="counter-number">3,600</span>+</h3>
                                <p class="box-text">We have over 3,600+ Happy Customers</p>
                            </div>
                        </div>
                        <div class="choose-item2">
                            <div class="choose-img"><img src="{{asset('assets/img/frontline/plug-in.jpg')}}" alt=""></div>
                            <div class="choose-content">
                                <h3 class="box-number"><span class="counter-number">3,650</span>+</h3>
                                <p class="box-text">Customers are served by  Energy department</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us / Stats Section -->
    <section class="stats-section py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Why Choose Team Frontline</h2>
            <p class="text-muted mb-5">
                There’s a reason why customers continue to trust Team Frontline — our legacy of excellence, proven expertise, and lasting partnerships.
            </p>

            <div class="row gy-4">
                <div class="col-md-4">
                    <h3 class="fw-bold text-theme mb-1">29+</h3>
                    <p class="text-muted mb-0">Years of Successful Existence</p>
                </div>
                <div class="col-md-4">
                    <h3 class="fw-bold text-theme mb-1">500+</h3>
                    <p class="text-muted mb-0">Key Corporate Accounts</p>
                </div>
                <div class="col-md-4">
                    <h3 class="fw-bold text-theme mb-1">50+</h3>
                    <p class="text-muted mb-0">Awards & Recognitions</p>
                </div>
            </div>

            <div class="mt-5">
                <h6 class="fw-semibold text-uppercase text-muted mb-2">Principal Company Representations</h6>
                <p class="text-muted">
                    Representing more than 50 global technology brands and solution partners.
                </p>
            </div>
        </div>
    </section>
    {{-- <div class="brand-sec overflow-hidden bg-smoke2 space-extra bg-smoke3">
        <div class="container th-container">
            <div class="slider-area text-center">
                <div class="swiper th-slider" id="brandSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"476":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"6"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_1.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_1.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_2.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_2.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_3.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_3.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_4.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_4.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_5.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_5.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_6.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_6.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_1.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_1.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_2.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_2.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_3.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_3.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_4.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_4.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_5.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_5.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style4">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_6.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_6.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @include('frontend.home.sections.brand-slider')


@endsection
