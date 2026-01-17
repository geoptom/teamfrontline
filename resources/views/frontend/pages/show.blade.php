@extends('frontend.layouts.master')
@section('title', $page->seo_title ?? $page->title)
@section('meta_description', $page->seo_description ?? '')
@section('content')
    <div class="breadcumb-wrapper" data-bg-src="@if(!empty($page->banner_image)){{ asset('storage/' . $page->banner_image) }}@else{{ asset('assets/img/bg/installation-bg-1.jpg') }}@endif">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $page->title }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{ $page->title }}</li>
                </ul>
            </div>
        </div>
    </div>
<div class="container">
    <div class="py-4">
        {{-- @if(!empty($page->banner_image))
            <img src="{{ asset('storage/' . $page->banner_image) }}" alt="" class="img-fluid mb-3">
        @endif --}}
        {{-- <div class="page-excerpt mb-3">{!! $page->excerpt !!}</div> --}}
        <div class="page-content">{!! $page->content !!}</div>
    </div>
</div>
@endsection
