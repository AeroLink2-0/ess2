<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aerolink | ESS') }}</title>
    
    <!-- Scripts -->
    @extends('layouts.scripts')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @extends('layouts.styles')
</head>
<body class="hold-transition layout-fixed sidebar-mini">
    <div class="wrapper">
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
