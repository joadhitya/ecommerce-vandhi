<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Vandhi E-Commerce</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/responsive.css')}}">

    <style>
        .form-control{
            height: 45px!important;
        }
    </style>
    @stack('page-styles')
</head>


<body class="">
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
        @include('admin.layouts.sidebar')
        <div class="main-content">
            @include('admin.layouts.header')
            @yield('content')
        </div>


    </div>




    @yield('modal')
    @stack('before-scripts')
    <!-- JAVA SCRIPT -->
    {{-- <script src="{{asset('assets/admin/js/vendor/jquery-2.2.4.min.js')}}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.slicknav.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];

    </script>
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="{{asset('assets/admin/js/line-chart.js')}}"></script>
    <script src="{{asset('assets/admin/js/pie-chart.js')}}"></script>
    <script src="{{asset('assets/admin/js/plugins.js')}}"></script>
    <script src="{{asset('assets/admin/js/scripts.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @stack('page-scripts')
</body>
