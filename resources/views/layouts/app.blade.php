<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Quickstart - Basic</title>

    <!-- CSS And JavaScript -->
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js" charset="utf-8"></script>
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light justify-content-between">
    <a class="navbar-brand" href="/">Blogger</a>
    <div class="form-inline">
        <ul class="navbar-nav mr-auto">
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                    <i class="far fa-user"></i>-->
<!--                </a>-->
<!--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--                    <a class="dropdown-item" href="#">Action</a>-->
<!--                    <a class="dropdown-item" href="#">Another action</a>-->
<!--                    <div class="dropdown-divider"></div>-->
<!--                    <a class="dropdown-item" href="#">Something else here</a>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li></li>-->
            <li>
                <a class="btn btn-outline-success my-2 my-sm-0" href="login">Login</a>
            </li>
            <li>
                <a class="btn btn-outline-success my-2 my-sm-0" href="registration">Register</a>
            </li>
        </ul>

    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="page-footer font-small teal">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> Blogger</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
