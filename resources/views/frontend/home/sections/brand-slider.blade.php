{{-- <section id="wsus__brand_sleder" class="brand_slider_2">
    <div class="container">
        <div class="brand_border">
            <div class="row brand_slider">
                @foreach ($brands as $brand)
                <div class="col-xl-2">
                    <div class="wsus__brand_logo">
                        <img src="{{asset($brand->logo)}}" alt="{{$brand->name}}" class="img-fluid w-100">
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section> --}}


{{-- @php
    $brands = \App\Models\Brand::where('status', 1)->where('logo', '<>', '')->get();
@endphp

<div class="brand-area overflow-hidden">
    <div class="container th-container">
        <div class="slider-area text-center">
            <div class="swiper th-slider" id="brandSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"476":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}'>
                <div class="swiper-wrapper">

                    @foreach ($brands as $brand)
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#">
                                    <img class="original" src="{{ asset("storage/".$brand->logo) }}"
                                        alt="{{ asset($brand->name) }}" style="height: 50px">
                                    <img class="gray" src="{{ asset("storage/".$brand->logo) }}" alt="{{ asset($brand->name) }}"
                                        style="height: 50px">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> --}}
@php
    $brands = \App\Models\Brand::where('status', 1)->where('logo', '<>', '')->get();
@endphp

<div class="brand-area overflow-hidden">
    <div class="container th-container">
        <div class="slider-area text-center">
            <div class="swiper1 th-slider custom-swiper " id="brandSlider1"
                {{-- data-slider-options='{
                    "loop": true,
                    "autoplay": { "delay": 2000, "disableOnInteraction": false },
                    "speed": 400,
                    "breakpoints": {"0":{"slidesPerView":1},"476":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}
                }' --}}
                {{-- data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"476":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}, "loop": true, "autoplay": { "delay": 1000, "disableOnInteraction": false }}' --}}>
                <div class="swiper-wrapper">
                    @foreach ($brands as $brand)
                        <div class="swiper-slide">
                            <div class="brand-item style2">
                                <a href="#">
                                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}"
                                        class="brand-logo " style="height: 50px">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@push('styles')
    <style>
        .brand-item .brand-logo {
            height: 50px;
            width: auto;
            filter: grayscale(100%);
            opacity: 0.6;
            transition: all 0.4s ease;
        }

        .brand-item:hover .brand-logo {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.05);
        }

        .brand-item .brand-logo {
            filter: grayscale(100%) drop-shadow(0 0 1px rgba(0, 0, 0, 0.1));
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new Swiper("#brandSlider1", {
                    "loop": true,
                    "autoplay": { "delay": 2000, "disableOnInteraction": false },
                    "speed": 400,
                    "breakpoints": {"0":{"slidesPerView":1},"476":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}
                });
        });

        // new Swiper(".brand_slider", {
        //     // slidesPerView: 6,
        //     // spaceBetween: 20,
        //     loop: true,
        //     speed: 800,
        //     autoplay: {
        //         delay: 1000,
        //         disableOnInteraction: false,
        //     },
        //     navigation: {
        //         nextEl: ".brand-next",
        //         prevEl: ".brand-prev",
        //     },
        //     breakpoints: {
        //         1200: {
        //             slidesPerView: 5
        //         },
        //         992: {
        //             slidesPerView: 4
        //         },
        //         768: {
        //             slidesPerView: 3
        //         },
        //         576: {
        //             slidesPerView: 2
        //         },
        //         0: {
        //             slidesPerView: 1
        //         }
        //     }
        // });
    </script>
@endpush
