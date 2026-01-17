    <section class="container my-5">
        <div class="row align-items-center bg-light rounded p-4 shadow-sm">
            <!-- Left: Product Image -->
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ getImageUrl($featuredProduct->thumb_image) }}" alt="{{ $featuredProduct->name }}"
                    class="img-fluid rounded shadow" style="max-height: 400px; object-fit: cover; width: 100%;">
            </div>

            <!-- Right: Text & CTA -->
            <div class="col-md-6">
                <h2 class="display-5 fw-bold">{{ $featuredProduct->name }}</h2>
                <p class="lead text-secondary">
                    {{ Str::limit($featuredProduct->description, 120) }}
                </p>
                <p class="fs-4 text-primary fw-semibold">₹{{ number_format($featuredProduct->price, 2) }}</p>
                <a href="{{ route('products.show', $featuredProduct->slug) }}"
                    class="btn btn-lg btn-outline-primary rounded-pill px-4">
                    Shop Now
                </a>
            </div>
        </div>
    </section>
