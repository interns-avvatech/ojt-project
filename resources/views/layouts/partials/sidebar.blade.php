<div class="text-center text-white" style="margin-bottom: 6rem">

</div>

<div class="left-aside-container" style="overflow: hidden; width: 220px; ">

    <ul class="list-unstyled components">
        <li class="my-4 text-center">
            <a class="nav-item nav-link mx-2 text-white" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        {{--@if (Auth::user()->role == 'admin')
        <li class="my-4 text-center">
            <a class="nav-item nav-link mx-2 text-white" href="{{ route('adminPanel') }}">Admin Panel</a>
        </li>
        @endif--}}
        <li class="my-4 text-center">
            <a class="nav-item nav-link mx-2 text-white" href="{{ route('inventoryTable') }}">Inventory</a>
        </li>
        <li class="my-4 text-center">
            <a class="nav-item nav-link mx-2 text-white" href="{{ route('shipping') }}">Shipping</a>
        </li>
        <li class="my-4 text-center">
            <a class="nav-item nav-link mx-2 text-white" href="{{ route('orders') }}">Orders</a>
        </li>
        <li class="my-4 text-center">
            <a class="nav-item nav-link mx-2 text-white" href="{{ route('settings') }}">Settings</a>
        </li>


    </ul>

</div>
