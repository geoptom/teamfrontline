@extends('frontend.layouts.master')
@section('title', 'Careers')
@section('content')
<div class="container py-5">
    <h2 class="mb-4">Careers</h2>
    <div class="row">
        @foreach($careers as $career)
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>{{ $career->title }}</h5>
                        <p class="mb-1"><strong>{{ $career->location }}</strong> • {{ $career->type }}</p>
                        <p>{{ Str::limit(strip_tags($career->summary ?? $career->description), 150) }}</p>
                        <a href="{{ route('careers.show', $career->slug) }}" class="btn btn-outline-primary btn-sm">View & Apply</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $careers->links() }}
</div>
@endsection
