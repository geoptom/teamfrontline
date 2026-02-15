<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" /> -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | {{ $settings['general']['site_title'] ?? '' }}</title>
    @yield('metas')

    {{-- SEOTools (Dynamic SEO) --}}
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    @php
        $nonce = $cspNonce ?? '';
        $jsonLdHtml = JsonLd::generate();
        // Add nonce to first <script> tag
        $jsonLdHtmlWithNonce = preg_replace('/<script\b(.*?)>/', '<script$1 nonce="'.$nonce.'">', $jsonLdHtml, 1);
    @endphp

    {!! $jsonLdHtmlWithNonce !!}

    <meta name="author" content="brightontechnologies">
    <meta name="description" content=">@yield('title') | {{ $settings['general']['site_title'] ?? '' }}">
    <meta name="keywords" content=">@yield('title') | {{ $settings['general']['site_title'] ?? '' }}">
    {{-- <meta name="robots" content="INDEX,FOLLOW"> --}}
    <meta name="robots" content="noindex, follow">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

    <link rel="icon" type="image/png" href="{{ asset($settings['general']['site_favicon'] ?? null) }}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    {{-- <link rel="manifest" href="assets/img/favicons/manifest.json"> --}}
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset($settings['general']['site_favicon'] ?? null) }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anek+Latin:wght@100..800&amp;family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}?v=5">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?version=1.14') }}">

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/jquery.calendar.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/jquery.exzoom.css') }}"> --}}

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/multiple-image-video.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/mobile_menu.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"> --}}
    {{-- #FAC8E5 --}}
    <style>
        :root {
            --theme-color: {{ $settings['appearance']['theme_color'] ?? '#B60A6E' }};
            --theme-color2: {{ $settings['appearance']['theme_color2'] ?? '#FFB1DF' }};
            --smoke-color: {{ $settings['appearance']['bg_smoke'] ?? '#E0E0E0' }};
            --smoke-color2: {{ $settings['appearance']['bg_smoke2'] ?? '#E0E0E0' }};
            --smoke-color3: #FFB1DF;
            --smoke-color4: #F8E6F0;
            --swiper-theme-color: {{ $settings['appearance']['theme_color'] ?? '#B60A6E' }};
        }

        .text-theme {
            color: var(--theme-color);
        }

        .btn-theme {
            background: var(--theme-color) !important;
            color: #fff !important;
            border-color: var(--theme-color2) !important;
        }

        .btn-theme:hover {
            background: var(--theme-color2) !important;
        }


        .btn-outline-theme {
            border-color: var(--theme-color);
            color: var(--theme-color);
            transition: all 0.3s ease;
        }

        .btn-outline-theme:hover {
            background: var(--theme-color);
            color: #fff;
        }

        .product-card,
        .category-card {
            transition: all 0.3s ease;
        }

        .product-card:hover,
        .category-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.12);
        }

        .object-fit-cover {
            object-fit: cover;
            width: 100%;
            height: 100%;
            display: block;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: var(--theme-color);
            transition: 0.3s;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            transform: scale(1.2);
        }

        /* Responsive ratios for uniform image display */
        .ratio {
            aspect-ratio: 1 / 1;
            overflow: hidden;
            background: #f8f8f8;
            border-radius: 0.75rem;
        }
    </style>
    @stack('styles')

    @if(isset($settings['analytics']['google_analytics_id']) && $settings['analytics']['google_analytics_id'] != '')
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{$settings['analytics']['google_analytics_id']}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{$settings['analytics']['google_analytics_id']}}');
        </script>
    @endif
</head>

<body>

    <!--============================
        HEADER START
    ==============================-->
    @include('frontend.layouts.header')
    <!--============================
        HEADER END
    ==============================-->

    <!--============================
        Main Content Start
    ==============================-->
    @yield('content')
    <!--============================
       Main Content End
    ==============================-->

    <!--============================
        FOOTER PART START
    ==============================-->
    @include('frontend.layouts.footer')
    <!--============================
        FOOTER PART END
    ==============================-->

    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}?v=5"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/circle-progress.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/SplitText.min.js') }}"></script>
    <script src="{{ asset('assets/js/lenis.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.exzoom.js') }}"></script>

    <!--select2 js-->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <!--slick slider js-->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('assets/js/venobox.min.js') }}"></script>
    <!--sticky sidebar js-->
    <script src="{{ asset('assets/js/sticky_sidebar.js') }}"></script>
    <!--toastr js-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--multiple-image-video js-->
    <script src="{{ asset('assets/js/multiple-image-video.js') }}"></script>

    <script src="{{ asset('assets/js/main.js?ver=1.2') }}"></script>


    <!--main/custom js-->
    {{-- <script src="{{ asset('frontend/js/main.js') }}"></script> --}}

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>
    <script>
        $(document).ready(function() {
            $('.auto_click').click();
        })
    </script>

    @include('frontend.layouts.scripts')
    @stack('scripts')
</body>

</html>
