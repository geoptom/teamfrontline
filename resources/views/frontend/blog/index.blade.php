@extends('frontend.layouts.master')
@section('title')
    Blogs
@endsection
@push('styles')
@endpush
@section('content')
    {{-- <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>@yield('title')</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Services</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/installation-bg-1.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">@yield('title')</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Blogs</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="th-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-7">
                    @forelse($blogs as $blog)
                        <div class="th-blog blog-single has-post-thumbnail">
                            @if(!empty($blog->image))
                                <div class="blog-img global-img">
                                    <a href="{{ route('blog-details', $blog->slug) }}"><img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"></a>
                                </div>
                            @endif
                            <div class="blog-content">
                                <div class="blog-meta"><a href="#"><i class="fa-light fa-calendar"></i>{{ $blog->created_at->format('d M, Y') }}</a></div>
                                <h3 class="blog-title"><a href="{{ route('blog-details', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                <p class="blog-text">{{ \Illuminate\Support\Str::limit(strip_tags($blog->excerpt ?? $blog->content), 220) }}</p>
                                <a href="{{ route('blog-details', $blog->slug) }}" class="th-btn border-btn th-icon"><span class="btn-text" data-back="Read More" data-front="Read More"></span><i class="fa-regular fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    @empty
                        <p>No blog posts found.</p>
                    @endforelse

                    <div class="th-pagination">
                        {{ $blogs->withQueryString()->links() }}
                    </div>
                </div>

                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <div class="widget widget_search">
                            <form class="search-form" action="{{ route('blog') }}" method="GET">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Enter Keyword">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>

                        <div class="widget widget_categories">
                            <h3 class="widget_title">Categories</h3>
                            <ul>
                                @foreach($categories ?? [] as $cat)
                                    <li><a href="{{ route('blog', ['category' => $cat->slug]) }}">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                @foreach($recentPosts ?? [] as $post)
                                    <div class="recent-post">
                                        <div class="media-img">
                                            <a href="{{ route('blog-details', $post->slug) }}"><img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"></a>
                                        </div>
                                        <div class="media-body">
                                            <div class="recent-post-meta"><a href="#"><i class="fa-sharp fa-solid fa-calendar-days"></i>{{ $post->created_at->format('d M, Y') }}</a></div>
                                            <h4 class="post-title"><a class="text-inherit" href="{{ route('blog-details', $post->slug) }}">{{ $post->title }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- <div class="widget widget_tag_cloud">
                            <h3 class="widget_title">Popular Tags</h3>
                            <div class="tagcloud">
                                @foreach(['Solar Energy','Air','Ecology','Turbine','Branding','Hydro Power','Energy'] as $tag)
                                    <a href="{{ route('blog', ['search' => $tag]) }}">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </div> --}}
                    </aside>
                </div>
            </div>
        </div>
    </section>


@endsection
