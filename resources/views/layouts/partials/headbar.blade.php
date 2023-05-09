<div class="navbar float-right navbar-toggleable-sm">
    <div class="clearfix">
        <ul class="float-right top-icons">
            <li><a href="{{ route('cart') }}" class="btn-top-search" style="width:5rem">
                <i class='fa fa-shopping-bag'></i>
                <span class="badge badge-danger rounded-pill" style="">0</span></a>
            </li>

            <li class="dropdown user-dropdown">
                <a href="#" class="btn-user dropdown-toggle hidden-xs-down" data-toggle="dropdown"><img src="http://via.placeholder.com/80x80" class="rounded-circle user" alt="" /></a>
                <a class="user-name hidden-xs-down" data-toggle="dropdown">{{ Auth::user()->name }}<small>{{ Auth::user()->role === 'admin' ? 'Administrator': Auth::user()->role }}</small></a>
                <a href="#" class="dropdown-toggle hidden-sm-up" data-toggle="dropdown"><i class="icon-more"></i></a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>