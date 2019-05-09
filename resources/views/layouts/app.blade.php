<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<html lang="en">
<head>
    <title>Blogger</title>

    <!-- CSS And JavaScript -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"
            integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ"
            crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light justify-content-between">
    <a class="navbar-brand mx-auto" href="/">Blogger</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                @auth
                @if(Auth::user()->is_admin)
                <li class="nav-item mr-3">
                    <a class="nav-link" href="/admin"><i class="far fa-user mr-2"></i>Hello, {{ Auth::user()->first_name
                        }}</a>
                </li>
                @else
                <li class="nav-item mr-3">
                    <a class="nav-link" href="/home/{{ Auth::user()->url }}"><i class="far fa-user mr-2"></i>Hello, {{ Auth::user()->first_name
                        }}</a>
                </li>
                @endif
                <li class="nav-item mr-3">
                    <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt"></i></a>
                </li>
                @else
                <li class="nav-item mr-3">
                    <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary" href="registration">Register</a>
                </li>
                @endif
            </ul>
        </div>
</nav>
<div class="container">
    @yield('content')
</div>


<!-- Footer -->
<footer class="page-footer font-small mt-5">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="/"> Blogger</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>
