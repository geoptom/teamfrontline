{{-- resources/views/frontend/layouts/partials/social-icons.blade.php --}}

@if (!empty($social_links))
<div class="th-social mt-3">
    @foreach ($social_links as $social)
        <a href="{{ $social['url'] ?? '#' }}" aria-label="Social Link">
            <i class="{{ $social['icon'] }}"></i>
        </a>
    @endforeach
</div>
@endif
