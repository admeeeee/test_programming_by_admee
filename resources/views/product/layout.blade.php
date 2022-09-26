<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>laravel Simple Crud</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{asset('Admin_LTE/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin_LTE/dist/css/adminlte.min.css?v=3.2.0')}}">
    <link rel="stylesheet" href="{{asset('sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{asset('toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{asset('Admin_LTE/plugins/jquery-ui/jquery-ui.css')}}">

</head>

<body class="hold-transition sidebar-mini">


            <div class="content">
                @yield('content')
            </div>



    <script src="{{asset('Admin_LTE/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('Admin_LTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Admin_LTE/dist/js/adminlte.min.js?v=3.2.0')}}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script src="{{asset('Admin_LTE/plugins/jquery-ui/jquery-ui.js')}}"></script>

    @yield('script')
</body>

</html>