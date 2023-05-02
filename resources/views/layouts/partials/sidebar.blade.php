<aside class="sidebar fixed-top vh-100 bg-secondary" style="width: 250px;">
    <ul class="list-unstyled components">
        @if (Auth::user()->role == 'admin')
        <li>
            <a class="nav-item nav-link mx-2" href="{{ route('adminPanel') }}">Admin Panel
                <i class="fa fa-history" aria-hidden="true"></i>
            </a>
        </li>
        @endif   
        <li>
            <a class="nav-item nav-link mx-2" href="{{ route('dashboard') }}">Activity Logs
                <i class="fa fa-history" aria-hidden="true"></i>
            </a>
        </li>
        <li>
            <a class="nav-item nav-link mx-2" href="{{ route('inventoryTable') }}">Inventory
                <i class="fa fa-archive" aria-hidden="true"></i>
            </a>
        </li>
        <li>
            <a class="nav-item nav-link mx-2" href="{{ route('orders') }}">Orders
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
        </li>
        
        <li>
            <a class="nav-item nav-link mx-2" href="{{ route('settings') }}">Settings
                <i class="fa fa-cog" aria-hidden="true"></i>
            </a>
        </li>
        
    </ul>
</aside>