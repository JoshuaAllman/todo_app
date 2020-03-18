<!DOCTYPE html>
<html>
<head>
    <title>Todo</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
</head>
<body>
     
    <ul class="nav-title">
        @yield('header')
        @guest
            <li class="nav-item"><a href="/login">Sign In</a></li>
            <li class="nav-item"><a class="active" href="/register">Create Account</a></li>
        @else
            <li class="nav-item"><a href="{{ route('logout') }}">Logout</a></li>
        @endguest
            <li class="nav-item"><a class="active" href="/about">About</a></li>
            <li class="nav-item"><a class="active" href="/">Home</a></li>
    </ul>
    <div class="content">
        @yield('content')
    </div>

    <footer class="footer">
        <p class="creator">All rights reserved © Joshua Allman</p>
    </footer>

</body>
</html>