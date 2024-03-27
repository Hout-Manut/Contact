<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Home</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#">Contact Management</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                @auth
                    <p class="login-box-msg">Welcome back, {{ Auth::user()->name }}</p>
                    <a href="{{ route('contacts.home') }}"><button type="submit"
                            class="btn btn-primary btn-block">Home</button></button></a>
                    <br>
                    <p class="mb-1">
                    <form action="/logout">
                        @csrf
                        <button type="submit" class="btn btn-secondary btn-block">Logout</button>
                    </form>
                    </p>
                @else
                    <p class="login-box-msg">Welcome to the Contact Management System</p>
                    <a href="/login"><button type="submit" class="btn btn-primary btn-block">Login</button></button></a>
                    <br>
                    <a href="/register"><button type="submit"
                            class="btn btn-primary btn-block">Register</button></button></a>
                    <br>
                    <p class="mb-1">
                        <a href="/forgot">I forgot my password</a>
                    </p>
                @endauth
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
