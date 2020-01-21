<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/dev/AdminLTE/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Dec 2019 11:19:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JABP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('public')}}/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{url('public')}}/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('public')}}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{url('public')}}/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('public')}}/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('public')}}/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">


    {{--    DEV PART--}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public')}}/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha256-rByPlHULObEjJ6XQxW/flG2r+22R5dKiAoef+aXWfik=" crossorigin="anonymous" />

    <!-- Rumi added -->
    <link rel="stylesheet" href="{{url('public/assets/libs/multiselect/multi-select.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/libs/switchery/switchery.min.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/libs/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/libs/toastr/toastr.min.css')}}">

    @yield('css')
    @stack('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
