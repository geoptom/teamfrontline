<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" /> -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('metas')
    <meta name="author" content="themeholy">
    <!-- <meta name="description" content="Solak  - Ecology & Solar Energy HTML Template">
    <meta name="keywords" content="Solak  - Ecology & Solar Energy HTML Template"> -->
    {{-- <meta name="robots" content="INDEX,FOLLOW"> --}}
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

    <link rel="icon" type="image/png" href="{{asset($settings['site_favicon'] ?? NULL)}}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset($settings['site_favicon'] ?? NULL)}}">
    {{-- <link rel="manifest" href="assets/img/favicons/manifest.json"> --}}
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/apple-touch-icon.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anek+Latin:wght@100..800&amp;family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/style.css?version=1.5">
</head>

<body>
    <div class="cursor-follower"></div>
    <div class="slider-drag-cursor"><img src="assets/img/icon/arrow.svg" alt=""></div>
    {{-- <div class="color-scheme-wrap active">
        <button class="switchIcon"><i class="fa-solid fa-palette"></i></button>
        <h4 class="color-scheme-wrap-title"><i class="far fa-palette me-2"></i>Style Swicher</h4>
        <div class="color-switch-btns">
            <button data-color="#3E66F3"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#684DF4"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#008080"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#323F7C"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#FC3737"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#8a2be2"><i class="fa-solid fa-droplet"></i></button>
        </div><a href="https://themeforest.net/user/themeholy" class="th-btn text-center w-100"><i
                class="fa fa-shopping-cart me-2"></i> Purchase</a>
    </div> --}}
    <div class="preloader" style="background-color: #FFF !important;">
        {{-- <button class="th-btn style1 preloaderCls">Cancel Preloader</button> --}}
        <div class="preloader-inner"><img src="assets/logo.svg" alt="Rasm" style="width: 250px;"> <span class="loader"></span>
        </div>
    </div>
    <div class="sidemenu-wrapper d-none d-lg-block">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget footer-widget">
                <h3 class="widget_title">About Company</h3>
                <div class="th-widget-about">
                    <p class="about-text">Professionally redefine transparent ROI through low-risk high-yield
                        imperatives. Progressively create empowered. cost effective users via team driven.</p>
                    <div class="th-social"><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a> <a
                            href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a> <a
                            href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="widget footer-widget">
                <h3 class="widget_title">Recent Posts</h3>
                <div class="recent-post-wrap">
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-1.jpg"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <div class="recent-post-meta"><a href="blog.html"><i
                                        class="fa-sharp fa-solid fa-calendar-days"></i>21 Feb, 2025</a></div>
                            <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Harnessing the
                                    Sun The Future of The Solar Power.</a></h4>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-2.jpg"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Harnessing the
                                    Sun The Future of The Solar Power.</a></h4>
                            <div class="recent-post-meta"><a href="blog.html"><i
                                        class="fa-sharp fa-solid fa-calendar-days"></i>22 Feb, 2025</a></div>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-3.jpg"
                                    alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <h4 class="post-title"><a class="text-inherit" href="blog-details.html">Harnessing the
                                    Sun The Future of The Solar Power.</a></h4>
                            <div class="recent-post-meta"><a href="blog.html"><i
                                        class="fa-sharp fa-solid fa-calendar-days"></i>23 Feb, 2025</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="What are you looking for?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href=""><img src="assets/img/apple-touch-icon.png" alt="Solak "></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li class=""><a href="">Home</a>

                    </li>
                    <li><a href="#">About Us</a></li>
                    {{-- <li class="menu-item-has-children"><a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="team.html">Team</a></li>
                            <li><a href="team-details.html">Team Details</a></li>
                            <li><a href="appointment.html">Appointment</a></li>
                            <li><a href="pricing.html">Price Table</a></li>
                            <li><a href="testimonial.html">Testimonial</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="error.html">Error Page</a></li>
                        </ul>
                    </li> --}}
                    <li class="menu-item-has-children"><a href="#">Services</a>
                        <ul class="sub-menu">
                            <li><a href="#">Services - Style 1</a></li>
                            <li><a href="#">Services - Style 2</a></li>
                            <li><a href="#">Services - Style 3</a></li>
                            <li><a href="#">Service Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Products</a>
                        <ul class="sub-menu">
                            <li><a href="#">Project Style 1</a></li>
                            <li><a href="#">Project Style 2</a></li>
                            <li><a href="#">Project Style 3</a></li>
                            <li><a href="#">Project Style 4</a></li>
                            <li><a href="#">Project Details</a></li>
                        </ul>
                    </li>
                    <li class=""><a href="#">Blog</a>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <header class="th-header header-layout1">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-md-between align-items-center">
                    <div class="col-auto d-none d-md-block">
                        <div class="header-links">
                            <ul>
                                <li class="d-none d-xl-inline-block"><i class="fa-light fa-clock"></i> <span>Mon - Fri
                                        8:00 - 18:00 / Sunday 8:00 - 14:00</span></li>
                                <li class=""><i class="fa-sharp fa-regular fa-location-dot"></i> <span>12
                                        Division Park, SKY 12546. Berlin</span></li>
                                <li><i class="fa-regular fa-envelope"></i><a
                                        href="mailto:help@solak.com">help@solak.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="social-links"><span class="social-title">Follow Us On:</span> <a
                                href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a> <a
                                href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a> <a
                                href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a> <a
                                href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <div class="menu-area">
                <div class="container-fiuld">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto p-0">
                            <div class="header-logo" style="margin: 0px 0 0 0px;">
                                {{-- @if (Agent::isMobile())
                                    <a href=""><img src="assets/apple-touch-icon.png" alt="Solak " style="width: 55px;"></a>
                                @else
                                    <a href=""><img src="assets/logo.svg" alt="Solak " style="width: 300px;"></a>
                                    @endif --}}
                                <a href=""><img src="assets/logo.svg" alt="Solak " style="width: 300px;"></a>
                            </div>
                        </div>
                        <div class="col-auto me-xl-auto p-0">
                            <nav class="main-menu style2 d-none d-lg-inline-block">
                                <ul>
                                    <li class=""><a href="#">Home</a>
                                    </li>
                                    <li><a href="">About Us</a></li>
                                    <li class="menu-item-has-children"><a href="#">Solutions</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Solutions</a></li>
                                            <li><a href="#">Solutions</a></li>
                                            <li><a href="#">Solutions</a></li>
                                            <li><a href="#">Solutions</a></li>
                                            <li><a href="#">Solutions</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Services</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Services</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Products</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Products</a></li>
                                            <li><a href="#">Products</a></li>
                                            <li><a href="#">Products</a></li>
                                            <li><a href="#">Products</a></li>
                                            <li><a href="#">Products</a></li>

                                        </ul>
                                    </li>
                                    {{-- <li class=""><a href="#">Blog</a>
                                    </li> --}}
                                    <li><a href="">Contact</a></li>
                                </ul>
                            </nav>
                            <div class="header-button">
                                <button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i
                                        class="far fa-bars"></i></button>
                            </div>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button">
                                {{-- <button type="button" class="icon-btn searchBoxToggler"><i
                                        class="far fa-search"></i></button> --}}
                                <a href="#" class="icon-btn sideMenuToggler d-none d-lg-block"><img
                                        src="assets/img/icon/grid.svg" alt=""></a><a href="tel:+25862323258"
                                    class="th-btn th-icon"><span class="btn-text"
                                        data-back="Call For Help Us: +258 6232 3258 "
                                        data-front="Call For Help Us: +258 6232 3258"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @if (Agent::isMobile())
                    <div class="logo-bg" style="width: 55%;" data-mask-src="assets/img/logo_bg_mask.png"></div>
                @else
                    <div class="logo-bg" style="width: 33%;" data-mask-src="assets/img/logo_bg_mask.png"></div>
                @endif --}}
            </div>
        </div>
    </header>
    <div class="th-hero-wrapper hero-1" id="hero">
        <div class="swiper th-slider hero-slider-1" id="heroSlide1" data-slider-options='{"effect":"fade"}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="assets/img/hero/hero_bg_1_1.jpg">
                            <div class="hero-shape-1" data-ani="slideinleft" data-ani-delay="0.7s"><img
                                    src="assets/img/bg/hero_overlay_1.png" alt=""></div>
                        </div>
                        <div class="container">
                            <div class="hero-style1"><span class="sub-title" data-ani="slideindown"
                                    data-ani-delay="0.2s">Empower Your Future With</span>
                                <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.4s">Solar <span
                                        class="hero-img"><img src="assets/img/shape/hero-shape.svg"
                                            alt=""></span>Power Energy</h1>
                                <div class="btn-group justify-content-lg-start justify-content-center"
                                    data-ani="slideinup" data-ani-delay="0.6s"><a href="#"
                                        class="th-btn style1 th-icon"><span class="btn-text" data-back="Get A Quote"
                                            data-front="Get A Quote"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="assets/img/hero/hero_bg_1_2.jpg">
                            <div class="hero-shape-1" data-ani="slideinleft" data-ani-delay="0.7s"><img
                                    src="assets/img/bg/hero_overlay_1.png" alt=""></div>
                        </div>
                        <div class="container">
                            <div class="hero-style1"><span class="sub-title" data-ani="slideindown"
                                    data-ani-delay="0.2s">Empower Your Future With</span>
                                <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.4s">Powering <span
                                        class="hero-img"><img src="assets/img/shape/hero-shape.svg"
                                            alt=""></span>Solar Energy</h1>
                                <div class="btn-group justify-content-lg-start justify-content-center"
                                    data-ani="slideinup" data-ani-delay="0.6s"><a href="#"
                                        class="th-btn style1 th-icon"><span class="btn-text" data-back="Get A Quote"
                                            data-front="Get A Quote"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="assets/img/hero/hero_bg_1_3.jpg">
                            <div class="hero-shape-1" data-ani="slideinleft" data-ani-delay="0.7s"><img
                                    src="assets/img/bg/hero_overlay_1.png" alt=""></div>
                        </div>
                        <div class="container">
                            <div class="hero-style1"><span class="sub-title" data-ani="slideindown"
                                    data-ani-delay="0.2s">Empower Your Future With</span>
                                <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.4s">Harvesting <span
                                        class="hero-img"><img src="assets/img/shape/hero-shape.svg"
                                            alt=""></span>Suns Power</h1>
                                <div class="btn-group justify-content-lg-start justify-content-center"
                                    data-ani="slideinup" data-ani-delay="0.6s"><a href="contact.html"
                                        class="th-btn style1 th-icon"><span class="btn-text" data-back="Get A Quote"
                                            data-front="Get A Quote"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="assets/img/hero/hero_bg_1_4.jpg">
                            <div class="hero-shape-1" data-ani="slideinleft" data-ani-delay="0.7s"><img
                                    src="assets/img/bg/hero_overlay_1.png" alt=""></div>
                        </div>
                        <div class="container">
                            <div class="hero-style1"><span class="sub-title" data-ani="slideindown"
                                    data-ani-delay="0.2s">Empower Your Future With</span>
                                <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.4s">Sun <span
                                        class="hero-img"><img src="assets/img/shape/hero-shape.svg"
                                            alt=""></span>For Everyone</h1>
                                <div class="btn-group justify-content-lg-start justify-content-center"
                                    data-ani="slideinup" data-ani-delay="0.6s"><a href="contact.html"
                                        class="th-btn style1 th-icon"><span class="btn-text" data-back="Get A Quote"
                                            data-front="Get A Quote"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <div class="hero-image global-img"><img src="assets/img/hero/hero-img-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="hero1-item">
                            <div class="box-icon"><img src="assets/img/icon/doller.svg" alt=""></div>
                            <div class="box-content">
                                <h3 class="box-title">Cost Savings</h3>
                                <p class="box-text">Over time, solar energy can significantly lower electricity bills
                                    and, in some cases, allow users to sell excess power back to the grid.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="hero-image global-img"><img src="assets/img/hero/hero-img-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="position-relative overflow-hidden space-top">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-md-6 col-xl-3">
                    <div class="feature-card th-ani">
                        <div class="box-icon"><img src="assets/img/icon/feature_1_1.svg" alt="Icon"></div>
                        <h3 class="box-title"><a href="service-details.html">Energy Solutions</a></h3>
                        <p class="box-text">Solar panels with PV cells convert sunlight directly into electricity. PV
                            panels are often installed on rooftops, in solar farms.</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="feature-card th-ani">
                        <div class="box-icon"><img src="assets/img/icon/feature_1_2.svg" alt="Icon"></div>
                        <h3 class="box-title"><a href="service-details.html">Global Expertise</a></h3>
                        <p class="box-text">Global expertise" refers to having a broad, in-depth understanding,
                            knowledge, and proficiency in a particular field or subject</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="feature-card th-ani">
                        <div class="box-icon"><img src="assets/img/icon/feature_1_3.svg" alt="Icon"></div>
                        <h3 class="box-title"><a href="service-details.html">Home Appliance</a></h3>
                        <p class="box-text">A home appliance refers to any electrical or mechanical device that assists
                            in household tasks making daily life more convenient</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="feature-card th-ani">
                        <div class="box-icon"><img src="assets/img/icon/feature_1_4.svg" alt="Icon"></div>
                        <h3 class="box-title"><a href="service-details.html">Easy Installation</a></h3>
                        <p class="box-text">Easy installation refers to the process of setting up or assembling a
                            product, system, or device with minimal the effort.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-area overflow-hidden space-top" id="about-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7">
                    <div class="title-area mb-40 text-center"><span class="sub-title">Solak - Solar & Renewable
                            Energy</span>
                        <h2 class="sec-title">We Strive To Lead The way In The Solar Energy Industry.</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4 align-items-center">
                <div class="col-xl-7 mb-30 mb-xl-0">
                    <div class="img-box1">
                        <div class="img1 th-parallax"><img src="assets/img/normal/about_1_1.jpg" alt="About">
                        </div>
                        <div class="about-wrapp">
                            <div class="discount-wrapp"><a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                    class="play-btn popup-video"><i class="fa-solid fa-play"></i></a>
                                <div class="discount-tag"><span class="discount-anime">solak-solak enargy since in
                                        1996</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="ps-xxl-5 ms-xxl-5 me-xl-2">
                        <p class="mb-25">Solar panels with PV cells convert sunlight directly into electricity. PV
                            panels are often installed on rooftops, in solar farms, and even in smaller portable
                            chargers. When sunlight hits the cells.</p>
                        <div class="checklist list-two-column mb-20">
                            <ul>
                                <li><i class="fa-sharp fa-solid fa-badge-check"></i>Clean and Renewable</li>
                                <li><i class="fa-sharp fa-solid fa-badge-check"></i>Energy Independence</li>
                                <li><i class="fa-sharp fa-solid fa-badge-check"></i>Low Maintenance</li>
                                <li><i class="fa-sharp fa-solid fa-badge-check"></i>Solar Scalability</li>
                            </ul>
                        </div>
                        <div class="about-profile">
                            <div class="signature"><img src="assets/img/normal/signature.svg" alt="signature"></div>
                            <h3 class="box-title">Alines Jannie</h3>
                            <p class="box-text">Director of Renewable Group</p>
                        </div>
                        <div class="btn-group mt-30 justify-content-start"><a href="contact.html"
                                class="th-btn black-btn th-icon"><span class="btn-text" data-back="More About Us"
                                    data-front="More About Us"></span><i
                                    class="fa-regular fa-arrow-right ms-2"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-extra2-top space-bottom overflow-hidden">
        <div class="container">
            <div class="counter-card-wrap style3">
                <div class="counter-card">
                    <div class="box-icon"><img src="assets/img/icon/counter_card_1_1.svg" alt=""></div>
                    <h3 class="box-number"><span class="counter-number">10,000,000</span>+</h3>
                    <div class="media-body">
                        <p class="box-text mb-n1">Instances of fault activity captured on LV networks</p>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="counter-card">
                    <div class="box-icon"><img src="assets/img/icon/counter_card_1_2.svg" alt=""></div>
                    <h3 class="box-number"><span class="counter-number">3,500,000</span></h3>
                    <div class="media-body">
                        <p class="box-text mb-n1">Train pantographs inspected annually</p>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="counter-card">
                    <div class="box-icon"><img src="assets/img/icon/counter_card_1_3.svg" alt=""></div>
                    <h3 class="box-number"><span class="counter-number">20,000,000</span>+</h3>
                    <div class="media-body">
                        <p class="box-text mb-n1">Hours of LV circuit load profile data captured and analysed</p>
                    </div>
                </div>
                <div class="divider"></div>
            </div>
        </div>
    </div>
    <section class="overflow-hidden space" data-bg-src="assets/img/bg/service_bg_1.jpg">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-5">
                    <div class="title-area text-center text-lg-start"><span class="sub-title">Our Services</span>
                        <h2 class="sec-title">Personalized Solar Solutions for Your Needs</h2>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="icon-box">
                            <button data-slider-prev="#serviceSlide" class="slider-arrow default"><i
                                    class="far fa-arrow-left"></i></button>
                            <button data-slider-next="#serviceSlide" class="slider-arrow default"><i
                                    class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="serviceSlide"
                    data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-overlay" data-bg-src="assets/img/service/service_overlay_1.jpg">
                                </div>
                                <div class="box-content">
                                    <div class="box-icon"><img src="assets/img/icon/service_1_1.svg" alt="Icon">
                                    </div>
                                    <div class="box-img" data-mask-src="assets/img/shape/ser-shape.png"><img
                                            src="assets/img/service/service_1_1.jpg" alt="img"></div>
                                    <h3 class="box-title"><a href="service-details.html">Solar Panel Installation</a>
                                    </h3>
                                    <p class="box-text">Our professional installation service ensures that your solar
                                        panels are set up efficiently and securely for maximum sunlight exposure.</p>
                                    <a href="service.html"
                                        class="th-btn border-btn th-icon fw-medium text-uppercase"><span
                                            class="btn-text" data-back="Vew Details"
                                            data-front="Vew Details"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-overlay" data-bg-src="assets/img/service/service_overlay_2.jpg">
                                </div>
                                <div class="box-content">
                                    <div class="box-icon"><img src="assets/img/icon/service_1_2.svg" alt="Icon">
                                    </div>
                                    <div class="box-img" data-mask-src="assets/img/shape/ser-shape.png"><img
                                            src="assets/img/service/service_1_2.jpg" alt="img"></div>
                                    <h3 class="box-title"><a href="service-details.html">Battery Storage Solutions</a>
                                    </h3>
                                    <p class="box-text">Store solar power with our cutting-edge battery solutions,
                                        providing energy independence and uninterrupted power. Whether.</p><a
                                        href="service.html"
                                        class="th-btn border-btn th-icon fw-medium text-uppercase"><span
                                            class="btn-text" data-back="Vew Details"
                                            data-front="Vew Details"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-overlay" data-bg-src="assets/img/service/service_overlay_3.jpg">
                                </div>
                                <div class="box-content">
                                    <div class="box-icon"><img src="assets/img/icon/service_1_3.svg" alt="Icon">
                                    </div>
                                    <div class="box-img" data-mask-src="assets/img/shape/ser-shape.png"><img
                                            src="assets/img/service/service_1_3.jpg" alt="img"></div>
                                    <h3 class="box-title"><a href="service-details.html">Solar Inverter
                                            Installation</a></h3>
                                    <p class="box-text">Our professional installation service ensures that your solar
                                        panels are set up efficiently and securely for maximum sunlight exposure.</p>
                                    <a href="service.html"
                                        class="th-btn border-btn th-icon fw-medium text-uppercase"><span
                                            class="btn-text" data-back="Vew Details"
                                            data-front="Vew Details"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-overlay" data-bg-src="assets/img/service/service_overlay_4.jpg">
                                </div>
                                <div class="box-content">
                                    <div class="box-icon"><img src="assets/img/icon/service_1_4.svg" alt="Icon">
                                    </div>
                                    <div class="box-img" data-mask-src="assets/img/shape/ser-shape.png"><img
                                            src="assets/img/service/service_1_4.jpg" alt="img"></div>
                                    <h3 class="box-title"><a href="service-details.html">Solar Maintenance &
                                            Repair</a></h3>
                                    <p class="box-text">Store solar power with our cutting-edge battery solutions,
                                        providing energy independence and uninterrupted power. Whether.</p><a
                                        href="service.html"
                                        class="th-btn border-btn th-icon fw-medium text-uppercase"><span
                                            class="btn-text" data-back="Vew Details"
                                            data-front="Vew Details"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-overlay" data-bg-src="assets/img/service/service_overlay_1.jpg">
                                </div>
                                <div class="box-content">
                                    <div class="box-icon"><img src="assets/img/icon/service_1_1.svg" alt="Icon">
                                    </div>
                                    <div class="box-img" data-mask-src="assets/img/shape/ser-shape.png"><img
                                            src="assets/img/service/service_1_1.jpg" alt="img"></div>
                                    <h3 class="box-title"><a href="service-details.html">Solar Panel Installation</a>
                                    </h3>
                                    <p class="box-text">Our professional installation service ensures that your solar
                                        panels are set up efficiently and securely for maximum sunlight exposure.</p>
                                    <a href="service.html"
                                        class="th-btn border-btn th-icon fw-medium text-uppercase"><span
                                            class="btn-text" data-back="Vew Details"
                                            data-front="Vew Details"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-overlay" data-bg-src="assets/img/service/service_overlay_2.jpg">
                                </div>
                                <div class="box-content">
                                    <div class="box-icon"><img src="assets/img/icon/service_1_2.svg" alt="Icon">
                                    </div>
                                    <div class="box-img" data-mask-src="assets/img/shape/ser-shape.png"><img
                                            src="assets/img/service/service_1_2.jpg" alt="img"></div>
                                    <h3 class="box-title"><a href="service-details.html">Battery Storage Solutions</a>
                                    </h3>
                                    <p class="box-text">Store solar power with our cutting-edge battery solutions,
                                        providing energy independence and uninterrupted power. Whether.</p><a
                                        href="service.html"
                                        class="th-btn border-btn th-icon fw-medium text-uppercase"><span
                                            class="btn-text" data-back="Vew Details"
                                            data-front="Vew Details"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-theme">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-6 cta-item_wrapp">
                    <div class="cta-item">
                        <div class="box-icon"><img src="assets/img/icon/cta_1_1.svg" alt=""></div>
                        <h3 class="box-title">Domestic Installation</h3>
                        <p class="box-text">Solar PV, Battery Storage, Heat Recovery Ventilation Systems & EV Charging
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 cta-item_wrapp">
                    <div class="cta-item">
                        <div class="box-icon"><img src="assets/img/icon/cta_1_2.svg" alt=""></div>
                        <h3 class="box-title">Commercial Installation</h3>
                        <p class="box-text">Solar PV, Battery Storage, Heat Recovery Ventilation Systems & EV Charging
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="about-area space" id="about-sec">
        <div class="container">
            <div class="row gy-5 flex-row-reverse">
                <div class="col-xl-5">
                    <div class="pe-xxl-4 me-xl-3">
                        <div class="title-area mb-30"><span class="sub-title">Why Choose Us</span>
                            <h2 class="sec-title">Our Solar Solutions Reach 100% Renewable</h2>
                        </div>
                        <p class="mt-n2 mb-35">We offer flexible financing options and guidance on government
                            incentives and tax credits. Our team helps make solar energy affordable for everyone,
                            ensuring you get the best value and maximize your investment in clean energy.</p>
                        <div class="about-feature-wrap">
                            <div class="about-feature">
                                <div class="box-icon"><img src="assets/img/icon/about_1_1.svg" alt="Icon"></div>
                                <div class="media-body">
                                    <h3 class="box-title">Professional Solar Expert</h3>
                                    <p class="box-text">Solar panels, also referred to as solar modules, are made up of
                                        multiple solar cells arranged in a grid. They are installed on rooftops, solar
                                        farms, and other suitable.</p>
                                </div>
                            </div>
                            <div class="about-feature">
                                <div class="box-icon"><img src="assets/img/icon/about_1_2.svg" alt="Icon"></div>
                                <div class="media-body">
                                    <h3 class="box-title">24/7 Customer Support</h3>
                                    <p class="box-text">Solar panels, also referred to as solar modules, are made up of
                                        multiple solar cells arranged in a grid. They are installed on rooftops, solar
                                        farms, and other suitable..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 mb-30 mb-xl-0">
                    <div class="img-box2 pe-xl-5 me-xl-2">
                        <div class="img1 th-parallax"><img src="assets/img/normal/about_1_2.jpg" alt="About">
                        </div>
                        <div class="discount-wrapp style2">
                            <h2 class="box-counter"><span class="counter-number">36</span></h2>
                            <div class="discount-tag"><span class="discount-anime">years of experience in solar
                                    enargy</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="team-sec space-bottom overflow-hidden">
        <div class="container z-index-common">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-xxl-5">
                    <div class="title-area text-center"><span class="sub-title">Team Members</span>
                        <h2 class="sec-title">Meet Our Amazing Team Of Solar Energy Experts</h2>
                    </div>
                </div>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="teamSlider1"
                    data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1300":{"slidesPerView":"4"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img-wrap">
                                    <div class="box-img"><img src="assets/img/team/team_1_1.jpg" alt="Team">
                                    </div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title"><a href="team-details.html">Mishel Marsh</a></h3><span
                                        class="team-desig">Founder</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img-wrap">
                                    <div class="box-img"><img src="assets/img/team/team_1_2.jpg" alt="Team">
                                    </div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title"><a href="team-details.html">Alex Michel</a></h3><span
                                        class="team-desig">Engineer</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img-wrap">
                                    <div class="box-img"><img src="assets/img/team/team_1_3.jpg" alt="Team">
                                    </div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title"><a href="team-details.html">Famhida Ruko</a></h3><span
                                        class="team-desig">Engineer</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img-wrap">
                                    <div class="box-img"><img src="assets/img/team/team_1_4.jpg" alt="Team">
                                    </div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title"><a href="team-details.html">Alex Anfantino</a></h3><span
                                        class="team-desig">Engineer</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img-wrap">
                                    <div class="box-img"><img src="assets/img/team/team_1_5.jpg" alt="Team">
                                    </div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title"><a href="team-details.html">Jack Connor</a></h3><span
                                        class="team-desig">Founder</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img-wrap">
                                    <div class="box-img"><img src="assets/img/team/team_1_6.jpg" alt="Team">
                                    </div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title"><a href="team-details.html">Mason Robert</a></h3><span
                                        class="team-desig">Engineer</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img-wrap">
                                    <div class="box-img"><img src="assets/img/team/team_1_7.jpg" alt="Team">
                                    </div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title"><a href="team-details.html">Ethan David</a></h3><span
                                        class="team-desig">Founder</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="th-team team-box">
                                <div class="team-img-wrap">
                                    <div class="box-img"><img src="assets/img/team/team_1_8.jpg" alt="Team">
                                    </div>
                                    <div class="th-social"><a target="_blank" href="https://facebook.com/"><i
                                                class="fab fa-facebook-f"></i></a> <a target="_blank"
                                            href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="https://instagram.com/"><i
                                                class="fab fa-instagram"></i></a> <a target="_blank"
                                            href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title"><a href="team-details.html">Daniel Thomas</a></h3><span
                                        class="team-desig">Engineer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button data-slider-prev="#teamSlider1" class="slider-arrow slider-prev"><i
                        class="far fa-arrow-left"></i></button>
                <button data-slider-next="#teamSlider1" class="slider-arrow slider-next"><i
                        class="far fa-arrow-right"></i></button>
            </div>
        </div>
    </section>
    <section class="project-area bg-white position-relative space" id="project-sec"
        data-bg-src="assets/img/bg/project_bg_1.jpg">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-4">
                    <div class="title-area text-center text-lg-start"><span class="sub-title">Case Study</span>
                        <h2 class="sec-title text-white">Our Latest Case Studies</h2>
                        <p class="text-light">We offer customized solar systems for homes of all sizes, helping
                            households reduce electricity bills.</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="sec-btn"><a href="project.html" class="th-btn style1 th-icon"><span class="btn-text"
                                data-back="View All Case Study" data-front="View All Case Study"></span><i
                                class="fa-regular fa-arrow-right ms-2"></i></a></div>
                </div>
            </div>
            <div class="line-bottom"></div>
            <div class="project-box-static-wrap">
                <div class="project-box-static" data-bg-src="assets/img/bg/project_bg_1.jpg">
                    <div class="project-box">
                        <div class="project-box-img"><img src="assets/img/project/project_1_1.jpg" alt="img">
                        </div>
                        <div class="project-box-details">
                            <h3 class="box-title"><a href="project-details.html">Bay Area Solar Farm</a></h3>
                            <p class="box-text">We offer customized solar systems for homes of all sizes, helping
                                households reduce electricity bills and environmental impact. Our team handles every
                                step, from planning and permitting to installation and post-installation
                                support.</p>
                            <div class="counter-grid_wrapp">
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">96</span>MW</h3>
                                    <p class="counter-text mb-0">Capacity</p>
                                </div>
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">160</span>HE</h3>
                                    <p class="counter-text mb-0">Total Area</p>
                                </div>
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">2023</span>YR</h3>
                                    <p class="counter-text mb-0">Year Built</p>
                                </div>
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">16</span>M</h3>
                                    <p class="counter-text mb-0">USD Dollar Budget</p>
                                </div>
                            </div>
                            <div class="mt-50"><a href="project.html" class="th-btn border-btn th-icon"><span
                                        class="btn-text" data-back="View Details" data-front="View Details"></span><i
                                        class="fa-regular fa-arrow-right ms-2"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="project-box-static" data-bg-src="assets/img/bg/project_bg_1.jpg">
                    <div class="project-box">
                        <div class="project-box-img"><img src="assets/img/project/project_1_2.jpg" alt="img">
                        </div>
                        <div class="project-box-details">
                            <h3 class="box-title"><a href="project-details.html">Green Forest Solar Station</a></h3>
                            <p class="box-text">We offer customized solar systems for homes of all sizes, helping
                                households reduce electricity bills and environmental impact. Our team handles every
                                step, from planning and permitting to installation and post-installation
                                support.</p>
                            <div class="counter-grid_wrapp">
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">96</span>MW</h3>
                                    <p class="counter-text mb-0">Capacity</p>
                                </div>
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">160</span>HE</h3>
                                    <p class="counter-text mb-0">Total Area</p>
                                </div>
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">2023</span>YR</h3>
                                    <p class="counter-text mb-0">Year Built</p>
                                </div>
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">16</span>M</h3>
                                    <p class="counter-text mb-0">USD Dollar Budget</p>
                                </div>
                            </div>
                            <div class="mt-50"><a href="project.html" class="th-btn border-btn th-icon"><span
                                        class="btn-text" data-back="View Details"
                                        data-front="View Details"></span><i
                                        class="fa-regular fa-arrow-right ms-2"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="project-box-static" data-bg-src="assets/img/bg/project_bg_1.jpg">
                    <div class="project-box">
                        <div class="project-box-img"><img src="assets/img/project/project_1_3.jpg" alt="img">
                        </div>
                        <div class="project-box-details">
                            <h3 class="box-title"><a href="project-details.html">Wearing Protection Equipment</a>
                            </h3>
                            <p class="box-text">We offer customized solar systems for homes of all sizes, helping
                                households reduce electricity bills and environmental impact. Our team handles every
                                step, from planning and permitting to installation and post-installation
                                support.</p>
                            <div class="counter-grid_wrapp">
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">96</span>MW</h3>
                                    <p class="counter-text mb-0">Capacity</p>
                                </div>
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">160</span>HE</h3>
                                    <p class="counter-text mb-0">Total Area</p>
                                </div>
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">2023</span>YR</h3>
                                    <p class="counter-text mb-0">Year Built</p>
                                </div>
                                <div class="counter-grid">
                                    <h3 class="counter-grid-title"><span class="counter-number">16</span>M</h3>
                                    <p class="counter-text mb-0">USD Dollar Budget</p>
                                </div>
                            </div>
                            <div class="mt-50"><a href="project.html" class="th-btn border-btn th-icon"><span
                                        class="btn-text" data-back="View Details"
                                        data-front="View Details"></span><i
                                        class="fa-regular fa-arrow-right ms-2"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space overflow-hidden position-relative space overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-7">
                    <div class="title-area text-center pe-xl-5 ps-xl-5"><span class="sub-title">Our Working
                            Process</span>
                        <h2 class="sec-title">How We Work Process In Solar Energy</h2>
                    </div>
                </div>
            </div>
            <div class="step-wrap">
                <div class="process-card_wrapp">
                    <div class="process-card">
                        <div class="process-image">
                            <div class="box-img global-img"><img src="assets/img/process/process_1_1.jpg"
                                    alt="Process"></div><span class="number">01</span>
                        </div>
                        <div class="box-content">
                            <h2 class="box-title">Consultation & Site Assessment</h2>
                            <p class="box-text">We begin with an in-depth consultation to understand your energy needs
                                and goals. Our team then conducts.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-image">
                            <div class="box-img global-img"><img src="assets/img/process/process_1_2.jpg"
                                    alt="Process"></div><span class="number">02</span>
                        </div>
                        <div class="box-content">
                            <h2 class="box-title">Custom System Design & Planning</h2>
                            <p class="box-text">Custom system design and planning typically involves creating tailored
                                solutions to meet specific needs</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-image">
                            <div class="box-img global-img"><img src="assets/img/process/process_1_3.jpg"
                                    alt="Process"></div><span class="number">03</span>
                        </div>
                        <div class="box-content">
                            <h2 class="box-title">Professional Solar Installation</h2>
                            <p class="box-text">Assess roof space, tilt, and orientation (for rooftop installations).
                                Evaluate ground space and shading</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-image">
                            <div class="box-img global-img"><img src="assets/img/process/process_1_4.jpg"
                                    alt="Process"></div><span class="number">04</span>
                        </div>
                        <div class="box-content">
                            <h2 class="box-title">Monitoring & Ongoing Support</h2>
                            <p class="box-text">Effective monitoring and ongoing support are critical for ensuring a
                                solar energy systems optimal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="overflow-hidden bg-smoke2" id="faq-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7">
                    <div class="faq-image th-parallax"><img src="assets/img/normal/faq-image.jpg" alt="">
                    </div>
                </div>
                <div class="col-xl-5 mt-35 mt-xl-0">
                    <div class="faq-area">
                        <div class="title-area pe-xxl-5 me-xxl-5"><span class="sub-title">FAQ’S</span>
                            <h2 class="sec-title">Have Any Questions?</h2>
                        </div>
                        <div class="accordion-area accordion" id="faqAccordion">
                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-1">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-1"
                                        aria-expanded="false" aria-controls="collapse-1">What is the experience of
                                        your employees?</button>
                                </div>
                                <div id="collapse-1" class="accordion-collapse collapse"
                                    aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Enthusiastically syndicate extensive technology before
                                            granular testing procedures. Rapidiously aggregate progressive niches
                                            through high standards. Globally deploy user-centric sources.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card active">
                                <div class="accordion-header" id="collapse-item-2">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-2" aria-expanded="true"
                                        aria-controls="collapse-2">What is the experience of your employees?</button>
                                </div>
                                <div id="collapse-2" class="accordion-collapse collapse show"
                                    aria-labelledby="collapse-item-2" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Enthusiastically syndicate extensive technology before
                                            granular testing procedures. Rapidiously aggregate progressive niches
                                            through high standards. Globally deploy user-centric sources.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-3">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-3"
                                        aria-expanded="false" aria-controls="collapse-3">What is the experience of
                                        your employees?</button>
                                </div>
                                <div id="collapse-3" class="accordion-collapse collapse"
                                    aria-labelledby="collapse-item-3" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Enthusiastically syndicate extensive technology before
                                            granular testing procedures. Rapidiously aggregate progressive niches
                                            through high standards. Globally deploy user-centric sources.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="overflow-hidden bg-white space overflow-hidden" id="testi-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-6">
                    <div class="title-area text-center"><span class="sub-title">Testimonials</span>
                        <h2 class="sec-title">What our clients say about our Solar services?</h2>
                    </div>
                </div>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider testiSlide1 has-shadow" id="testiSlide1"
                    data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Efficient and Professional Team!</h3>
                                <p class="box-text">“I was very impressed with the solar panel installation process.
                                    The team was efficient, professional, and always kept me informed.”</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_1.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">Sarah Johnson</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Smooth and Hassle-Free Process!</h3>
                                <p class="box-text">“The solar panel installation process was smooth and hassle-free.
                                    The team was very professional and took care of everything,”</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_2.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">Richard Wilson</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Excellent Customer Service from Mentari!</h3>
                                <p class="box-text">“The customer service I received from the solar panel company
                                    exceptional. They were always available to answer my questions</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_3.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">David Brown</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Eco-friendly and Convenient Product!</h3>
                                <p class="box-text">“I wanted to switch to solar panels because I wanted to be more
                                    eco-friendly and save money on my energy bills. This company ”</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_4.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">Emily Davis</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Efficient and Professional Team!</h3>
                                <p class="box-text">“I was very impressed with the solar panel installation process.
                                    The team was efficient, professional, and always kept me informed .”</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_5.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">Amelia Margaret</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Smooth and Hassle-Free Process!</h3>
                                <p class="box-text">“The solar panel installation process was smooth and hassle-free.
                                    The team was very professional and took care of everything,”</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_6.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">George Reece</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Excellent Customer Service from Mentari!</h3>
                                <p class="box-text">“I was very impressed with the solar panel installation process.
                                    The team was efficient, professional, and always kept me informed .”</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_7.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">Olivia Samantha</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Eco-friendly and Convenient Product!</h3>
                                <p class="box-text">“The solar panel installation process was smooth and hassle-free.
                                    The team was very professional and took care of everything,”</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_8.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">Michael Richard</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Efficient and Professional Team!</h3>
                                <p class="box-text">“I was very impressed with the solar panel installation process.
                                    The team was efficient, professional, and always kept me informed.”</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_9.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">James Charles</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Smooth and Hassle-Free Process!</h3>
                                <p class="box-text">“The solar panel installation process was smooth and hassle-free.
                                    The team was very professional and took care of everything,”</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_10.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">Sophia Jennifer</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Excellent Customer Service from Mentari!</h3>
                                <p class="box-text">“The customer service I received from the solar panel company
                                    exceptional. They were always available to answer my questions ”</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_11.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">Isabella Victoria</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <i
                                        class="fa-sharp fa-solid fa-star"></i> <span class=""><i
                                            class="fa-solid fa-star"></i></span></div>
                                <h3 class="box-title2">Eco-friendly and Convenient Product!</h3>
                                <p class="box-text">“I wanted to switch to solar panels because I wanted to be more
                                    eco-friendly and save money on my energy bills. This company</p>
                                <div class="box-wrapp">
                                    <div class="box-profile">
                                        <div class="box-author"><img src="assets/img/testimonial/testi_1_12.jpg"
                                                alt="Avater"></div>
                                        <div class="box-info">
                                            <h3 class="box-title">Alexander Joseph</h3><span
                                                class="box-desig">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-pagination"></div>
                </div>
                <button data-slider-prev="#testiSlide1" class="slider-arrow slider-prev"><i
                        class="far fa-arrow-left"></i></button>
                <button data-slider-next="#testiSlide1" class="slider-arrow slider-next"><i
                        class="far fa-arrow-right"></i></button>
            </div>
        </div>
        <div class="shape-mockup d-none d-xl-block" data-top="0%" data-right="0%"><img
                src="assets/img/shape/shape-1.png" alt=""></div>
    </section>
    <section class="overflow-hidden">
        <div class="container">
            <div class="appointment-area position-relative">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="title-area mb-0 text-xl-start pe-xxl-5 me-xxl-5 space"><span
                                class="sub-title">Request A Quote</span>
                            <h2 class="sec-title text-white">Talk About How We Can Help You Reduce Your Energy</h2>
                            <p class="sec-desc me-xl-5">Costs and successfully manage your carbon emissions with
                                investment free solar technologies.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="appointment-area-wrapper">
                            <form action="https://html.themehour.net/solak/demo/mail.php" method="POST"
                                class="appointment-form input-smoke ajax-contact">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Company Name">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email Address">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="tel" class="form-control" name="number" id="number"
                                            placeholder="Phone Number">
                                    </div>
                                    <div class="form-group col-12">
                                        <textarea name="message" id="message" cols="30" rows="3" class="form-control"
                                            placeholder="Write Messages..."></textarea>
                                    </div>
                                    <div class="form-btn col-12">
                                        <button class="th-btn fw-btn"><span class="btn-text"
                                                data-back="Send Messages"
                                                data-front="Send Messages"></span></button>
                                    </div>
                                </div>
                                <p class="form-messages mb-0 mt-3"></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="shape-mockup d-none d-xxl-block" data-bottom="0%" data-right="-10%"><img
                        src="assets/img/shape/shape-2.png" alt=""></div>
            </div>
        </div>
    </section>
    <section class="overflow-hidden space overflow-hidden" id="blog-sec">
        <div class="container">
            <div class="title-area text-center"><span class="sub-title">News & Blog</span>
                <h2 class="sec-title">Our Latest News & Blogs</h2>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="blogSlider"
                    data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="box-img global-img"><img src="assets/img/blog/blog_1_1.jpg"
                                        alt="blog image"></div>
                                <div class="box-content">
                                    <div class="blog-meta"><a href="blog.html"><i
                                                class="fa-regular fa-calendar"></i>15 March , 2025</a> <a
                                            href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">On an island in the sun, coal
                                            power is king over abundant</a></h3><a href="blog-details.html"
                                        class="th-btn border-btn th-icon text-uppercase fw-semibold"><span
                                            class="btn-text" data-back="Read More"
                                            data-front="Read More"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="box-img global-img"><img src="assets/img/blog/blog_1_2.jpg"
                                        alt="blog image"></div>
                                <div class="box-content">
                                    <div class="blog-meta"><a href="blog.html"><i
                                                class="fa-regular fa-calendar"></i>16 March , 2025</a> <a
                                            href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">On an Island in the Sun, Coal
                                            Power Dominates Solar Energy</a></h3><a href="blog-details.html"
                                        class="th-btn border-btn th-icon text-uppercase fw-semibold"><span
                                            class="btn-text" data-back="Read More"
                                            data-front="Read More"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="box-img global-img"><img src="assets/img/blog/blog_1_3.jpg"
                                        alt="blog image"></div>
                                <div class="box-content">
                                    <div class="blog-meta"><a href="blog.html"><i
                                                class="fa-regular fa-calendar"></i>17 March , 2025</a> <a
                                            href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">On an Island in the Sun, Coal
                                            Power Rules Solar Potentia</a></h3><a href="blog-details.html"
                                        class="th-btn border-btn th-icon text-uppercase fw-semibold"><span
                                            class="btn-text" data-back="Read More"
                                            data-front="Read More"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="box-img global-img"><img src="assets/img/blog/blog_1_2.jpg"
                                        alt="blog image"></div>
                                <div class="box-content">
                                    <div class="blog-meta"><a href="blog.html"><i
                                                class="fa-regular fa-calendar"></i>19 March , 2025</a> <a
                                            href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a>
                                    </div>
                                    <h3 class="box-title"><a href="blog-details.html">On an Island in the Sun, Coal
                                            Power Reigns Over Abundant</a></h3><a href="blog-details.html"
                                        class="th-btn border-btn th-icon text-uppercase fw-semibold"><span
                                            class="btn-text" data-back="Read More"
                                            data-front="Read More"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button data-slider-prev="#blogSlider" class="slider-arrow slider-prev"><i
                        class="far fa-arrow-left"></i></button>
                <button data-slider-next="#blogSlider" class="slider-arrow slider-next"><i
                        class="far fa-arrow-right"></i></button>
            </div>
        </div>
    </section>
    <div class="brand-area overflow-hidden">
        <div class="container th-container">
            <div class="slider-area text-center">
                <div class="swiper th-slider" id="brandSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"476":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"6"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_1.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_1.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_2.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_2.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_3.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_3.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_4.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_4.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_5.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_5.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_6.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_6.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_1.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_1.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_2.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_2.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_3.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_3.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_4.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_4.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_5.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_5.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#"><img class="original" src="assets/img/brand/brand_1_6.svg"
                                        alt="Brand Logo"> <img class="gray" src="assets/img/brand/brand_1_6.svg"
                                        alt="Brand Logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-wrapper bg-title footer-layout1" data-bg-src="assets/img/bg/dot-shape.png">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xxl-3 col-xl-4">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a class="" href="#"><img src="assets/logo.svg"
                                            alt="Solak "></a>
                                </div>
                                <p class="about-text">Solar energy is renewable and inexhaustible, making it a
                                    sustainable solution for meeting energy demands. energy usage to design the ideal
                                    solar solution for your property.</p>
                                <div class="th-social"><a href="https://www.facebook.com/"><i
                                            class="fab fa-facebook-f"></i></a> <a href="https://www.twitter.com/"><i
                                            class="fab fa-twitter"></i></a> <a href="https://www.linkedin.com/"><i
                                            class="fab fa-linkedin-in"></i></a> <a
                                        href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Useful Links</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="service.html">Services</a></li>
                                    <li><a href="project.html">projects</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Our Services</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="service.html">Renewable Energy</a></li>
                                    <li><a href="service.html">Wind Generator</a></li>
                                    <li><a href="service.html">Solar Energy</a></li>
                                    <li><a href="service.html">Hydropower Energy</a></li>
                                    <li><a href="service.html">Eco Maintenance</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Contact Us</h3>
                            <div class="th-widget-about">
                                <h4 class="footer-info-title">Address Location</h4>
                                <p class="footer-info"><i class="fas fa-map-marker-alt"></i>Orlando City, USA</p>
                                <h4 class="footer-info-title">Phone Number</h4>
                                <p class="footer-info"><i class="fa-sharp fa-solid fa-phone"></i> <span><a
                                            class="text-inherit" href="tel:+19524357106">+1 952-435-7106</a></span>
                                </p>
                                <h4 class="footer-info-title">Email address</h4>
                                <p class="footer-info"><i class="fa-sharp fa-solid fa-envelope"></i><span> <a
                                            class="text-inherit"
                                            href="mailto:info@solak.com">info@solak.com</a></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/blog/recent-post-2-1.jpg"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="recent-post-meta"><a href="blog.html">2 March, 2025</a></div>
                                        <h4 class="post-title"><a class="text-inherit"
                                                href="blog-details.html">Metal Roofing The Best for Solar Panels</a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/blog/recent-post-2-2.jpg"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="recent-post-meta"><a href="blog.html">3 March, 2025</a></div>
                                        <h4 class="post-title"><a class="text-inherit"
                                                href="blog-details.html">Metal Roofing The Best for Solar Panels</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap text-center">
            <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2025 <a
                    href="https://themeforest.net/user/themeholy">Solak </a>. All Rights Reserved.</p>
        </div>
    </footer>
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/circle-progress.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/nice-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/SplitText.min.js"></script>
    <script src="assets/js/lenis.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
