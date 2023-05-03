<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- required css --}}
   

    <link rel="stylesheet" href="{{ asset('css/datatables.bootstrap4.min.css') }}">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


    {{--from template--}}
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/css/bootstrap.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/css/animate.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/css/main.css') }}">


    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/icons/weather/weather-icons.min.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/admin/icons/weather/weather-icons-wind.min.css') }}">


    @stack('style')
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">

</head>

<body id="top">


    @yield('content')


    {{-- required js dependencies --}}
    {{--<script src="{{ asset('js/jquery.js') }}"></script>--}}
    {{--<script src="{{ asset('js/jquery.ui.js') }}"></script>--}}
    {{--<script src="{{ asset('js/bootstrap.js') }}"></script>--}}
    {{--<script src="{{ asset('js/select2.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/datatables.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/datatables.bootstrap4.min.js') }}"></script>--}}

    <!-- Global scripts -->
<script src="{{ asset('js/admin/js/core/jquery/jquery.js') }}"></script>
<script src="{{ asset('js/admin/js/core/jquery/jquery.ui.js') }}"></script>
<script src="{{ asset('js/admin/js/core/tether.min.js') }}"></script>
<script src="{{ asset('js/admin/js/core/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('js/admin/js/core/bootstrap/jasny_bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin/js/core/navigation/nav.accordion.js') }}"></script>
<script src="{{ asset('js/admin/js/core/hammer/hammerjs.js') }}"></script>
<script src="{{ asset('js/admin/js/core/hammer/jquery.hammer.js') }}"></script>
<script src="{{ asset('js/admin/js/core/slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/admin/js/extensions/smart-resize.js') }}"></script>
<script src="{{ asset('js/admin/js/extensions/blockui.min.js') }}"></script>
<script src="{{ asset('js/admin/js/forms/uniform.min.js') }}"></script>
<script src="{{ asset('js/admin/js/forms/switchery.js') }}"></script>
<script src="{{ asset('js/admin/js/forms/select2.min.js') }}"></script>
<script src="{{ asset('js/admin/js/plugins/ekko-lightbox.min.js') }}"></script>
<!-- /Global-->
<script src="{{ asset('js/admin/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('js/admin/js/pages/tables/datatable_advanced.js') }}"></script>
<!-- Core scr-->
<script src="{{ asset('js/admin/js/core/app/layouts.js') }}"></script>
<script src="{{ asset('js/admin/js/core/app/core.js') }}"></script>
   


    {{-- custom js --}}
    @stack('script')




</body>

</html>
