{{-- <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--theme-color, #B60A6E);">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('admin.products.index') }}">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav"
            aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.brands.index') }}">Brands</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.sliders.index') }}">Sliders</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.settings.index') }}">Settings</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav> --}}

<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: var(--theme-color);">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar"
            aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav ms-auto">
                {{-- <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.categories.index') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.brands.index') }}">Brands</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.sliders.index') }}">Sliders</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.pages.index') }}">Pages</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.settings.index') }}">Settings</a></li> --}}
                <li class="nav-item">
                    <a class="nav-link text-warning" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </li>
            </ul>
        </div>
    </div>
</nav>
