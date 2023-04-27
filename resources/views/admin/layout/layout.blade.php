<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">

</head>

<body>

    {{-- page content --}}
    @yield('content')

    {{-- required js dependencies --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- custom js --}}
    <script src="{{ asset('js/admin/inventory.js') }}"></script>
    <script src="{{ asset('js/admin/order.js') }}"></script>
    <script src="{{ asset('js/admin/settings.js') }}"></script>

</body>

</html>
