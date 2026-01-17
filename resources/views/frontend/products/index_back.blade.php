@extends('frontend.layouts.master')
@section('title', 'Products - ' . setting('site_title'))

@section('content')
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>Our Products</h4>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__product_area py-5">
        <div class="container">

            <!-- Filter Button (Mobile) -->
            <button class="btn btn-primary d-lg-none position-fixed rounded-pill shadow" id="mobile-filter-toggle"
                style="bottom: 20px; right: 20px; z-index: 1051;">
                <i class="bi bi-funnel-fill me-1"></i> Filters
            </button>

            <div class="row">
                <!-- Sidebar (Desktop) -->
                <div class="col-lg-3 mb-4 mb-lg-0 d-none d-lg-block">
                    <div id="filterSidebar" class="card border-0 shadow-sm sticky-top p-3"
                        style="top: 90px; border-radius: 1rem; max-height: calc(100vh - 120px); overflow-y: auto;">
                        @include('frontend.products.partials.filter-form')
                    </div>
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

    <!-- Mobile Sidebar -->
    <div class="sidebar-filter p-4" id="mobile-sidebar">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold text-primary mb-0">Filter Products</h5>
            <button class="btn btn-sm btn-outline-primary" id="mobile-filter-close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        @include('frontend.products.partials.filter-form')
    </div>
@endsection

@push('styles')
    <style>
        /* Breadcrumb */
        #wsus__breadcrumb {
            background: #f8f9fa;
            padding: 40px 0;
        }

        #wsus__breadcrumb h4 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        #wsus__breadcrumb ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #wsus__breadcrumb ul li {
            display: inline;
            color: #6c757d;
        }

        #wsus__breadcrumb ul li a {
            color: var(--bs-primary);
            text-decoration: none;
        }

        /* Product cards */
        .product-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 1rem;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .product-img {
            height: 220px;
            object-fit: contain;
            background: #f9f9f9;
        }

        /* Mobile Sidebar */
        #mobile-sidebar {
            display: none;
        }

        @media (max-width: 991px) {
            #mobile-sidebar {
                display: block;
                position: fixed;
                top: 0;
                left: -100%;
                width: 80%;
                height: 100vh;
                background: #fff;
                z-index: 1050;
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
                overflow-y: auto;
                transition: left 0.3s ease;
            }

            #mobile-sidebar.show {
                left: 0;
            }

            body.sidebar-open {
                overflow: hidden;
            }

            #mobile-filter-toggle {
                animation: float 2s infinite ease-in-out;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-5px);
                }
            }
        }

        /* Mobile filter drawer */
        #filterSidebar {
            transition: transform 0.3s ease;
        }

        @media (max-width: 767px) {
            #filterSidebar {
                position: fixed;
                top: 0;
                left: 0;
                width: 80%;
                height: 100%;
                background: #fff;
                z-index: 1050;
                padding: 1rem;
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
                transform: translateX(-100%);
            }

            #filterSidebar.active {
                transform: translateX(0);
            }

            body.filter-open {
                overflow: hidden;
            }
        }

        /* Product image box */
        .product-card img {
            width: 100%;
            height: 220px;
            object-fit: contain;
            background-color: #f9f9f9;
            border-bottom: 1px solid #eee;
        }

        .product-card {
            transition: all 0.3s ease;
            border: 1px solid #eee;
            border-radius: 10px;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* Scrollbar style */
        #filterSidebar::-webkit-scrollbar {
            width: 6px;
        }

        #filterSidebar::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 3px;
        }
    </style>
@endpush

@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        #product-list {
            opacity: 1;
            transition: opacity 0.3s ease-in-out;
        }

        #product-list.loading {
            opacity: 0.4;
        }

        <style>
        /* Custom Bootstrap 5 column for 5 per row */
        @media (min-width: 1200px) {
            .col-xl-2-4 {
                flex: 0 0 20%;
                max-width: 20%;
            }
        }

        .product-card .ratio {
            border-bottom: 1px solid #f1f1f1;
        }

        .product-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        .product-card:hover img {
            transform: scale(1.08);
        }

        /* Product card hover lift */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        /* Image zoom (keep from previous step) */
        .product-card .ratio img {
            transition: transform 0.4s ease;
        }

        .product-card:hover .ratio img {
            transform: scale(1.1);
        }

        /* Quick view overlay */
        .quick-view-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.55);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            padding: 1rem;
            border-radius: 0.75rem;
        }

        .product-card:hover .quick-view-overlay {
            opacity: 1;
        }

        .quick-view-overlay h6,
        .quick-view-overlay p {
            color: #fff;
        }

        /* Animate button */
        .quick-view-overlay a.btn {
            font-size: 0.85rem;
            transform: translateY(10px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .product-card:hover .quick-view-overlay a.btn {
            transform: translateY(0);
            opacity: 1;
        }
    </style>

    <script>
        $(document).on('ajaxStart', function() {
            $('#product-list').addClass('loading');
        }).on('ajaxStop', function() {
            $('#product-list').removeClass('loading');
        });

        $(function() {
            $('#mobile-filter-toggle').on('click', function() {
                $('#mobile-sidebar').addClass('show');
                $('body').addClass('sidebar-open');
            });

            $('#mobile-filter-close').on('click', function() {
                $('#mobile-sidebar').removeClass('show');
                $('body').removeClass('sidebar-open');
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('#mobile-sidebar, #mobile-filter-toggle').length) {
                    $('#mobile-sidebar').removeClass('show');
                    $('body').removeClass('sidebar-open');
                }
            });
        });
    </script>

    <script>
        $(function() {
            let currentPage = 1;
            let loading = false;
            let lastPage = false;

            function getQueryParams() {
                return $('#filter-form').serialize();
            }

            function updateUrl() {
                const query = getQueryParams();
                const baseUrl = "{{ route('products.index') }}";
                const newUrl = query ? `${baseUrl}?${query}` : baseUrl;
                window.history.replaceState({}, '', newUrl);
            }

            function loadProducts(reset = false) {
                if (loading) return;

                if (reset) {
                    $('#product-list').html('');
                    $('#no-more').hide();
                    currentPage = 1;
                    lastPage = false;
                    updateUrl();
                }

                if (lastPage) return;

                loading = true;
                $('#loading-indicator').show();

                const formData = getQueryParams() + '&page=' + currentPage;

                $.ajax({
                    url: "{{ route('products.filter') }}",
                    type: 'GET',
                    data: formData,
                    success: function(data) {
                        data = data.trim();

                        if (reset && !data) {
                            $('#product-list').html(
                                '<div class="text-center text-muted py-5">No products found.</div>');
                            lastPage = true;
                            return;
                        }

                        if (data) {
                            $('#product-list').append(data);
                            currentPage++;
                        } else {
                            $('#no-more').show();
                            lastPage = true;
                        }

                        updateUrl();
                    },
                    error: function() {
                        console.error('Error loading products.');
                    },
                    complete: function() {
                        loading = false;
                        $('#loading-indicator').hide();
                    }
                });
            }

            // Handle filter change
            $('#filter-form').on('change input', 'input, select', function() {
                loadProducts(true);
            });

            // Reset filters
            $('#reset-filters').on('click', function() {
                $('#filter-form')[0].reset();
                loadProducts(true);
            });

            // Infinite scroll
            $(window).on('scroll', function() {
                if (
                    !loading &&
                    !lastPage &&
                    $(window).scrollTop() + $(window).height() >= $(document).height() - 300
                ) {
                    loadProducts();
                }
            });

            // Initial load (with query params from URL)
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.forEach((value, key) => {
                $(`[name="${key}"]`).val(value);
            });

            loadProducts(true);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('filterForm');
            const productList = document.getElementById('productList');
            const toggleFilter = document.getElementById('toggleFilter');
            const sidebar = document.getElementById('filterSidebar');

            // Toggle filter sidebar (mobile)
            toggleFilter?.addEventListener('click', () => {
                sidebar.classList.toggle('active');
                document.body.classList.toggle('filter-open');
            });

            // Handle filter submission
            filterForm?.addEventListener('change', function(e) {
                e.preventDefault();
                applyFilters();
            });

            function applyFilters(page = 1) {
                const formData = new FormData(filterForm);
                const params = new URLSearchParams(formData);
                params.append('page', page);

                fetch(`{{ route('frontend.products.index') }}?${params.toString()}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        productList.innerHTML = html;
                        window.history.pushState({}, '', `?${params.toString()}`);
                        if (window.innerWidth < 768) {
                            sidebar.classList.remove('active');
                            document.body.classList.remove('filter-open');
                        }
                    });
            }

            // Lazy load on scroll
            let page = 1;
            let loading = false;
            window.addEventListener('scroll', function() {
                if (loading) return;
                if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 300) {
                    const nextPage = document.querySelector('[data-next-page]');
                    if (nextPage) {
                        loading = true;
                        page++;
                        const params = new URLSearchParams(new FormData(filterForm));
                        params.append('page', page);
                        fetch(`{{ route('frontend.products.index') }}?${params.toString()}`, {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(res => res.text())
                            .then(html => {
                                const tempDiv = document.createElement('div');
                                tempDiv.innerHTML = html;
                                const newProducts = tempDiv.querySelectorAll('.col-md-4');
                                if (newProducts.length) {
                                    newProducts.forEach(p => productList.querySelector('.row')
                                        .appendChild(p));
                                    loading = false;
                                } else {
                                    document.querySelector('[data-next-page]')?.remove();
                                }
                            });
                    }
                }
            });
        });
    </script>
@endpush
