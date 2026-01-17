@elseif($banner == '5')
    <!-- Slider container -->
    <div class="swiper myProductSwiper">
        <div class="swiper-wrapper">
            @foreach ($featuredProducts as $product)
                <div class="swiper-slide card">
                    <img src="{{ getImageUrl($product->thumb_image) }}" alt="{{ $product->name }}"
                        class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">₹{{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary">View
                            Details</a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script>
        var swiper = new Swiper('.myProductSwiper', {
            slidesPerView: 4,
            spaceBetween: 20,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                },
            }
        });
    </script>
