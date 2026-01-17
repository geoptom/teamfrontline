@extends('frontend.layouts.master')
@push('styles')
    <style>
        .solution-card:hover {
            transform: translateY(-4px);
            transition: all 0.3s ease;
        }

        .solution-card img {
            border-radius: .5rem .5rem 0 0;
        }

        .text-theme {
            color: var(--theme-color) !important;
        }

        .btn-outline-theme:hover {
            background: var(--theme-color);
            color: #fff;
        }
    </style>
@endpush
@section('content')
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>{{ $solution->title }}</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('solutions.index') }}">Solutions</a></li>
                            <li><a href="{{ route('solutions.show', $solution->slug) }}">{{ $solution->title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            {{-- <h2>{{ $solution->title }}</h2> --}}
            <img src="{{ asset('storage/' . $solution->image) }}" class="img-fluid mb-4" alt="{{ $solution->title }}" style="border-radius: 0%.5rem; max-height: 300px;">
            <div>{!! $solution->description !!}</div>
        </div>
    </section>
@endsection
