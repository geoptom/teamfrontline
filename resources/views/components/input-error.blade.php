@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <div class="text-danger">{{ $message }}</div>
    @endforeach
@endif
