<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Admin Panel | {{isset($route_name) ?  ucfirst(strtok($route_name, '.')) : ''}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Flag Icon -->
    <link rel="stylesheet" href="{{asset('assets/Admin/Flag-Icon/css/flag-icon.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/sweetalert2/sweetalert2.min.css')}}">
    <script src="{{asset('assets/Admin/AdminLTE/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Admin/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Main Page Wrapper -->
    <div class="wrapper">
        @yield('administrator')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/Admin/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('assets/Admin/AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/Admin/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('assets/Admin/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/Admin/AdminLTE/dist/js/adminlte.js')}}"></script>

    <!-- DataTables Script -->
    <script src="{{asset('assets/Admin/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/Admin/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/Admin/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/Admin/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/Admin/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <!-- End DataTables Script -->

    {{-- User Script --}}
    @stack('home-user')
    @stack('form-user')

    {{-- Role Script --}}
    @stack('home-role')
    @stack('form-role')

</body>

</html>
