<nav class="navbar navbar-expand-lg navbar-light bg-light col-lg-12">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link mx-2" href="{{ route('dashboard') }}">Activity Logs
                <i class="fa fa-history" aria-hidden="true"></i>
            </a>
            <a class="nav-item nav-link mx-2" href="{{ route('inventoryTable') }}">Inventory
                <i class="fa fa-archive" aria-hidden="true"></i>
            </a>
            <a class="nav-item nav-link mx-2" href="{{ route('orders') }}">Orders
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
            <a class="nav-item nav-link mx-2" href="{{ route('settings') }}">Settings
                <i class="fa fa-cog" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</nav>