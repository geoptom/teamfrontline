@extends('frontend.layouts.master')

@section('title', $service->title)

@section('content')
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>@yield('title')</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Solutions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    {{-- <div class="text-center mb-4">
                        <h1 class="fw-bold text-theme">{{ $service->title }}</h1>
                    </div> --}}

                    @if ($service->image)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid rounded"
                                alt="{{ $service->title }}">
                        </div>
                    @endif

                    <div class="content">
                        {!! $service->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
