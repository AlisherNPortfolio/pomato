<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ checked_asset('client/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ checked_asset('client/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ checked_asset('client/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ checked_asset('client/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ checked_asset('client/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ checked_asset('client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ checked_asset('client/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    @yield('styles')
</head>
<!-- body -->

<body class="main-layout ">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ checked_asset('client/images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    @include('client.layouts.components.header')

    @yield('content')
    <!-- footer -->
    @include('client.layouts.components.footer')
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ checked_asset('client/js/jquery.min.js') }}"></script>
    <script src="{{ checked_asset('client/js/popper.min.js') }}"></script>
    <script src="{{ checked_asset('client/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ checked_asset('client/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ checked_asset('client/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ checked_asset('client/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ checked_asset('client/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ checked_asset('client/js/custom.js') }}"></script>
    <!-- javascript -->
    <script src="{{ checked_asset('client/js/owl.carousel.js') }}"></script>

    {{-- <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script> --}}
    @yield('scripts')
</body>

</html>
