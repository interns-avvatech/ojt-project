<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- required css --}}


    <link rel="stylesheet" href="{{ asset('css/datatables.bootstrap4.min.css') }}">




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    {{-- from template --}}
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/icons/weather/weather-icons.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/icons/weather/weather-icons-wind.min.css') }}">


    @stack('style')
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">

</head>

<body id="top" style="background-color: rgba(221, 227, 227, 0.5);">


    @yield('content')


    {{-- required js dependencies --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.bootstrap4.min.js') }}"></script>





    {{-- custom js --}}
    @stack('script')




</body>

</html>
