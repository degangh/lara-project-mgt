<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Project') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/jquery-ui.min.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/jquery-ui.min.js') }}"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default">
    <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand mb-01 h1">
            {{ config('app.name', 'Project') }}
            </a>
    </div>
    </nav>
    <div class="container">
    @yield('content')
    </div>
</div>


</body>
</html>