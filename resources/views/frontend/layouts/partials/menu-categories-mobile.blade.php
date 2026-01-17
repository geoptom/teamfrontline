{{-- resources/views/frontend/layouts/partials/menu-categories-mobile.blade.php --}}

<ul class="sub-menu" role="menu">
    @foreach ($menu_categories as $cat)
        <li class="menu-item-has-children" role="none">
            <a href="{{ route('category.show', $cat->slug) }}" role="menuitem">
                {{ $cat->name }}
            </a>

            @if ($cat->children->count())
                <ul class="sub-menu" role="menu">
                    @foreach ($cat->children as $child)
                        <li role="none">
                            <a href="{{ route('category.show', $child->slug) }}"
                               role="menuitem">
                                {{ $child->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

        </li>
    @endforeach
</ul>
