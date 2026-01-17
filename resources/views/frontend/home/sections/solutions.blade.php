@if ($solutions)

    @push('styles')
        <style>
            .solution-card:hover {
                transform: translateY(-4px);
                transition: all 0.3s ease;
            }

            .solution-card img {
                border-radius: .5rem .5rem 0 0;
            }
        </style>
    @endpush

    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-theme">Our Solutions</h2>
                <p class="text-muted">Explore our key technology and infrastructure solutions.</p>
            </div>

            <div class="swiper solutionsSwiper">
                <div class="swiper-wrapper">
                    @foreach ($solutions as $solution)
                        <div class="swiper-slide">
                            <div class="card h-100 border-0 shadow-sm solution-card">
                                <div class="ratio ratio-16x9" style="aspect-ratio: unset;">
                                    <img src="{{ asset('storage/' . $solution->image) }}"
                                        class="card-img-top object-fit-cover" alt="{{ $solution->title }}">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title text-theme">{{ $solution->title }}</h5>
                                    <p class="small text-muted">{!! Str::limit(strip_tags($solution->short_description), 100) !!}</p>
                                    <a href="{{ route('solutions.show', $solution->slug) }}"
                                        class="btn btn-outline-theme btn-sm mt-2">
                                        Learn More
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation Buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                new Swiper(".solutionsSwiper", {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 4000,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1
                        },
                        768: {
                            slidesPerView: 2
                        },
                        1024: {
                            slidesPerView: 3
                        },
                    },
                });
            });
        </script>
    @endpush
@endif
