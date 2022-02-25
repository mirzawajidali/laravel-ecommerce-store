<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Stexo - Responsive Admin & Dashboard Template | Themesdesign</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        {{-- CSS Style  --}}
        <link rel="shortcut icon" href="{{ asset('public/admin/assets/images/favicon.ico')}}">
        <link href="{{ asset('public/admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/admin/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/admin/assets/css/style.css')}}" rel="stylesheet" type="text/css">
        @yield('style')
    </head>
    <body>
        @yield('auth-content')
        <!-- jQuery  -->
        <script src="{{ asset('public/admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('public/admin/assets/js/validation.js') }}"></script>
        <script src="{{ asset('public/admin/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('public/admin/assets/js/metismenu.min.js')}}"></script>
        <script src="{{ asset('public/admin/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('public/admin/assets/js/waves.min.js')}}"></script>
        <!-- App js -->
        <script src="{{ asset('public/admin/assets/js/app.js')}}"></script>
        @yield('script')
    </body>
</html>
