<aside class="sidebar fixed-top vh-100 bg-secondary" style="width: 250px;">
    <ul class="list-unstyled components">
        @if (Auth::user()->role == 'admin')
            <li>
                <a class="nav-item nav-link mx-2" href="{{ route('adminPanel') }}">
                    <i class="fa fa-history" aria-hidden="true"></i> Admin Panel
                </a>
            </li>
        @endif
        <li>
            <a class="nav-item nav-link mx-2" href="{{ route('dashboard') }}"><i class="fa fa-history"
                    aria-hidden="true"></i> Activity Logs
            </a>
        </li>
        <li>
            <a class="nav-item nav-link mx-2" href="{{ route('inventoryTable') }}">
                <i class="fa fa-archive" aria-hidden="true"></i> Inventory
            </a>
        </li>
        <li>
            <a class="nav-item nav-link mx-2" href="{{ route('orders') }}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Orders
            </a>
        </li>

        <li>
            <a class="nav-item nav-link mx-2" href="{{ route('settings') }}">
                <i class="fa fa-cog" aria-hidden="true"></i> Settings
            </a>
        </li>

    </ul>
</aside>
