<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="bs-css" href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/vendors/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="/vendors/remodal/dist/remodal.css">
    <link rel="stylesheet" href="/vendors/remodal/dist/remodal-default-theme.css">
    <title>@yield('title',  config('app.name') )</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
    <div class="col-xs-6 col-md-3">
        @include('admin-pages.parts.main-menu')
    </div>
    <div class="col-xs-6 col-md-9">
        @if(Session::has("flash_message"))
            <div class="formres">
                <div class="loadmess">{{Session::get("flash_message")}}</div>
            </div>
        @endif
        <h1>@yield('title')</h1>
        @yield('content')
    </div>

<script src='/vendors/jquery/dist/jquery.js' type='text/javascript'></script>
<script type="text/javascript" src="/vendors/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="/vendors/remodal/dist/remodal.min.js"></script>
<script src="/js/main.js"></script>
@yield('scripts')
</body>
</html>
