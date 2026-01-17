{{-- resources/views/frontend/layouts/partials/menu-categories-desktop.blade.php --}}

<ul class="sub-menu" role="menu">
    @foreach ($menu_categories as $cat)
        <li class="menu-item-has-children" role="none">
            <a href="{{ route('category.show', $cat->slug) }}" role="menuitem">
                @if (!empty($cat->icon))
                    <i class="{{ $cat->icon }} me-2"></i>
                @endif
                {{ $cat->name }}
            </a>

            @if ($cat->children->count())
                <ul class="sub-menu" role="menu">
                    @foreach ($cat->children as $child)
                        <li role="none">
                            <a href="{{ route('category.show', $child->slug) }}"
                               class="with-icon"
                               role="menuitem">
                                @if (!empty($child->icon))
                                    <i class="{{ $child->icon }} me-2"></i>
                                @endif
                                {{ $child->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
