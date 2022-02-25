<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Stexo - Responsive Admin & Dashboard Template | Themesdesign</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('public/admin/assets/images/favicon.ico')}}">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/plugins/morris/morris.css')}}">
    <link href="{{ asset('public/admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/admin/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/admin/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    {{-- Toggle Button  --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="{{ asset('public/admin/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!--Style-->
    <style>
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }

        .switch input {
          opacity: 0;
          width: 0;
          height: 0;
        }

        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }

        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }

        input:checked + .slider {
          background-color: #2196F3;
        }

        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }

        .slider.round:before {
          border-radius: 50%;
        }
        </style>
    @yield('style')
</head>
<body>
    <!-- Begin page -->
    <div id="wrapper">
        {{-- Header  --}}
        @include('admin.includes.header')
        {{-- Sidebar  --}}
        @include('admin.includes.left-sidebar')
        {{-- Main Content--}}
        @yield('main')
    </div>
    <!-- jQuery  -->
    <script src="{{ asset('public/admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/validation.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/metismenu.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/waves.min.js')}}"></script>
    <!--Morris Chart-->
    <script src="{{ asset('public/admin/assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/pages/dashboard.init.js')}}"></script>
    <!-- Required datatable js -->
    <script src="{{ asset('public/admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('public/admin/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{ asset('public/admin/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
    {{-- Toggle Button  --}}
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('public/admin/assets/pages/datatables.init.js')}}"></script>
    <!-- App js -->
    <script src="{{ asset('public/admin/assets/js/app.js')}}"></script>
    @yield('script')
</body>
</html>
