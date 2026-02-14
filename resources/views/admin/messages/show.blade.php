@extends('admin.layouts.master')

@section('content')
<h4>Message Details</h4>

<p><strong>Name:</strong> {{ $message->name }}</p>
<p><strong>Email:</strong> {{ $message->email }}</p>
<p><strong>Phone:</strong> {{ $message->phone }}</p>
<p><strong>Message:</strong></p>
<p>{{ $message->message }}</p>

<p><strong>IP:</strong> {{ $message->ip_address }}</p>
<p><strong>Date:</strong> {{ $message->created_at->format('d M Y h:i A') }}</p>

<a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Back</a>
@endsection
