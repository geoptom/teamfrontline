@extends('frontend.layouts.master')
@section('title') Our Solutions @endsection
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
@section('content')
    {{-- <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Our Solutions</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Solutions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/installation-bg.png">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">@yield('title')</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="z-index-common space overflow-hidden" id="service-sec">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-xxl-5">
                    <div class="title-area text-center"><span class="sub-title sub-title3">Our Solutions</span>
                        <h2 class="sec-title">Empowering Solution For Sustainability Future.</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                @foreach ($solutions as $solution)

                <div class="col-lg-6 col-xxl-4">
                    <div class="service-grid style2">
                        <div class="service-grid_content">
                            <h3 class="box-title"><a href="{{ route('solutions.show', $solution->slug) }}">{{ $solution->title }}</a></h3>
                            <p class="box-text">{{ Str::limit(strip_tags($solution->short_description), 100) }}</p><a href="{{ route('solutions.show', $solution->slug) }}"
                                class="th-btn border-btn th-radius th-icon fw-semibold"><span class="btn-text"
                                    data-back="View Details" data-front="View Details"></span><i
                                    class="fa-regular fa-arrow-right ms-2"></i></a>
                        </div>
                        <div class="box-img th-anim ratio ratio-16x9"><img src="{{ asset('storage/' . $solution->image) }}" alt="Icon"></div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $solutions->links() }}
        </div>
    </section>


    {{-- <section class="solutions py-5">
        <div class="container">
            <div class="row">
                @foreach ($solutions as $solution)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $solution->image) }}" class="card-img-top"
                                alt="{{ $solution->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $solution->title }}</h5>
                                <p>{{ Str::limit($solution->short_description, 100) }}</p>
                                <a href="{{ route('solutions.show', $solution->slug) }}"
                                    class="btn btn-outline-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $solutions->links() }}
        </div>
    </section> --}}
@endsection
