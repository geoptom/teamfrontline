@php
    $menuPages = \App\Models\Page::where('is_visible', 1)->where('show_in_menu', 1)->orderBy('title')->get();
@endphp
@if($menuPages->count())
    @foreach($menuPages as $menuPage)
        <li><a href="{{ route('pages.show', $menuPage->slug) }}">{{ $menuPage->title }}</a></li>
    @endforeach
@endif
