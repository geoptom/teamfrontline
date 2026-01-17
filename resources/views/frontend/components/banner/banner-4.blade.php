    <div class="swiper myProductSwiper">
        <div class="swiper-wrapper">
            @foreach ($featuredProducts as $product)
                <div class="swiper-slide card shadow-sm p-2" style="border-radius:0.75rem;">
                    <img src="{{ getImageUrl($product->thumb_image) }}" alt="{{ $product->name }}"
                        class="card-img-top rounded" style="height:180px; object-fit:cover;">
                    <div class="card-body text-center p-2">
                        <h6 class="card-title text-truncate" title="{{ $product->name }}">{{ $product->name }}</h6>
                        <p class="text-primary fw-semibold my-1">₹{{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product->slug) }}"
                            class="btn btn-sm btn-outline-primary">View
                            Details</a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Pagination dots -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Include Swiper JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.myProductSwiper', {
                slidesPerView: 4,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                    640: {
                        slidesPerView: 2
                    },
                    992: {
                        slidesPerView: 3
                    },
                    1200: {
                        slidesPerView: 4
                    },
                },
            });
        });
    </script>
