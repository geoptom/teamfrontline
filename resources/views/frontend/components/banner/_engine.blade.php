@php
    $bannerType = $bannerType ?? 0;
@endphp

{{-- Load Swiper once globally --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

<style>
    /* UNIVERSAL BACKGROUND FIX */
    /* [data-bg-src] {
    background-size: cover !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
}
@media(max-width:767px){
    [data-bg-src] { min-height: 280px !important; }
} */

    /* UNIVERSAL SLIDE LAYOUT FIX */
    /* .swiper { width: 100%; }
.swiper-slide { position: relative; }
.slide-overlay { position:absolute; inset:0; background:rgba(0,0,0,0.55); z-index:1; }
.slide-content { position:relative; z-index:2; } */

    /* Responsive text */
    /* @media(max-width:767px){
    .banner-title { font-size: 1.4rem !important; }
    .banner-desc { font-size: .85rem !important; }
} */
</style>

{{-- Banner Dispatcher --}}
@switch($bannerType)
    @case(1)
        @include('frontend.components.banner.banner-1', ['products' => $products])
    @break

    @case(2)
        @include('frontend.components.banner.banner-2', ['products' => $products])
    @break

    @case(3)
        @include('frontend.components.banner.banner-3', ['products' => $products])
    @break

    @case(4)
        @include('frontend.components.banner.banner-4', ['products' => $products])
    @break

    @case(5)
        @include('frontend.components.banner.banner-5', ['products' => $products])
    @break

    @case(6)
        @include('frontend.components.banner.banner-default-back', ['sliders' => $sliders])
    @break

    @default
        @include('frontend.components.banner.banner-default', ['sliders' => $sliders])
@endswitch

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        // AUTO-APPLY data-bg-src
        document.querySelectorAll("[data-bg-src]").forEach(el => {
            const bg = el.getAttribute("data-bg-src");
            if (bg) el.style.backgroundImage = `url('${bg}')`;
        });

        // Initialize ALL swipers on page
        document.querySelectorAll(".swiper").forEach(el => {
            new Swiper(el, {
                loop: true,
                autoHeight: false,
                navigation: {
                    nextEl: el.querySelector(".swiper-button-next"),
                    prevEl: el.querySelector(".swiper-button-prev"),
                },
                pagination: {
                    el: el.querySelector(".swiper-pagination"),
                    clickable: true,
                }
            });
        });
    });
</script>
