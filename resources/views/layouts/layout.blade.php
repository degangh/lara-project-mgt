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
    <link href="{{ asset('/css/select2/select2.min.css') }}" rel="stylesheet" />
    
    

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/jquery-ui.min.js') }}"></script>
    
    <script src="{{ mix('js/select2/select2.min.js') }}"></script>
</head>

<body>

<nav class="navbar navbar-expand navbar-light sticky-top bg-light flex-md-nowrap p-0 border-bottom">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{url('/')}}">Project</a>
    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex px-3">
    @guest
    <li class="nav-item text-nowrap pr-md-3"><a href="{{route('login')}}" class="nav-link">Login</a></li>
    <li class="nav-item text-nowrap"><a href="{{route('register')}}" class="nav-link">Register</a></li>
    @else
    <li class="nav-item dropdown pr-md-3">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </ul>
    </li>
    @endguest
</nav>

<div class="container-fluid">
@yield('content')
</div>
</div>
</div>





<script>
    window.setTimeout(function(){
        jQuery(".alert-success").slideUp(1200);
    }, 2000)
    </script>
</body>

</html>