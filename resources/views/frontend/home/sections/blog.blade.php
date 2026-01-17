{{-- @if ($recentBlogs)

    <section id="wsus__blogs" class="home_blogs">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__section_header">
                        <h3>recent blogs</h3>
                        <a class="see_btn" href="{{ route('blog') }}">see more <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row home_blog_slider">
                @foreach ($recentBlogs as $blog)
                    <div class="col-xl-3">
                        <div class="wsus__single_blog wsus__single_blog_2">
                            <a class="wsus__blog_img" href="{{ route('blog-details', $blog->slug) }}">
                                <img src="{{ asset($blog->image) }}" alt="blog" class="img-fluid w-100">
                            </a>
                            <div class="wsus__blog_text">
                                <a class="blog_top red" href="#">{{ $blog->category->name }}</a>
                                <div class="wsus__blog_text_center">
                                    <a href="{{ route('blog-details', $blog->slug) }}">{!! limitText($blog->title, 45) !!}</a>
                                    <p class="date">{{ date('M D Y', strtotime($blog->created_at)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endif --}}
@php
    $blogs = \App\Models\Blog::where('status', 1)->get();
@endphp
@if ($blogs->count() > 0)

    <section class="overflow-hidden space overflow-hidden" id="blog-sec">
        <div class="container">
            <div class="title-area text-center"><span class="sub-title">News & Blog</span>
                <h2 class="sec-title">Our Latest News & Blogs</h2>
            </div>
            <div class="slider-area">
                <div class="swiper1 th-slider has-shadow custom-swiper" id="blogSlider">
                    <div class="swiper-wrapper">
                        @foreach ($blogs as $blog)
                            <div class="swiper-slide px-md-2">
                                <div class="blog-card h-100 d-flex flex-column">
                                    <div class="box-img global-img" style="height:220px; overflow:hidden;">
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="blog image"
                                            style="width:100%; height:100%; object-fit:cover;">
                                    </div>
                                    <div class="box-content d-flex flex-column"
                                        style="flex:1; justify-content:space-between;">
                                        <div>
                                            <div class="blog-meta"><a href="{{ route('blog-details', $blog->slug) }}"><i
                                                        class="fa-regular fa-calendar"></i>
                                                    {{ $blog->created_at->format('d M, Y') }}</a>
                                            </div>
                                            <h3 class="box-title"><a
                                                    href="{{ route('blog-details', $blog->slug) }}">{{ $blog->title }}</a>
                                            </h3>
                                        </div>
                                        <a href="{{ route('blog-details', $blog->slug) }}"
                                            class="th-btn border-btn th-icon text-uppercase fw-semibold mt-3 align-self-start">
                                            <span class="btn-text" data-back="Read More" data-front="Read More"></span>
                                            <i class="fa-regular fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button data-slider-prev="#blogSlider" class="slider-arrow slider-prev"><i
                        class="far fa-arrow-left"></i></button>
                <button data-slider-next="#blogSlider" class="slider-arrow slider-next"><i
                        class="far fa-arrow-right"></i></button>
            </div>
        </div>
    </section>
@endif

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new Swiper("#blogSlider", {
                "loop": true,
                "breakpoints": {
                    "0": {
                        "slidesPerView": 1
                    },
                    "576": {
                        "slidesPerView": "1"
                    },
                    "768": {
                        "slidesPerView": "2"
                    },
                    "992": {
                        "slidesPerView": "2"
                    },
                    "1200": {
                        "slidesPerView": "3"
                    }
                }
            });
        });
    </script>
@endpush
