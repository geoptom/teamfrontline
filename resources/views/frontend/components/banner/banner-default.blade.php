
@push('styles')
<style>
.slider-caption,
#hero-wrapper .hero-style1 {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
    margin-bottom: 0 !important;
}
/* ===========================
   HERO SLIDER HEIGHTS
=========================== */
#hero-wrapper .hero-swiper {
    width: 100%;
    height: 600px;
    position: relative;
    overflow: hidden;
}

@media (max-width: 1200px) {
    #hero-wrapper .hero-swiper {
        height: 550px;
    }
}

@media (max-width: 992px) {
    #hero-wrapper .hero-swiper {
        height: 500px;
    }
}

@media (max-width: 768px) {
    #hero-wrapper .hero-swiper {
        height: 70vh;
        min-height: 380px;
    }
}

/* Swiper slide */
#hero-wrapper .swiper-slide {
    position: relative;
    background-size: cover;
    background-position: center;
}

/* Background image */
#hero-wrapper .hero-img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: fill;
    object-position: center;
}

/* Dark overlay - more visible on mobile */
#hero-wrapper .swiper-slide::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(246, 104, 104, 0.3);
    /* background: rgba(247, 173, 215, 0.3); */
    /* background: rgba(0, 0, 0, 0.33); */
    z-index: 1;
}

/* Flex container for slide alignment */
#hero-wrapper .hero-slide-inner {
    position: absolute;
    inset: 0;
    z-index: 2;
    display: flex;
    align-items: flex-end;
    justify-content: flex-start;
    padding: 60px 80px 80px 80px;
    box-sizing: border-box;
}

@media (max-width: 1200px) {
    #hero-wrapper .hero-slide-inner {
        padding: 50px 60px 70px 60px;
    }
}

@media (max-width: 992px) {
    #hero-wrapper .hero-slide-inner {
        padding: 40px 50px 60px 50px;
    }
}

@media (max-width: 768px) {
    #hero-wrapper .hero-slide-inner {
        padding: 30px;
        align-items: center;
        justify-content: center;
    }
}

/* Text content */
#hero-wrapper .hero-caption {
    position: relative;
    z-index: 2;
    max-width: 550px;
    color: #fff;
    word-wrap: break-word;
}

#hero-wrapper .hero-caption h2 {
    font-size: 42px;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 15px;
    margin-top: 0;
}

#hero-wrapper .hero-caption h3 {
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 15px;
    margin-top: 0;
    opacity: 0.95;
}

#hero-wrapper .hero-caption p {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 20px;
    margin-top: 0;
    opacity: 0.9;
}

@media (max-width: 1200px) {
    #hero-wrapper .hero-caption h2 {
        font-size: 36px;
    }

    #hero-wrapper .hero-caption h3 {
        font-size: 16px;
    }

    #hero-wrapper .hero-caption p {
        font-size: 14px;
    }
}

@media (max-width: 992px) {
    #hero-wrapper .hero-caption h2 {
        font-size: 32px;
    }

    #hero-wrapper .hero-caption h3 {
        font-size: 14px;
    }

    #hero-wrapper .hero-caption p {
        font-size: 13px;
    }
}

/* Button */
#hero-wrapper .hero-btn {
    padding: 12px 30px;
    border-radius: 30px;
    background: #fff;
    color: #000;
    display: inline-block;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

#hero-wrapper .hero-btn:hover {
    background: rgba(255, 255, 255, 0.9);
    transform: translateY(-2px);
}

/* DESKTOP & TABLET: Show text and button */
@media (max-width: 767px) {
    #hero-wrapper .hero-caption {
        display: none !important;
    }

    #hero-wrapper .hero-caption h2 {
        font-size: 28px;
    }

    #hero-wrapper .hero-caption h3 {
        font-size: 18px;
    }

    #hero-wrapper .hero-caption p {
        font-size: 14px;
    }
}

/* ===========================
   OVERLAPPING CONTENT
=========================== */

/* Wrap */
#hero-wrapper .hero-overlap-boxes {
    position: relative;
    z-index: 10;
    margin-top: -90px; /* The overlap */
}

@media (max-width: 767px) {
    #hero-wrapper .hero-overlap-boxes {
        margin-top: 0; /* No overlap in mobile */
    }
}

/* Gray card */
#hero-wrapper .overlap-box {
    background: #f7f7f7;
    border-radius: 20px;
    padding: 30px;
}

#hero-wrapper .overlap-img img {
    width: 100%;
    border-radius: 20px;
    object-fit: cover;
}


    .slider-caption {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        margin-bottom: 0 !important;
    }
/* Force remove all padding/margin from .hero-style1 inside slider */
#hero-wrapper .hero-style1 {
    padding: 0 !important;
    margin: 0 !important;
}

.hero-title {
    /* color: var(--theme-color) !important; */
    color: #ffdff14d !important;
    /* color: #ffdff17d !important; */
    /* color: #987f2ad1 !important; */
    /* color: var(--smoke-color2) !important; */
}

.hero-style1 .hero-title {
    /* font-weight: 300 !important; */
}
</style>
@endpush



@php $sliders = json_decode($settings['sliders']['homepage'] ?? '[]', true); @endphp

<div id="hero-wrapper">

    <!-- HERO SLIDER -->
    <div class="swiper hero-swiper">
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
                    <!-- RESPONSIVE IMAGE -->
                    <picture>
                        <source media="(min-width: 992px)" srcset="{{ asset($desktop) }}">
                        <source media="(min-width: 768px)" srcset="{{ asset($tablet) }}">
                        <img src="{{ asset($mobile) }}" class="hero-img" alt="{{ $slider['title'] ?? 'Slider' }}">
                    </picture>

                    <!-- DESKTOP/TABLET CAPTION -->
                    <div class="hero-slide-inner" style="display: flex; align-items: center; justify-content: flex-start; height: 100%; width: 100%; padding-top: 0;">
                        <div class="hero-style1 d-none d-md-block">
                            @if (!empty($slider['title']))
                                <span class="sub-title">{!! $slider['title'] !!}</span>
                            @endif
                            @if (!empty($slider['sub_title']))
                                <h1 class="hero-title">{!! $slider['sub_title'] !!}</h1>
                            @endif
                            @if (!empty($slider['btn_text']))
                                <div class="btn-group">
                                    <a href="{{ $slider['btn_link'] ?? '#' }}" class="th-btn">{!! $slider['btn_text'] !!}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Uncomment to enable navigation --}}
        {{-- <div class="swiper-button-prev hero-nav"></div>
        <div class="swiper-button-next hero-nav"></div>
        <div class="swiper-pagination"></div> --}}
    </div>

    <!-- OVERLAP CONTENT -->
    {{-- <div class="hero-overlap-boxes">
        <div class="container">
            <div class="row gy-4">

                <div class="col-xl-5 col-lg-4 col-md-4 d-none d-md-block">
                    <div class="overlap-img">
                        <img src="{{ asset('assets/img/frontline/ups-server.jpg') }}" alt="">
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="overlap-box">
                        <h3>Affordable Solutions</h3>
                        <p>
                           Experience reliable and cost-effective energy options tailored for your needs. Our services help you save on utility bills while supporting a sustainable future.
                        </p>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 d-none d-md-block">
                    <div class="overlap-img">
                        <img src="{{ asset('assets/img/frontline/router-cctv-camera.jpg') }}" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div> --}}

</div>


@push('scripts')
<script>
new Swiper(".hero-swiper", {
    loop: true,
    effect: "fade",
    autoplay: {
        delay: 4500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    }
});

</script>
@endpush
