<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ config('app.name', 'Brookestone') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap_4.1.3.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/meanmenu.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/dashboard_fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all_5.10.20.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('slick/slick.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- BEGIN PAGE LEVEL STYLES -->
    @yield('PAGE_LEVEL_STYLES')
    <!-- END PAGE LEVEL STYLES -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/bootstrap_4.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>

</head>
<body>
    <!-- BEGIN PAGE START SECTION -->
    @yield('PAGE_START')
    <!-- END PAGE START SECTION -->


    @include('includes.header')

    @yield('content')


    @if (request()->cookie('cookies_agree', '1'))
        @include('includes.cookie')
    @endif

    <!-- BEGIN PAGE END SECTION -->
    @yield('PAGE_END')
    <!-- END PAGE END SECTION -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->


    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    @yield('PAGE_LEVEL_SCRIPTS')
    <!-- END PAGE LEVEL SCRIPTS -->
    
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <script src="{{asset('js/jquery.meanmenu.js')}}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.meanmenu-div .menamenu-nav').meanmenu({
                meanScreenWidth: '991'
            });
        });
    </script>
</body>
</html>