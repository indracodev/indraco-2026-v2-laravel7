<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'INDRACO - Coffee & Beverage Industry')</title>
    <link rel="shortcut icon" href="{{ asset('images/icon-indraco.ico') }}" type="image/x-icon">

    {{-- Core CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/myFont.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- Select2 & jQuery for Select Search --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">

    {{-- Dynamic Custom Theme Color --}}
    @php
        $currentThemeColor = \App\Models\MasterSetting::get('theme_color', '#004b49');
        $hexVal = ltrim($currentThemeColor, '#');
        if (strlen($hexVal) == 6) {
            $rVal = hexdec(substr($hexVal, 0, 2));
            $gVal = hexdec(substr($hexVal, 2, 2));
            $bVal = hexdec(substr($hexVal, 4, 2));
        } else {
            $rVal = 0; $gVal = 75; $bVal = 73;
        }
        $currentThemeRgb = "$rVal, $gVal, $bVal";
    @endphp
    <style>
        :root {
            --custom-primary: {{ $currentThemeColor }};
            --custom-primary-rgb: {{ $currentThemeRgb }};
            --custom-color-1: {{ $currentThemeColor }};
            --custom-color-1-rgb: {{ $currentThemeRgb }};
        }
        .btn-custom-1, .badge-custom-1, .bg-custom-1, .badge-custom-1 {
            background-color: var(--custom-primary) !important;
            border-color: var(--custom-primary) !important;
            color: #ffffff !important;
        }
        .btn-custom-1:hover, .btn-custom-1:focus, .btn-custom-1:active {
            filter: brightness(85%);
            color: #ffffff !important;
        }
        .btn-custom-1-outline {
            background-color: transparent !important;
            border: 1px solid var(--custom-primary) !important;
            color: var(--custom-primary) !important;
            font-weight: 600;
        }
        .btn-custom-1-outline:hover, .btn-custom-1-outline:focus, .btn-custom-1-outline:active {
            background-color: var(--custom-primary) !important;
            color: #ffffff !important;
        }
        .text-custom-1 {
            color: var(--custom-primary) !important;
        }
        .text-bg-custom-1 {
            background-color: var(--custom-primary) !important;
            color: #ffffff !important;
        }
        
        /* Admin Sidebar & Drawer Dynamic Active/Hover Colors */
        .admin-sidebar .nav-link.active,
        .mobile-drawer-item.active {
            background-color: var(--custom-primary) !important;
            color: #ffffff !important;
        }
        .admin-sidebar .nav-link:hover,
        .mobile-drawer-item:hover {
            background-color: rgba(var(--custom-primary-rgb), 0.1) !important;
            color: var(--custom-primary) !important;
        }

        /* Tabs Bar Dynamic Colors (#dashboardTab & #settingTab) */
        #dashboardTab .nav-link.active,
        #settingTab .nav-link.active {
            background-color: var(--custom-primary) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(var(--custom-primary-rgb), 0.3) !important;
        }
        #dashboardTab .nav-link:hover,
        #settingTab .nav-link:hover {
            background-color: rgba(var(--custom-primary-rgb), 0.12) !important;
            color: var(--custom-primary) !important;
        }

        /* Dark Mode Tab Overrides */
        [data-bs-theme="dark"] #dashboardTab .nav-link:hover,
        [data-bs-theme="dark"] #settingTab .nav-link:hover {
            background-color: rgba(var(--custom-primary-rgb), 0.2) !important;
            color: var(--custom-primary) !important;
        }
        [data-bs-theme="dark"] #dashboardTab .nav-link.active,
        [data-bs-theme="dark"] #settingTab .nav-link.active {
            background-color: var(--custom-primary) !important;
            color: #ffffff !important;
        }
    </style>

    @stack('styles')
</head>
<body>
    <a href="#content" class="visually-hidden-focusable">Skip to main content</a>

    {{-- Header & Search Modal --}}
    @include('components.navbar')
    @include('components.modal-search')

    <main id="content" tabindex="-1">
        @yield('content')
    </main>

    @include('components.footer')
    <x-bottom-nav />

    {{-- Core JS --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>
