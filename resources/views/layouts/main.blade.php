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
                    <li class="nav-item"><a class="" href="/contact"><i id="user" class="fa fa-envelope"></i></i>Contact</a></li>
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
    //create task modal
    var modal = document.querySelector('.modal-card');
    var btn = document.querySelector('.modal-cross');
    var newTask = document.querySelector('.search-button');
    var container = document.querySelector('.modal-seperator');
    var delete_modal = document.querySelector('.delete-card');
    var delete_button = document.querySelector('.confirm-delete');
    var cancel_del = document.querySelector('.cancel-delete');
    var content_seperator = document.getElementById('.content-seperator');

    newTask.addEventListener('click', function() {
        // modal.style.display = 'block';
        modal.style.visibility = 'visible';
        container.style.visibility = 'visible';
        container.style.height = '100%';
        container.style.padding = '0 45px 45px 45px';
    });

    function deleteModalOpener(main_del_button, event) {
        // modal.style.display = 'block';
        modal.style.visibility = 'visible';
        delete_modal.style.visibility = 'visible';
        delete_modal.style.height = '100%';
        content_seperator.style.padding = '0 45px 45px 45px';
    }

    btn.addEventListener('click', function() {
        // modal.style.display = 'none';
        modal.style.visibility = 'hidden';
        if (container.style.visibility == 'visible') {
         container.style.visibility = 'hidden';
         container.style.height = '0';
         container.style.padding = '0';
        } else if (delete_modal.style.visibility == 'visible') {
            delete_modal.style.visibility = 'hidden';
        }
    });


    function searchFilter() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>