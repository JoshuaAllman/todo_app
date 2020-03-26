<!DOCTYPE html>
<html>
<head>
    <title>Todo</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    @yield('modal')
    <div class="background">
        <div class="sidebar">
            <div class="sidebar-content">
                <ul class="nav-title">
                    @guest
                    <li class="nav-item"><a class="" href="/"><i id="user" class="fa fa-home"></i>Home</a></li>
                    <li class="nav-item"><a class="" href="/about"><i class="fa fa-bookmark" id="user"></i>About</a></li>
                    <li class="nav-item"><a class="" href="/register"><i id="user" class="fa fa-user-plus"></i>Create Account</a>
                    <li class="nav-item"><a href="/login" id="login"><i class="fa fa-user" id="user"></i>Sign In</a></li></li>
                        @else
                    <li class="nav-item"><a class="" href="/"><i id="user" class="fa fa-home"></i>Home</a></li>
                    <li class="nav-item"><a class="" href="/about"><i class="fa fa-bookmark" id="user"></i>About</a></li>
                    <li class="nav-item"><a href="{{ route('logout') }}"><i class="fa fa-sign-out" id="user"></i>Logout</a></li>
                    @endguest
                </ul>
                <div id="socials">
                <a href="https://www.instagram.com/rhetoricality/" target="_blank">
                    <i class="fa fa-instagram"></i>
                </a>
                <a href="https://twitter.com/Prepsody" target="_blank">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="https://github.com/JoshuaAllman/" target="_blank">
                    <i class="fa fa-github-alt"></i>
                </a>
            </div>
        </div>
    </div> 

        <div class="body-port">
            <div class="content">
                @yield('header')
                @yield('content')
                @yield('taskport')
            </div>
        </div>
       <!--  <footer class="footer">
            <p class="creator">All rights reserved © Joshua Allman & Adam Knight</p>
        </footer> -->
    </div>
</div>

<script>
    var modal = document.querySelector('.modal-card');
    var btn = document.querySelector('.modal-cross');
    var newTask = document.querySelector('.search-button');

    newTask.addEventListener('click', function() {
        // modal.style.display = 'block';
        modal.style.visibility = 'visible';
    });

    btn.addEventListener('click', function() {
        // modal.style.display = 'none';
        modal.style.visibility = 'hidden';
    });


    
    function searchFilter() {
        var items, item_row, item_input, filter, txtValue, i;
        item_input = document.getElementById("item_input");

        filter = item_input.value.toUpperCase();
        item_row = document.getElementById("item_row");
        items = document.getElementById("items");
        for (i = 0; i < items.length; i++) {
            txtValue = items.textContent || items.innerText || items.innerHTML;
                    console.log('derp');
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            //     item_row[i].style.display = "";
                    console.log('hello');
            } else {
                        console.log('world');
            //     item_row[i].style.display = "none";
            }
        }
    }
</script>
</body>
</html>