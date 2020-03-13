<!DOCTYPE html>
<html>
<head>
	<title>About</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
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
	<img class="about-image" src="https://bit.ly/2W9kVp9" width="400" height="500">
	<p class="about">Lorem ipsum dolor sit amet, vis ut dicat diceret, quo viris facete torquatos cu. Ea iriure timeam eum, mazim debet facilisi eum id. Vim ut posse dolore iisque, mei error tamquam pericula ad. Est et omittam prodesset, ea denique molestiae mea, ipsum detracto patrioque an ius.

	An mei fabellas inimicus, causae pertinax laboramus ex est, agam minim volumus pri in. His nullam molestie principes te, viris graece efficiendi an eam. Ne erat numquam detraxit mei, te vel delectus corrumpit. Dicam saperet elaboraret eos id, populo mollis ut his, ne dicant integre persequeris vel. Id vim atomorum volutpat evertitur. Mea zril tritani aliquando ei, tantas everti legimus cu mel, at atqui utamur molestie vel. Quaeque maluisset in cum, eum an alterum debitis neglegentur.</p>



    <footer class="footer">
        <p class="creator">All rights reserved © Joshua Allman</p>
    </footer>

</body>
</html>