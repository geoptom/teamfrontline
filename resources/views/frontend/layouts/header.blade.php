@push('styles')
    <style>
        /* --- Make header row flex for proper alignment --- */
        @media (max-width: 991px) {
            .menu-area .row {
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                width: 100% !important;
            }

            /* Force the logo to stay left and not grow */
            .menu-area .header-logo {
                flex: 0 0 auto !important;
                margin-right: auto !important;
            }

            /* Mobile menu button: push to right */
            .menu-area .th-menu-toggle {
                margin-left: auto !important;
                margin-right: 20px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                flex-shrink: 0 !important;
            }

            /* Hide the middle menu column that's taking space */
            .menu-area .col-auto:nth-child(2) {
                flex: 1 1 auto !important;
                margin-left: auto !important;
                margin-right: 0 !important;
            }
        }

        /* --- Make mobile logo bigger --- */
        @media (max-width: 767px) {
            .header-logo img {
                max-width: 250px !important;
                /* Increased from 220px */
                height: auto !important;
            }

            .menu-area .header-logo {
                flex: 0 0 auto !important;
                padding-right: 10px !important;
            }

            /* Ensure menu toggle button stays right-aligned on mobile */
            .menu-area .col-auto:nth-child(2) {
                display: flex !important;
                margin-left: auto !important;
                margin-right: 0px !important;
                padding: 0 !important;
            }

            /* Center align social icons in mobile top bar */
            .header-top .social-links {
                justify-content: center !important;
                text-align: center !important;
                display: flex !important;
                flex-direction: row;
                width: 100%;
            }

            .header-top .social-links .social-title {
                width: 100%;
                text-align: center;
                display: block;
            }

            .header-top .social-links a {
                float: none !important;
                display: inline-block !important;
                margin-left: 8px;
                margin-right: 8px;
            }

            .header-top .row {
                flex-direction: column !important;
                align-items: center !important;
                justify-content: center !important;
                display: flex !important;
            }

            .header-top .col-auto {
                width: 100% !important;
                text-align: center !important;
                justify-content: center !important;
                display: flex !important;
            }
        }
    </style>
@endpush
<header class="th-header header-layout1" role="banner">

    {{-- Cursor Elements (optional) --}}
    <div class="cursor-follower"></div>
    <div class="slider-drag-cursor">
        <img src="{{ asset('assets/img/icon/arrow.svg') }}" alt="Drag">
    </div>

    {{-- Desktop Side Menu --}}
    <div class="sidemenu-wrapper d-none d-lg-block">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls" aria-label="Close menu">
                <i class="far fa-times"></i>
            </button>

            <div class="widget footer-widget">
                <h3 class="widget_title">About Company</h3>
                <p class="about-text">{{ $settings['footer']['about'] ?? '' }}</p>

                <div class="th-social">
                    @foreach (json_decode($settings['social']['links'], true) as $social)
                        <a href="{{ $social['url'] }}" aria-label="Social Link">
                            <i class="{{ $social['icon'] }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Mobile Search --}}
    {{-- <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="{{ route('search') }}">
            <input type="text" name="q" placeholder="What are you looking for?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div> --}}

    {{-- Mobile Menu --}}
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>

            <div class="mobile-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset($settings['appearance']['logo_dark']) }}"
                        alt="{{ $settings['general']['site_name'] }}">
                </a>
            </div>

            <nav class="th-mobile-menu" role="navigation">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>

                    {{-- Products --}}
                    <li class="menu-item-has-children">
                        <a href="{{ route('products.index') }}">Products</a>
                        @include('frontend.layouts.partials.menu-categories-mobile')
                    </li>

                    {{-- Solutions --}}
                    <li class="menu-item-has-children">
                        <a href="{{ route('solutions.index') }}">Solutions</a>
                        @include('frontend.layouts.partials.menu-solutions')
                    </li>

                    {{-- Services --}}
                    <li class="menu-item-has-children">
                        <a href="{{ route('services.index') }}">Services</a>
                        @include('frontend.layouts.partials.menu-services')
                    </li>

                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>

    {{-- Top Bar --}}
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-between align-items-center">

                <div class="col-auto d-none d-md-block">
                    <ul class="header-links mb-0">
                        <li>
                            <i class="fa-light fa-phone"></i>
                            <span>{{ $settings['general']['site_phone'] }}</span>
                        </li>
                        <li>
                            <i class="fa-sharp fa-regular fa-location-dot"></i>
                            <span>{{ $settings['general']['address'] }}</span>
                        </li>
                        <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a href="mailto:{{ $settings['general']['site_email'] }}">
                                {{ $settings['general']['site_email'] }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-auto">
                    <div class="social-links">
                        <span class="social-title">Follow Us On:</span>
                        @foreach (json_decode($settings['social']['links'], true) as $social)
                            <a href="{{ $social['url'] }}"><i class="{{ $social['icon'] }}"></i></a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Main Navigation --}}
    <div class="sticky-wrapper">
        <div class="menu-area bg-smoke">
            <div class="container-fiuld mx-3">
                <div class="row align-items-center" style="width: 100%;">

                    {{-- Logo --}}
                    {{-- <div class="col-auto p-0">
                        <a href="{{ route('home') }}" class="header-logo">
                            <img src="{{ asset($settings['appearance']['logo_dark']) }}"
                                 alt="{{ $settings['general']['site_name'] }}"
                                 class="img-fluid" style="height: 60px;">
                        </a>
                    </div> --}}
                    <div class="col-auto p-0" style="flex-shrink: 0;">
                        <div class="header-logo m-0">
                            {{-- @if (Agent::isMobile())
                                    <a href=""><img src="assets/apple-touch-icon.png" alt="Solak " style="width: 55px;"></a>
                                @else
                                    <a href=""><img src="assets/logo.svg" alt="Solak " style="width: 300px;"></a>
                                    @endif --}}
                            <a href=""><img src="{{ asset($settings['appearance']['logo_dark'] ?? null) }}"
                                    alt="{{ $settings['general']['site_name'] }}" style="width: 375px;"></a>
                        </div>
                    </div>

                    {{-- Main Menu --}}
                    <div class="col-auto me-xl-auto p-0"
                        style="flex: 1 1 auto; display: flex; align-items: center; justify-content: flex-end;">
                        <nav class="main-menu style2 d-none d-lg-inline-block" role="navigation">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>

                                {{-- Products --}}
                                <li class="menu-item-has-children">
                                    <a href="{{ route('products.index') }}">Products</a>
                                    @include('frontend.layouts.partials.menu-categories-desktop')
                                </li>

                                {{-- Solutions --}}
                                <li class="menu-item-has-children">
                                    <a href="{{ route('solutions.index') }}">Solutions</a>
                                    @include('frontend.layouts.partials.menu-solutions')
                                </li>

                                {{-- Services --}}
                                <li class="menu-item-has-children">
                                    <a href="{{ route('services.index') }}">Services</a>
                                    @include('frontend.layouts.partials.menu-services')
                                </li>

                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </nav>

                        <button class="th-menu-toggle d-inline-block d-lg-none"
                            style="margin-left: auto; margin-right: 0px;">
                            <i class="far fa-bars"></i>
                        </button>
                    </div>

                    {{-- Call Button --}}
                    {{-- <div class="col-auto d-none d-xl-block">
                        <a href="tel:{{ $settings['general']['site_phone'] }}" class="th-btn th-icon">
                            <span class="btn-text"
                                data-back="Call Us: {{ $settings['general']['site_phone'] }}"
                                data-front="Call Us: {{ $settings['general']['site_phone'] }}">
                            </span>
                        </a>
                    </div> --}}

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
        </div>
    </div>
</header>
