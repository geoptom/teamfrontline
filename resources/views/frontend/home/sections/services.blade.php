{{-- <section id="wsus__home_services" class="home_service_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-lg-3 pe-lg-0">
                <div class="wsus__home_services_single home_service_single_2 border_left">
                    <i class="fal fa-truck"></i>
                    <h5>Free Worldwide Shipping</h5>
                    <p>Free shipping coast for all country</p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-lg-3 pe-lg-0">
                <div class="wsus__home_services_single home_service_single_2">
                    <i class="fal fa-headset"></i>
                    <h5>24/7 Customer Support</h5>
                    <p>Friendly 24/7 customer support</p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-lg-3 pe-lg-0">
                <div class="wsus__home_services_single home_service_single_2">
                    <i class="far fa-exchange-alt"></i>
                    <h5>Money Back Guarantee</h5>
                    <p>We return money within 30 days</p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-lg-3">
                <div class="wsus__home_services_single home_service_single_2">
                    <i class="fal fa-credit-card"></i>
                    <h5>Secure Online Payment</h5>
                    <p>We posess SSL / Secure Certificate</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- <section class="py-12 bg-gray-100">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Our Services</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($services as $service)
                    <div class="swiper-slide">
                        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                            <img src="{{ asset('storage/' . $service->image) }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">{{ $service->title }}</h3>
                                <p class="text-gray-600 text-sm">{{ Str::limit($service->short_description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}

{{-- <section class="overflow-hidden space" data-bg-src="assets/img/bg/service_bg_1.jpg">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-center">
            <div class="col-lg-9">
                <div class="title-area text-center text-lg-start"><span class="sub-title">Our Services</span>
                    <h2 class="sec-title">Comprehensive IT & Power Services</h2>
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
                    @foreach ($services as $service)
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-overlay" data-bg-src="{{ asset('storage/' . $service->image) }}">
                                </div>
                                <div class="box-content">
                                    <div class="box-icon"><img src="assets/img/icon/service_1_1.svg" alt="Icon">
                                    </div>
                                    <div class="box-img" data-mask-src="assets/img/shape/ser-shape.png"><img
                                            src="{{ asset('storage/' . $service->image) }}" alt="img"></div>
                                    <h3 class="box-title"><a href="{{route('services.show', $service->slug)}}">{{ $service->title }}</a>
                                    </h3>
                                    <p class="box-text">{{ $service->short_description }}</p>
                                    <a href="{{ route('services.show', $service->slug) }}"
                                        class="th-btn border-btn th-icon fw-medium text-uppercase"><span
                                            class="btn-text" data-back="Vew Details" data-front="Vew Details"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> --}}


<section class="project-area bg-white position-relative space" id="project-sec"
    data-bg-src="assets/img/bg/project_bg_1.jpg">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-center">
            <div class="col-lg-9">
                <div class="title-area text-center text-lg-start"><span class="sub-title">Our Core Services</span>
                    <h2 class="sec-title text-white">Comprehensive IT & Power Services</h2>
                    <p class="text-light">From infrastructure design to system integration — we provide end-to-end services that keep your operations running efficiently.</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="sec-btn"><a href="{{route('services.index')}}" class="th-btn style1 th-icon"><span class="btn-text"
                            data-back="View All Services" data-front="View All Services"></span><i
                            class="fa-regular fa-arrow-right ms-2"></i></a></div>
            </div>
        </div>
        <div class="line-bottom"></div>
        <div class="project-box-static-wrap">

            @foreach ($services as $service)
                <div class="project-box-static" data-bg-src="assets/img/bg/project_bg_1.jpg">
                    <div class="project-box">
                        <div class="project-box-img"><img src="{{ asset('storage/' . $service->image) }}"
                                alt="img"></div>
                        <div class="project-box-details">
                            <h3 class="box-title"><a
                                    href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></h3>
                            <p class="box-text">{{ $service->short_description }}</p>
                            {{-- <div class="counter-grid_wrapp">
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
                        </div> --}}
                            <div class="mt-50"><a href="{{ route('services.show', $service->slug) }}"
                                    class="th-btn border-btn th-icon"><span class="btn-text" data-back="View Details"
                                        data-front="View Details"></span><i
                                        class="fa-regular fa-arrow-right ms-2"></i></a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
