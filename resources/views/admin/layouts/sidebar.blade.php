<div class="col-md-2 col-lg-2 d-none d-md-block bg-light sidebar py-4" style="min-height: 100vh;">
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'text-theme fw-bold' : 'text-dark' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            @php
                $blogActive = request()->is('admin/products*') || request()->is('admin/categories*') || request()->is('admin/brands*');
            @endphp
            <a class="nav-link d-flex justify-content-between align-items-center {{ $blogActive ? 'text-theme fw-bold' : 'text-dark' }}"
               data-bs-toggle="collapse" href="#productMenu" role="button" aria-expanded="{{ $blogActive ? 'true' : 'false' }}" aria-controls="productMenu">
                <span><i class="bi bi-journal-text me-2"></i> Products</span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <div class="collapse {{ $blogActive ? 'show' : '' }}" id="productMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->is('admin/products*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Products
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->is('admin/categories*') && !request()->is('admin/categories*') ? 'text-theme fw-bold' : 'text-dark' }}">
                            Categories
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.brands.index') }}" class="nav-link {{ request()->is('admin/brands*') ? 'text-theme fw-bold' : 'text-dark' }}">
                            Brands
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item mb-2">
            @php
                $blogActive = request()->is('admin/blog*') || request()->is('admin/blog-category*') || request()->is('admin/blog-comments*');
            @endphp
            <a class="nav-link d-flex justify-content-between align-items-center {{ $blogActive ? 'text-theme fw-bold' : 'text-dark' }}"
               data-bs-toggle="collapse" href="#blogMenu" role="button" aria-expanded="{{ $blogActive ? 'true' : 'false' }}" aria-controls="blogMenu">
                <span><i class="bi bi-journal-text me-2"></i> Blog</span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <div class="collapse {{ $blogActive ? 'show' : '' }}" id="blogMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.blog-category.index') }}" class="nav-link {{ request()->is('admin/blog-category*') ? 'text-theme fw-bold' : 'text-dark' }}">
                            Categories
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.blog.index') }}" class="nav-link {{ request()->is('admin/blog*') && !request()->is('admin/blog-category*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Blogs
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.blog-comments.index') }}" class="nav-link {{ request()->is('admin/blog-comments*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Comments
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item mb-2">
            @php
                $manageActive = request()->is('admin/redirects*') || request()->is('admin/settings*') || request()->is('admin/sliders*') ;
            @endphp
            <a class="nav-link d-flex justify-content-between align-items-center {{ $manageActive ? 'text-theme fw-bold' : 'text-dark' }}"
               data-bs-toggle="collapse" href="#manageMenu" role="button" aria-expanded="{{ $manageActive ? 'true' : 'false' }}" aria-controls="manageMenu">
                <span><i class="bi bi-journal-text me-2"></i> Manage</span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <div class="collapse {{ $manageActive ? 'show' : '' }}" id="manageMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.redirects.index') }}" class="nav-link {{ request()->is('admin/redirects*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Redirects
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->is('admin/settings*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Settings
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ request()->is('admin/sliders*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Sliders
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item mb-2">
            @php
                $manageActive = request()->is('admin/pages*') || request()->is('admin/careers*') || request()->is('admin/services*')|| request()->is('admin/solutions*') ;
            @endphp
            <a class="nav-link d-flex justify-content-between align-items-center {{ $manageActive ? 'text-theme fw-bold' : 'text-dark' }}"
               data-bs-toggle="collapse" href="#websiteMenu" role="button" aria-expanded="{{ $manageActive ? 'true' : 'false' }}" aria-controls="websiteMenu">
                <span><i class="bi bi-journal-text me-2"></i> Website</span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <div class="collapse {{ $manageActive ? 'show' : '' }}" id="websiteMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.solutions.index') }}" class="nav-link {{ request()->is('admin/solutions*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Solutions
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->is('admin/services*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Services
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.careers.index') }}" class="nav-link {{ request()->is('admin/careers*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Careers
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->is('admin/pages*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Pages
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item mb-2">
            @php
                $reportActive = request()->is('admin/reports*') || request()->is('admin/logs*')  || request()->is('admin/messages*') ;
            @endphp
            <a class="nav-link d-flex justify-content-between align-items-center {{ $reportActive ? 'text-theme fw-bold' : 'text-dark' }}"
               data-bs-toggle="collapse" href="#reportMenu" role="button" aria-expanded="{{ $reportActive ? 'true' : 'false' }}" aria-controls="reportMenu">
                <span><i class="bi bi-journal-text me-2"></i> Reports</span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <div class="collapse {{ $reportActive ? 'show' : '' }}" id="reportMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.reports.products.import') }}" class="nav-link {{ request()->is('admin/reports/product/imports*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Product Imports
                        </a>
                    </li>

                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->is('admin/messages*') ? 'text-theme fw-bold' : 'text-dark' }}">
                             Contacts
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>

{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
