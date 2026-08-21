<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title', 'INDRACO, a Leading FMCG Company in Indonesia Since 1971')</title>
   <meta name="description" content="@yield('meta_description', 'INDRACO, leading FMCG company in Indonesia since 1971')">
   <meta name="robots" content="index, follow">
   <meta property="og:title" content="@yield('title', config('app.name'))">
   <meta property="og:description" content="@yield('meta_description', 'INDRACO, leading FMCG company in Indonesia since 1971')">
   <meta property="og:url" content="{{ url()->current() }}">
   <link rel="canonical" href="{{ url()->current() }}">
   <meta property="og:type" content="website">
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="@yield('title', config('app.name'))">
   <meta name="twitter:description" content="@yield('meta_description', 'INDRACO, leading FMCG company in Indonesia since 1971')">
   <link rel="shortcut icon" href="{{ asset('images/icon-indraco.ico') }}" type="image/x-icon">

   {{-- Core CSS --}}
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('fonts/myFont.css') }}">
   <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
   <link rel="stylesheet" href="{{ asset('css/main.css') }}">

   {{-- Local Styles --}}
   @stack('styles')
</head>

<body>
   {{-- Skip to main content --}}
   <a href="#content" class="visually-hidden-focusable">Skip to main content</a>

   {{-- Page header, navigation bar, & modal pop-up --}}
   @include('components.header')
   @include('components.navbar')
   @include('components.modal-search')

   {{-- Main content --}}
   <main id="content" tabindex="-1">
      @yield('content')
   </main>

   {{-- Page footer --}}
   @include('components.footer')

   {{-- Core JS --}}
   <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('js/theme.js') }}"></script>
   <script src="{{ asset('js/main.js') }}"></script>
   @stack('scripts')
</body>

</html>
