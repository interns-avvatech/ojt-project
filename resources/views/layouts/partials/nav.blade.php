<nav class="navbar navbar-expand-lg navbar-light bg-light col-lg-12">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">

            {{--@guest--}}
                <a class="nav-item nav-link mx-4" href="{{ route('login') }}">Login</a>
                <a class="nav-item nav-link mx-4" href="{{ route('register') }}">Register</a>
            {{--@else--}}

            {{--@endguest--}}


        </div>
    </div>
</nav>