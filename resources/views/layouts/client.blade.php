@extends('layouts.app')

@section('content')
<div>
    @include('layouts.partials.nav')
    @yield('client-content')
</div>
@endsection