<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title', 'INDRACO, a Leading FMCG Company in Indonesia Since 1971')</title>
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
