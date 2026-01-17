<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title')</title>

    <style>
        :root {
            --theme-color: {{ $settings['appearance']['theme_color'] ?? '#B60A6E' }};
            --theme-color2: {{ $settings['appearance']['theme_color2'] ?? '#FFB1DF' }};
            --smoke-color: {{ $settings['appearance']['bg_smoke'] ?? '#E0E0E0' }};
            --smoke-color2: {{ $settings['appearance']['bg_smoke2'] ?? '#E0E0E0' }};
            --smoke-color3: #FFB1DF;
            --smoke-color4: #F8E6F0;
            --swiper-theme-color: var(--theme-color) !important;
        }


        .btn-theme {
            background: var(--theme-color) !important;
            color: #fff !important;
            border-color: var(--theme-color2) !important;
        }

        .btn-theme:hover {
            background: var(--theme-color2) !important;
        }

        .text-theme {
            color: var(--theme-color) !important;
        }

        .btn-outline-theme {
            background: var(--theme-color2) !important;
            border-color: var(--theme-color);
            color: var(--theme-color);
        }

        .form-switch .form-check-input:checked {
            background-color: var(--theme-color);
            border-color: var(--theme-color);
        }

        .list-group-item.active {
            z-index: 2;
            color: var(--bs-list-group-active-color) !important;
            background-color: var(--theme-color) !important;
            border-color: var(--theme-color) !important;
        }
    </style>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @stack('styles')
</head>

<body>
    @include('admin.layouts.nav') {{-- your admin nav --}}
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidebar')
            <main class="col ps-4 pe-4 pt-4">
                @include('admin.partials.alerts')
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @stack('scripts')
</body>

</html>
