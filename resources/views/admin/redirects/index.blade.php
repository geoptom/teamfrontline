@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Slug Redirects</h4>
            <a href="{{ route('admin.redirects.create') }}" class="btn btn-primary">Add New Redirect</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" id="searchBox" class="form-control" placeholder="Search slugs..."
                    value="{{ $search }}">

                {{-- <button class="btn btn-outline-secondary">Search</button> --}}
            </div>
        </form>

        <div class="card">
            <div class="table-responsive" id="redirectTable">
                @include('admin.redirects.table')

            </div>

            <div class="card-footer">
                {{ $redirects->links() }}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let timer = null;

            document.getElementById('searchBox').addEventListener('keyup', function() {
                clearTimeout(timer);
                let query = this.value;

                timer = setTimeout(() => {
                    fetch("{{ route('admin.redirects.ajax.search') }}?search=" + query)
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById('redirectTable').innerHTML = data;
                        });
                }, 300); // debounce 300ms
            });

        });
    </script>
@endpush
