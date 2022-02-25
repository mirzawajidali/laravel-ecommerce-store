<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/styles/bootstrap4/bootstrap.min.css')}}">
    <link href="{{ asset('public/theme/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/plugins/slick-1.8.0/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/styles/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/styles/style.css')}}">

</head>
<body>
    <div class="super_container">
    {{-- Header  --}}
    @include('frontend.includes.header')
    {{-- Main --}}
    @yield('main-content')
    {{-- Footer  --}}
    @include('frontend.includes.footer')
    </div>
    <script src="{{ asset('public/theme/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('public/theme/styles/bootstrap4/popper.js')}}"></script>
    <script src="{{ asset('public/theme/styles/bootstrap4/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/theme/plugins/greensock/TweenMax.min.js')}}"></script>
    <script src="{{ asset('public/theme/plugins/greensock/TimelineMax.min.js')}}"></script>
    <script src="{{ asset('public/theme/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
    <script src="{{ asset('public/theme/plugins/greensock/animation.gsap.min.js')}}"></script>
    <script src="{{ asset('public/theme/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
    <script src="{{ asset('public/theme/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
    <script src="{{ asset('public/theme/plugins/slick-1.8.0/slick.js')}}"></script>
    <script src="{{ asset('public/theme/plugins/easing/easing.js')}}"></script>
    <script src="{{ asset('public/theme/js/custom.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-23581568-13');
    </script>
</body>
</html>
