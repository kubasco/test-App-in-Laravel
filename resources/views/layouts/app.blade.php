<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'jobTest') }}</title>

    <!-- Styles -->
@include('layouts.section.styles')

<!-- Scripts -->
    @include('layouts.section.scripts_up')
</head>


@guest
    <body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main class="fadeIn">
                @yield('content')
            </main>
        </div>
    </div>
    @else
        <body class="sb-nav-fixed">
        @include('layouts.section.menu_up')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('layouts.section.menu')
            </div>
            <div id="layoutSidenav_content">
                @include('auth.section.success')
                @include('auth.section.errors')
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
        @endguest


        <!-- Scripts -->
        @include('layouts.section.scripts_down')
        </body>
</html>
