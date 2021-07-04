<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{__('auth.login.meta-title')}}</title>
    <link rel="icon" href="{{Storage::url('assets/Image/Brand/laravel-logo.png')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Flag Icon -->
    <link rel="stylesheet" href="{{asset('assets/Admin/Flag-Icon/css/flag-icon.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">

    @yield('login')
    @yield('register')
    @yield('email')
    @yield('verify')
    @yield('reset')
    @yield('home')

    <!-- jQuery -->
    <script src="{{asset('assets/Admin/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/Admin/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/Admin/AdminLTE/dist/js/adminlte.min.js')}}"></script>
</body>

</html>
