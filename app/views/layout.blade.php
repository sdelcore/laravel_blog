<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Raleway:900,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    {{ HTML::style('css/main.css'); }}
</head>
    <body>
        <div id="header">
            @section('sidebar')
                <span id="welcome">
                    {{ Config::get('app.title') }}
                </span>
                <span id="nav">
                    <a href="{{ URL::to('/') }} " class="nav_link">HOME</a>
                    @if(Auth::check())
                    <a href="{{ URL::to('post') }}" class="nav_link">POST</a>
                    <a href="{{ URL::to('logout') }}" class="nav_link">LOGOUT</a>
                    @else
                    <a href="{{ URL::to('login') }}" class="nav_link">LOGIN</a>
                    <a href="{{ URL::to('register') }}" class="nav_link">REGISTER</a>
                    @endif
                </span>
            @show
        </div>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>