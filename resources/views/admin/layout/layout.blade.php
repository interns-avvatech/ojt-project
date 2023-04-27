<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- required css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">

    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">

</head>

<body>

    {{-- page content --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- required js dependencies --}}
    <script src="{{ asset('js/app.js') }}"></script>
    

    {{-- custom js --}}
    @stack('script')
  
</body>

</html>
