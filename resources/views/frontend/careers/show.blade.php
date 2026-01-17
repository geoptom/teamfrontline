@extends('frontend.layouts.master')
@section('title', $career->title)
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $career->title }}</h2>
            <p><strong>{{ $career->location }}</strong> • {{ $career->type }}</p>
            <div class="mb-4">{!! $career->description !!}</div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Apply for this role</h5>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('careers.apply', $career->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Cover Letter</label>
                            <textarea name="cover_letter" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Resume (pdf/doc)</label>
                            <input type="file" name="resume" class="form-control">
                        </div>
                        <button class="btn btn-primary">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
