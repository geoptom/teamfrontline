{{-- @php
    // $popularCategories = json_decode($popularCategory->value, true);
    // dd($popularCategories)
    $popularCategories = ['1'];
@endphp
<section id="wsus__monthly_top" class="wsus__monthly_top_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                @if (isset($settings['homepage_banner_one']))
                    @php
                        $homepage_banner_one = json_decode($settings['homepage_banner_one'], true);
                    @endphp
                    @if (isset($homepage_banner_one['banner_one']) && $homepage_banner_one['banner_one']['status'] == 1)
                        <div class="wsus__monthly_top_banner">
                            <a href="{{ $homepage_banner_one['banner_one']['banner_url'] }}">
                                <img class="img-fluid"
                                    src="{{ asset($homepage_banner_one['banner_one']['banner_image']) }}" alt="">
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header for_md">
                    <h3>Popular Categories</h3>
                    <div class="monthly_top_filter">

                        @php
                            $products = [];
                        @endphp
                        @foreach ($popularCategories as $key => $popularCategory)
                            @php
                                $lastKey = [];

                                // foreach($popularCategory as $key => $category){
                                //     if($category === null ){
                                //         break;
                                //     }
                                //     $lastKey = [$key => $category];
                                // }
                                $lastKey['category'] = 1;

                                $category = \App\Models\Category::find($lastKey['category']);
                                $products[] = \App\Models\Product::with([
                                    'variants',
                                    'category',
                                    'images',
                                ])
                                    ->where('category_id', $category->id)
                                    ->orderBy('id', 'DESC')
                                    ->take(12)
                                    ->get();

                            @endphp
                            <button class="{{ $loop->index === 0 ? 'auto_click active' : '' }}"
                                data-filter=".category-{{ $loop->index }}">{{ $category->name }}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="row grid">
                    @foreach ($products as $key => $product)
                        @foreach ($product as $item)
                            <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3  category-{{ $key }}">
                                <a class="wsus__hot_deals__single" href="{{ route('products.show', $item->slug) }}">
                                    <div class="wsus__hot_deals__single_img">
                                        <img src="{{ asset($item->thumb_image) }}" alt="bag"
                                            class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__hot_deals__single_text">
                                        <h5>{!! limitText($item->name) !!}</h5>
                                        <p class="wsus__rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $item->reviews_avg_rating)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor

                                        </p>
                                        @if (checkDiscount($item))
                                            <p class="wsus__tk">{{ $settings['currency_icon'] ?? '₹' }}{{ $item->offer_price }}
                                                <del>{{ $settings['currency_icon'] ?? '₹' }}{{ $item->price }}</del></p>
                                        @else
                                            <p class="wsus__tk">{{ $settings['currency_icon'] ?? '₹' }}{{ $item->price }}</p>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section> --}}

{{-- separate category wise slider --}}
{{-- <section class="top-category-products py-5">
    <div class="container">
        <h4 class="fw-bold mb-4 text-theme">Top Categories</h4>

        @foreach ($topCategories as $category)
            <div class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-semibold mb-0">{{ $category->name }}</h5>
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="btn btn-sm btn-outline-theme rounded-pill">
                        View All
                    </a>
                </div>

                <div class="swiper category-products-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($category->products as $product)
                            <div class="swiper-slide">
                                <div class="product-card p-3 bg-white rounded-4 h-100 text-center">
                                    <div class="ratio ratio-1x1 mb-3">
                                        <img src="{{ $product->thumb_image ? asset($product->thumb_image) : asset('assets/img/shape/no-image.png') }}"
                                             alt="{{ $product->name }}" class="object-fit-cover rounded-4 w-100 h-100">
                                    </div>
                                    <h6 class="fw-semibold mb-1 text-truncate">
                                        <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none">
                                            {{ $product->name }}
                                        </a>
                                    </h6>
                                    <div class="fw-bold text-theme">₹{{ number_format($product->price) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        @endforeach
    </div>
</section> --}}


{{-- grid with 3 rows with category buttons on top like All, Category 1, 2 3 --}}
@if ($topCategories)

<section class="top-category-products py-5">
    <div class="container">
        <h4 class="fw-bold mb-4 text-theme">Top Categories</h4>

        <!-- Category Buttons -->
        <div class="mb-4 d-flex flex-wrap gap-2">
            <button class="btn btn-sm btn-outline-theme active" data-category="all">All</button>
            @foreach ($topCategories as $category)
                <button class="btn btn-sm btn-outline-theme" data-category="{{ $category->id }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        <!-- Products Grid -->
        <div class="row g-4" id="category-products-grid">
            @foreach ($topCategories as $category)
                @foreach ($category->products as $index => $product)
                    <div class="col-md-4 product-item" data-category="{{ $category->id }}"
                         @if($index >= 9) style="display:none" @endif>
                        <div class="card p-3 h-100 rounded-4 text-center product-card">
                            <div class="ratio ratio-1x1 mb-3">
                                <img src="{{ $product->thumb_image ? asset($product->thumb_image) : asset('assets/img/shape/no-image.png') }}"
                                    alt="{{ $product->name }}" class="object-fit-cover rounded-4 w-100 h-100">
                            </div>
                            <h6 class="fw-semibold mb-1 text-truncate">
                                <a href="{{ route('products.show', $product->slug) }}" class="">
                                    {{ $product->name }}
                                </a>
                            </h6>
                            <div class="fw-bold text-theme">₹{{ number_format($product->price) }}</div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>

        <!-- View More Button -->
        <div class="text-center mt-3">
            <button id="view-more-btn" class="btn btn-sm btn-outline-theme">View More</button>
        </div>
    </div>
</section>


<script>
document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.top-category-products .btn-outline-theme');
    const items = document.querySelectorAll('.top-category-products .product-item');
    const viewMoreBtn = document.getElementById('view-more-btn');
    let showingAll = false;

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Reset "View More" state
            showingAll = false;
            viewMoreBtn.textContent = 'View More';

            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const categoryId = btn.getAttribute('data-category');

            let visibleCount = 0;

            items.forEach(item => {
                if (categoryId === 'all' || item.getAttribute('data-category') === categoryId) {
                    visibleCount++;
                    item.style.display = visibleCount <= 9 ? 'block' : 'none';
                } else {
                    item.style.display = 'none';
                }
            });

            viewMoreBtn.style.display = visibleCount > 9 ? 'inline-block' : 'none';
        });
    });

    viewMoreBtn.addEventListener('click', () => {
        const activeBtn = document.querySelector('.top-category-products .btn-outline-theme.active');
        const categoryId = activeBtn.getAttribute('data-category');
        showingAll = !showingAll;

        let visibleCount = 0;
        items.forEach(item => {
            if (categoryId === 'all' || item.getAttribute('data-category') === categoryId) {
                if (showingAll) {
                    item.style.display = 'block';
                } else {
                    visibleCount++;
                    item.style.display = visibleCount <= 9 ? 'block' : 'none';
                }
            }
        });

        viewMoreBtn.textContent = showingAll ? 'Show Less' : 'View More';
    });
});
</script>


@endif
