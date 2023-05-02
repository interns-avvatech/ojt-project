@extends('layouts.app')

@section('content')
<div class="wrapper w-100">

    {{--sidebar--}}
    @include('layouts.partials.sidebar')

    <div class="content-wrapper position-relative" style="margin-left: 250px">

        {{--headbar--}}
        @include('layouts.partials.headbar')

        <section class="content vh-100" style="overflow-x: auto;">
            <div class="container-fluid">
                @yield('admin-content')
            </div>
        </section>

    </div>
</div>

@endsection