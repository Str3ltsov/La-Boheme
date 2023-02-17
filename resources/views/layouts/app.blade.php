<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    {{-- <script src="{{ secure_asset('js/app.js') }}" defer></script> --}}
    <script src="{{ secure_asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ secure_asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ secure_asset('jquery-ui-1.13.2.custom/jquery-ui.js') }}"></script>
    <script src="{{ secure_asset('DataTables/DataTables-1.12.1/js/jquery.dataTables.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('jquery-ui-1.13.2.custom/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('DataTables/DataTables-1.12.1/css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('fontawesome-free-6.1.1-web/css/all.css') }}" rel="stylesheet">
    @stack('styles')
    @livewireStyles
</head>
<body>
<div id="app" class="d-flex flex-column min-vh-100">
    {{--@include('layouts.navbar')--}}
    <main>
        @yield('content')
    </main>
    {{--@include('layouts.footer')--}}
</div>
@stack('scripts')
@livewireScripts
</body>
</html>
