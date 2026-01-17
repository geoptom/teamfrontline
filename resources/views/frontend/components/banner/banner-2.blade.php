    <style>
        //* Swiper slide styling */
        .mySwiper .swiper-slide {
            position: relative;
            background-size: cover;
            background-position: center center;
            min-height: 500px;
            display: flex !important;
            align-items: center;
        }

        /* Dark translucent overlay covering whole slide */
        .mySwiper .slide-overlay1 {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        /* Slide content above overlay */
        .mySwiper .slide-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1140px;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #f8f9fa;
            gap: 2rem;
        }

        /* Text content */
        .mySwiper .text-content h2 {
            font-weight: 700;
            font-size: 2.5rem;
        }

        .mySwiper .text-content p.lead {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #f8f9fa !important;
        }

        /* Product image box - right side */
        .mySwiper .image-box {
            background-color: #fff;
            border-radius: 0.75rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 350px;
            max-width: 50%;
            flex: 0 0 50%;
        }

        .mySwiper .image-box img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        /* Left side image without box */
        .mySwiper .image-left {
            background: transparent !important;
            box-shadow: none !important;
            padding: 0 !important;
            height: 350px;
            max-width: 50%;
            flex: 0 0 50%;
        }

        .mySwiper .image-left img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        /* Add top padding to prevent overlap with fixed menu */
        .full-width-slider,
        .full-width-banner {
            padding-top: 70px;
            /* Adjust to your menu height */
        }

        .full-width-banner {
            background-image: url('{{ asset('assets/img/frontline/network-solutions-slider.jpg') }}');
            background-size: cover;
            /* Cover whole area */
            background-repeat: no-repeat;
            background-position: center center;
            width: 100vw;
            /* Full viewport width */
            margin-left: calc(-50vw + 50%);
            /* Aligns container correctly */
            overflow: hidden;
            position: relative;
            color: white;
        }

        /* Dark overlay */
        .slide-overlay1 {
            /* position: absolute; */
            /* inset: 0; */
            background-color: rgba(0, 0, 0, 0.75);
            /* z-index: 1; */
        }

        /* Slide content above overlay */
        .slide-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1140px;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #f8f9fa;
            gap: 2rem;
        }


        /* Responsive */
        @media (max-width: 767.98px) {
            .mySwiper .slide-content {
                flex-direction: column;
                text-align: center;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .mySwiper .image-box,
            .mySwiper .image-left,
            .mySwiper .text-content {
                max-width: 100%;
                flex: none;
            }

            /* Smaller height for images on mobile */
            .mySwiper .image-box,
            .mySwiper .image-left {
                height: 220px !important;
                margin-bottom: 1rem;
                height: 140px !important;
            }

            .mySwiper .text-content {
                width: 100%;
                margin-bottom: 1.5rem;
            }

            /* Hide description paragraph on mobile */
            .mySwiper .text-content p.lead {
                font-size: 0.85rem !important;
            }

            /* Smaller font sizes on mobile */
            .mySwiper .text-content h2 {
                font-size: 1.5rem;
            }

            /* Smaller buttons on mobile */
            .mySwiper .text-content a.btn {
                padding: 0.375rem 1rem;
                font-size: 0.875rem;
            }
        }
    </style>

    <!-- Swiper CSS -->

    <section class="full-width-banner text-white d-flex align-items-center " style="min-height: 400px;">
        <div class="swiper myBannerSwiper slide-overlay1" style="min-height: 400px;">
            <div class="swiper-wrapper">

                @foreach ($featuredProducts as $product)
                    <div class="swiper-slide">
                        <div class="row align-items-center rounded p-4 shadow-sm" style="min-height: 400px;">
                            <!-- Image column -->
                            <div class="col-md-6 mb-4 mb-md-0 d-flex justify-content-center align-items-center">
                                <div class="image-box bg-white rounded shadow p-4"
                                    style="">
                                    <img src="{{ getImageUrl($product->mainImage()) }}" alt="{{ $product->name }}"
                                        class="img-fluid" >
                                </div>
                            </div>

                            <!-- Text column -->
                            <div class="col-md-6">
                                <h2 class="display-5 fw-bold text-smoke">{{ $product->name }}</h2>
                                <p class="lead text-smoke2">{{ Str::limit($product->short_description, 120) }}</p>
                                {{-- <a href="{{ route('products.show', $product->slug) }}"
                                    class="btn btn-lg btn-outline-primary rounded-pill px-4">Shop Now</a> --}}

                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="btn  btn-theme btn-outline-theme btn-lg  rounded-pill px-4">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Navigation arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Pagination dots -->
            {{-- <div class="swiper-pagination"></div> --}}
        </div>
    </section>

    <!-- Include Swiper JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.myBannerSwiper', {
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoHeight: true, // disables dynamic height
            });
        });
    </script>
