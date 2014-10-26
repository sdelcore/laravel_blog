<html>
    <body>
        @section('sidebar')
            <a href="{{ URL::to('/') }} ">Home</a>
            @if(Auth::check())
            <a href="{{ URL::to('logout') }}">Logout</a>
            <a href="{{ URL::to('post') }}">Post</a>
            @else
            <a href="{{ URL::to('login') }}">Login</a>
            <a href="{{ URL::to('register') }}">Register</a>
            @endif
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>