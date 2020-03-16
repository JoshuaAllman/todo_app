<!DOCTYPE html>
<html>
<head>
	<title>About</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

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

	<h1 class="about">About</h1>
	<img class="about-image" src="https://bit.ly/2W9kVp9" width="400" height="400">

	<p class="about">My Name is Joshua Allman, I am 19 years of age and currently participating in an apprenticeship with a company called Purple Mountain.  This is the first application that I have built, and I hope to add to it throughout the future. It is an application for managing tasks, where users can create and complete any number of tasks as they wish. 
	</p>	

<div class="social-container">
    <a href="https://www.instagram.com/rhetoricality/">
	   <i class="fa fa-instagram"></i>
    </a>
    <a href="https://twitter.com/Prepsody">
        <i class="fa fa-twitter"></i>
    </a>
    <a href="https://github.com/JoshuaAllman/">
        <i class="fa fa-github-alt"></i>
    </a>
</div>
        
    <footer class="footer">
        <p class="creator">All rights reserved © Joshua Allman</p>
    </footer>

</body>
</html>