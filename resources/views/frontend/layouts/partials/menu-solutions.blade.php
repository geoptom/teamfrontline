{{-- resources/views/frontend/layouts/partials/menu-solutions.blade.php --}}

<ul class="sub-menu" role="menu">
    @foreach ($menu_solutions as $solution)
        <li role="none">
            <a href="{{ route('solutions.show', $solution->slug) }}" role="menuitem">
                {{ $solution->title }}
            </a>
        </li>
    @endforeach
</ul>
