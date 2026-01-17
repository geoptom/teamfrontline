@extends('admin.layouts.master')
@section('title', 'Products')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Product Imports</h3>
        <div>

        </div>

    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>File</th>
                    <th>Total</th>
                    <th>Success</th>
                    <th>Failed</th>
                    <th>Errors</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($logs as $log)
                    <tr>
                        <td>{{ $log->created_at }}</td>
                        <td>{{ $log->file_name }}</td>
                        <td>{{ $log->rows_total }}</td>
                        <td>{{ $log->rows_success }}</td>
                        <td>{{ $log->rows_failed }}</td>
                        <td>
                            @if ($log->errors)
                                <button class="btn btn-sm btn-danger"
                                    onclick="alert(JSON.stringify(@json($log->errors), null, 2))">
                                    View
                                </button>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">No Data Found</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $logs->links() }}

    </div>



@endsection

@push('scripts')
@endpush
