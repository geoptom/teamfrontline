@extends('frontend.layouts.master')

@section('title', $category->name)
@section('meta_description', $category->seo_description ?? '')

@section('content')

    {{-- <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>@yield('title')</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Categories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <div class="breadcumb-wrapper"
        data-bg-src="{{ asset($category->banner != '' ? "storage/".$category->banner : 'assets/img/bg/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">@yield('title')</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Category</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="z-index-common space overflow-hidden" id="service-sec">
        <div class="container">
            {{-- <div class="row justify-content-center align-items-center">
                <div class="col-lg-12">
                    <div class="title-area text-center"> --}}
            {{-- <span class="sub-title sub-title3">Our Category</span> --}}
            {{-- <h2 class="sec-title">{{ $category->name }}</h2> --}}
            {{-- </div>
                </div>
            </div> --}}
            <div class="mb-10">
                {{-- @if ($category->banner)
                    <img src="{{ asset( $category->banner) }}" alt="{{ $category->name }}"
                        class="mx-auto mb-5 rounded-xl max-h-72 object-cover">
                @endif --}}

                {{-- <h1 class="text-3xl font-bold text-gray-800 mb-3">{{ $category->name }}</h1> --}}

                @if ($category->short_description)
                    <p class="max-w-3xl mx-auto text-gray-600">
                        {!! nl2br(e($category->short_description)) !!}
                    </p>
                @endif
                @if ($category->description)
                    <p class="max-w-3xl mx-auto text-gray-600">
                        {{-- {!! nl2br(e($category->description)) !!} --}}
                        {!! $category->description !!}
                    </p>
                @endif
            </div>
            @if ($subcategories->count())
                <div class="row gy-4">
                    @foreach ($subcategories as $sub)
                        <div class="col-lg-4 col-xxl-4">
                            <div class="service-grid style2">
                                    <a href="{{ route('category.show', $sub->slug) }}">
                                    <div class="service-grid_content">
                                        <h3 class="box-title">{{ $sub->name }}
                                        </h3>
                                        <p class="box-text">{{ Str::limit(strip_tags($sub->short_description), 100) }}</p>
                                        {{-- <a href="{{ route('category.show', $sub->slug) }}"
                                        class="th-btn border-btn th-radius th-icon fw-semibold"><span class="btn-text"
                                            data-back="View Details" data-front="View Details"></span><i
                                            class="fa-regular fa-arrow-right ms-2"></i></a> --}}
                                    </div>
                                    {{-- @if ($sub->thump_image != '')
                                        <div class="box-img th-anim ratio ratio-16x9"><img
                                                src="{{ asset('storage/' . $sub->thump_image) }}" alt=""
                                                onerror="this.onerror=null; this.src='{{ asset('assets/img/shape/no-image.png') }}'">
                                        </div>
                                    @endif --}}
                                </a>
                                </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>



    @if ($products->count())
        <section class=" overflow-hidden" id="service-sec">
            <div class="container">
                <h4 class="text-2xl font-bold mb-6 text-gray-800">Products under {{ $category->name }}</h4>
                <div id="product-list" class="row g-4">
                    @include('frontend.products.partials.list')
                </div>

                <div class="mt-5 mb-5 d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>

        </section>
    @endif

    {{-- <section class="py-10 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                @if ($category->banner)
                    <img src="{{ asset('storage/' . $category->banner) }}" alt="{{ $category->name }}"
                        class="mx-auto mb-5 rounded-xl max-h-72 object-cover">
                @endif

                <h1 class="text-3xl font-bold text-gray-800 mb-3">{{ $category->name }}</h1>

                @if ($category->description)
                    <p class="max-w-3xl mx-auto text-gray-600">
                        {!! nl2br(e($category->description)) !!}
                    </p>
                @endif
            </div>

            @if ($subcategories->count())
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Explore {{ $category->name }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($subcategories as $sub)
                        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                            <a href="{{ route('category.show', $sub->slug) }}" class="block text-center p-6">
                                @if ($sub->icon)
                                    <div class="text-4xl text-blue-500 mb-3">
                                        <i class="{{ $sub->icon }}"></i>
                                    </div>
                                @endif
                                <h3 class="text-lg font-semibold text-gray-800 hover:text-blue-600">
                                    {{ $sub->name }}
                                </h3>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Products under {{ $category->name }}</h2>

                @if ($products->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($products as $product)
                            <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                                <a href="{{ route('products.show', $product->slug) }}" class="block">
                                    <img src="{{ asset('storage/' . $product->thumb_image) }}" alt="{{ $product->name }}"
                                        class="w-full h-48 object-cover">

                                    <div class="p-4 text-center">
                                        <h4 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h4>
                                        <p class="text-blue-600 font-bold mt-1">₹{{ number_format($product->price, 2) }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $products->links() }}
                    </div>
                @else
                    <p class="text-gray-500 text-center py-10">No products found in this category.</p>
                @endif
            @endif
        </div>
    </section> --}}
@endsection
