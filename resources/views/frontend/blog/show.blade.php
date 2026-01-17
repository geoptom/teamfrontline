@extends('frontend.layouts.master')

@section('title', $blog->title)

@section('content')
    <div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $blog->title }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li>{{ $blog->title }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if ($blog->image)
                        <div class="mb-4 text-center">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded" alt="{{ $blog->title }}">
                        </div>
                    @endif

                    <div class="mb-3 text-muted">
                        {{ $blog->created_at->format('d M, Y') }} @if($blog->category) | <a href="{{ route('blog', ['category' => $blog->category->slug]) }}">{{ $blog->category->name }}</a>@endif
                    </div>

                    <div class="content">
                        {!! $blog->content !!}
                    </div>

                    {{-- <hr class="my-4"> --}}

                    {{-- <h5>Comments</h5>
                    @foreach($comments as $comment)
                        <div class="mb-3">
                            <strong>{{ $comment->user?->name ?? $comment->name ?? 'Guest' }}</strong>
                            <div class="text-muted small">{{ $comment->created_at->diffForHumans() }}</div>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    @endforeach

                    {{ $comments->links() }}

                    @auth
                        <div class="mt-4">
                            <form action="{{ route('blog-comment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <div class="mb-3">
                                    <textarea name="comment" rows="4" class="form-control" placeholder="Write your comment"></textarea>
                                </div>
                                <button class="btn btn-primary">Submit Comment</button>
                            </form>
                        </div>
                    @else
                        <p><a href="{{ route('login') }}">Log in</a> to post a comment.</p>
                    @endauth --}}
                </div>

                <div class="col-lg-4">
                    <div class="mb-4">
                        <h5>Recent Posts</h5>
                        @foreach($moreBlogs ?? [] as $post)
                            <div class="mb-2">
                                <a href="{{ route('blog-details', $post->slug) }}">{{ $post->title }}</a>
                            </div>
                        @endforeach
                    </div>

                    <div>
                        <h5>Related</h5>
                        @foreach($recentBlogs ?? [] as $post)
                            <div class="mb-2"><a href="{{ route('blog-details', $post->slug) }}">{{ $post->title }}</a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
