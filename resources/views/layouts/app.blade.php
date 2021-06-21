<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="example2">
    <div id="app">
       @include('layouts.nav')
        
       @can('delete-users')
        <div class='row'>
            <div id="sidebar" class="col-md-2">
                @include("sidebar.dashboard")
            </div>
            <main class="py-4 col-md-8">
        @endcan
            @yield('content')
        </main>
    </div>
    </div>
</body>
</html>
<style>.example2 {
  background: url('imagem/sopa.jpg');
  background-repeat: no-repeat;
  background-size: auto;
}
</style>
