<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Quickstart - Basic</title>

    <!-- CSS And JavaScript -->
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js" charset="utf-8"></script>
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"
            integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ"
            crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light justify-content-between bg-warning">
    <a class="navbar-brand mx-auto" href="/">Blogger</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!--    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">-->
    <!--        <ul class="navbar-nav mr-auto">-->
    <!--            <li class="nav-item active">-->
    <!--                <a class="nav-link" href="#">Left</a>-->
    <!--            </li>-->
    <!--        </ul>-->
    <!--    </div>-->

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item mr-3">
                <a class="nav-link" href="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </li>
            @else
            <li class="nav-item mr-3">
                <a class="nav-link" href="login"><i class="fas fa-sign-in-alt"></i>Login</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-primary" href="registration">Register</a>
            </li>
            @endif
        </ul>
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="page-footer font-small teal">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="/"> Blogger</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
