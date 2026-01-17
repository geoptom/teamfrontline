{{-- resources/views/frontend/layouts/partials/menu-services.blade.php --}}

<ul class="sub-menu" role="menu">
    @foreach ($menu_services as $service)
        <li role="none">
            <a href="{{ route('services.show', $service->slug) }}" role="menuitem">
                {{ $service->title }}
            </a>
        </li>
    @endforeach
</ul>
