@extends('layouts.app')

@section('content')
<div>
    @include('layouts.partials.nav')
    @yield('admin-content')
</div>
@endsection
