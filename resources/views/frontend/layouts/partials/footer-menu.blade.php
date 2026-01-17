{{-- resources/views/frontend/layouts/partials/footer-menu.blade.php --}}

@if (!empty($menus))
<div class="widget widget_nav_menu footer-widget">
    <h3 class="widget_title">{{ $title }}</h3>
    <ul class="menu">
        @foreach ($menus as $item)
            <li>
                <a href="{{ $item['url'] ?? '#' }}">
                    {{ $item['name'] ?? '' }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endif
