<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Coach reservation system" />
    <meta name="keywords" content="coaches, reservation" />
    <meta name="author" content="" />
    <title>{{ config('app.name', 'Coach reservation') }}</title>
    <!-- Scripts -->
    {{-- <script src="{{ secure_asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('jquery-ui-1.13.2.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('DataTables/DataTables-1.12.1/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/jquery-plugin-collection.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('jquery-ui-1.13.2.custom/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables/DataTables-1.12.1/css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-6.1.1-web/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css-plugin-collections.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style-main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/theme-skin.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
<div>
    @include('layouts.header')
    @if (Str::contains(url()->current(), 'admin'))
        @include('layouts.admin_divider')
        <section style="height: 100%; width: 100%">
            @yield('content')
        </section>
    @else
        @include('layouts.divider')
        <section class="main_body">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6">
                            @yield('content')
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @include('layouts.footer')
</div>
@stack('scripts')
@livewireScripts
</body>
</html>
