@extends('layouts.app')

@section('content')
<div id="body-wrapper" class="body-container" >


    {{--Sidebar--}}
    <aside class="fixed-top vh-100" style="width: 250px; background-color: #2E3E4E">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 220px;">

            @include('layouts.partials.sidebar')

            {{--<div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 8px; position: absolute; top: 0px; opacity: 0.3; display: none; border-radius: 3px; z-index: 99; right: 0px; height: 752px;">
            </div>
            <div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 3px; background: transparent; opacity: 0.3; z-index: 90; right: 0px;"></div>--}}
        </div>
    </aside>


    {{--page content--}}
    <section class="main-container content-wrapper" style="margin-left: 250px">

        {{--header content--}}
        <header class="main-nav clearfix sticky-top w-100">
            @include('layouts.partials.headbar')
        </header>


        {{--main content--}}
        <div class="container-fluid page-content" style="margin-top: 20px;">
            @yield('admin-content')
        </div>

    </section>


</div>


@endsection