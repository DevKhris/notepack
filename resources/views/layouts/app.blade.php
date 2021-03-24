<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Note Taking Management System">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NotePack') }} - @yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbarSupportedContent">
    <div id="app">
        <header>
            @include('layouts.navbar')
        </header>
        <main class="py-4">
            @yield('content')
        </main>
        <footer>
        </footer>
    </div>
</body>

</html>