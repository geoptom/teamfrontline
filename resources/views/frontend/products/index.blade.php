@extends('frontend.layouts.master')
@section('title', 'Products - ' . setting('site_title'))

@push('styles')
    <style>
        /* mobile sidebar */
        #mobile-sidebar {
            display: block;
            position: fixed;
            top: 0;
            left: -100%;
            width: 80%;
            height: 100vh;
            background: #fff;
            z-index: 1050;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.18);
            overflow-y: auto;
            transition: left 0.32s ease;
            padding-bottom: 2rem;
        }

        #mobile-sidebar.show {
            left: 0;
        }

        body.sidebar-open {
            overflow: hidden;
        }
    </style>
@endpush

@section('content')
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Our Products</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Products</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__product_area py-5">
        <div class="container">
            <div class="row">
                <!-- Desktop Sidebar -->
                <div class="col-lg-3 mb-4 mb-lg-0 d-none d-lg-block">
                    <div class="card border-0 shadow-sm sticky-top p-3 bg-light"
                        style="top: 90px; border-radius: 1rem; max-height: calc(100vh - 120px); overflow-y: auto;">
                        <form id="filter-form" class="filter-form">
                            @include('frontend.products.partials.filter-form')
                        </form>
                    </div>
                </div>

                <!-- Mobile Filter Button -->
                <div class="col-12 mb-3 d-lg-none text-end">
                    <button class="btn btn-primary rounded-pill px-4" id="mobile-filter-toggle">
                        <i class="bi bi-funnel"></i> Filter
                    </button>
                </div>

                <!-- Product List -->
                <div class="col-lg-9">
                    <div id="product-list" class="row g-4"></div>

                    <div id="loading-indicator" class="text-center my-4" style="display:none;">
                        <div class="spinner-border text-primary" role="status"></div>
                        <div class="mt-2 text-muted small">Loading more products...</div>
                    </div>

                    <div id="no-more" class="text-center text-muted my-3" style="display:none;">
                        — No more products to show —
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile Sidebar Filter -->
    <div class="sidebar-filter p-4" id="mobile-sidebar">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold text-primary mb-0">Filter Products</h5>
            <button class="btn btn-sm btn-outline-primary" id="mobile-filter-close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <form id="filter-form-mobile" class="filter-form">
            @include('frontend.products.partials.filter-form')
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const mobileSidebar = $('#mobile-sidebar');
            const productList = $('#product-list');
            const loadingBox = $('#loading-indicator');
            const noMoreBox = $('#no-more');

            let page = 1;
            let loading = false;
            let reachedEnd = false;

            /* -----------------------------
               Helper: Get Active Filter Form
            --------------------------------*/
            const getActiveForm = () =>
                $('#filter-form:visible').length ? $('#filter-form') :
                $('#filter-form-mobile:visible').length ? $('#filter-form-mobile') :
                $('#filter-form');

            /* -----------------------------
               Helper: Serialize Filter Params
            --------------------------------*/
            const getFilterParams = () => getActiveForm().serialize();

            /* -----------------------------
               Update Browser URL
            --------------------------------*/
            const updateURL = () => {
                const query = getFilterParams();
                const url = query ? `{{ route('products.index') }}?${query}` : `{{ route('products.index') }}`;
                history.replaceState({}, '', url);
            };

            /* -----------------------------
               Load Products (Core function)
            --------------------------------*/
            const loadProducts = async (reset = false) => {
                if (loading) return;

                if (reset) {
                    page = 1;
                    reachedEnd = false; // FIXED
                    productList.html('');
                    noMoreBox.hide();
                }

                if (reachedEnd) return;

                loading = true;
                loadingBox.show();

                const query = getFilterParams();
                const url = `{{ route('products.filter') }}?page=${page}&${query}`;

                try {
                    const html = await $.get(url);

                    if (!html.trim()) {

                        // FIX: if it's a filter refresh, DO NOT end infinite scroll
                        if (reset) {
                            productList.html(
                                '<div class="text-center text-muted py-5">No products found.</div>');
                            reachedEnd = false; // IMPORTANT FIX
                        } else {
                            reachedEnd = true;
                            noMoreBox.show();
                        }

                        updateURL();
                        loading = false;
                        loadingBox.hide();
                        return;
                    }

                    // Append results
                    productList.append(html);
                    page++;
                    updateURL();

                } catch (err) {
                    console.error('Product loading error', err);
                }

                loading = false;
                loadingBox.hide();
            };


            /* -----------------------------
                 Scroll-based Infinite Load
               (Debounced + Safe)
            --------------------------------*/
            let scrollTimeout;
            $(window).on('scroll', () => {
                if (scrollTimeout) return;
                scrollTimeout = setTimeout(() => {
                    scrollTimeout = null;
                    const nearBottom = $(window).scrollTop() + $(window).height() >= $(document)
                        .height() - 250;
                    if (nearBottom) loadProducts();
                }, 120);
            });

            /* -----------------------------
                 Mobile Sidebar Controls
            --------------------------------*/
            $('#mobile-filter-toggle').on('click', e => {
                e.stopPropagation();
                mobileSidebar.addClass('show');
                $('body').addClass('sidebar-open');
            });

            $('#mobile-filter-close').on('click', () => {
                mobileSidebar.removeClass('show');
                $('body').removeClass('sidebar-open');
            });

            $(document).on('click', e => {
                if (!$(e.target).closest('#mobile-sidebar, #mobile-filter-toggle').length) {
                    mobileSidebar.removeClass('show');
                    $('body').removeClass('sidebar-open');
                }
            });

            /* -----------------------------
                 Bind filter changes
            --------------------------------*/
            $(document).on('input change', '.filter-form input, .filter-form select', () => {
                loadProducts(true);
            });

            $('#reset-filters').on('click', () => {
                $('.filter-form').each(function() {
                    this.reset();
                });
                loadProducts(true);
            });

            /* -----------------------------
                 Prefill From URL (Back button support)
            --------------------------------*/
            const params = new URLSearchParams(location.search);
            params.forEach((val, key) => {
                $(`[name="${key}"]`).val(val);
            });

            /* -----------------------------
                 Initial Load
            --------------------------------*/
            loadProducts(true);
        });
    </script>
@endpush
