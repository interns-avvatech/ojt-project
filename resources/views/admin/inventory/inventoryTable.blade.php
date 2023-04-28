{{-- Table --}}
<div class="container-fluid px-5">
    @if (isset($inventories) && count($inventories) > 0)
        <button class="btn btn-danger btn-sm my-4 delete_all" data-url="{{ route('delete-selected-inventory') }}">Bulk
            Delete</button>
        <div class="table-responsive-md">
            <table class="table table-sm table-hover bg-white" id="ojt_flow">
                <thead class="bg-light table-group-divider table-divider-color">
                    <tr class="tr-background">
                        <th scope="col" class="text-center width-50">Selector</th>
                        <th scope="col" class="text-center width-200">Thumbnail</th>
                        <th scope="col" class="text-center width-200">Name</th>
                        <th scope="col" class="text-center width-120">Color Identity</th>
                        <th scope="col" class="text-center">Type</th>
                        <th scope="col" class="text-center">Frame Effects</th>
                        <th scope="col" class="text-center">Finish</th>
                        <th scope="col" class="text-center">Rarity</th>
                        <th scope="col" class="col-1 text-center"><a href="#sort" data-bs-toggle="modal"
                                style="text-decoration: none; color:black;">Quantity</a></th>
                        <th scope="col" class="text-center">TCG Mid</th>
                        <th scope="col" class="text-center">Total</th>
                        <th scope="col" class="text-center">Action</th>
                        @include('admin.inventory.action-popUp.sortQuantity')
                    </tr>

                    {{-- Search --}}
                    <tr>
                        <td scope="col" class="text-center" style="opacity: 0"></td>
                        <td scope="col" class="text-center" style="opacity: 0">Thumbnail</td>
                        <td scope="col" class="text-center">Name</td>
                        <td scope="col" class="text-center width-120">Color Identity</td>
                        <td scope="col" class="text-center">Type</td>
                        <td scope="col" class="text-center">Frame Effects</td>
                        <td scope="col" class="text-center">Finish</td>
                        <td scope="col" class="text-center">Rarity</td>
                        <td scope="col" class="col-1 text-center"><a href="#sort" data-bs-toggle="modal"
                                style="text-decoration: none; color:black;">Quantity</a></td>
                        <td scope="col" class="text-center">TCG Mid</td>
                        <td scope="col" class="text-center">Total</td>
                        <td scope="col" class="text-center" style="opacity: 0"></td>
                    </tr>
                </thead>

                <tbody>
                    @if (is_array($inventories) && count($inventories))
                        @foreach ($inventories as $item)
                            {{-- Quantity Sorting --}}
                            @if ($condition == '=' && $item['quantity'] == $value)
                                    @include('admin.inventory.sort-list.inventoryRow')
                            @elseif ($condition == '<' && $item['quantity'] < $value)
                                    @include('admin.inventory.sort-list.inventoryRow')
                            @elseif ($condition == '<=' && $item['quantity'] <= $value)
                                    @include('admin.inventory.sort-list.inventoryRow')
                            @elseif ($condition == '>' && $item['quantity'] > $value)
                                    @include('admin.inventory.sort-list.inventoryRow')
                            @elseif ($condition == '>=' && $item['quantity'] >= $value)
                                    @include('admin.inventory.sort-list.inventoryRow')
                            @else
                                @include('admin.inventory.sort-list.inventoryRow')
                            @endif
                        @endforeach
                    @endif

                </tbody>
                <tfoot>

                </tfoot>
            </table>

        </div>
    @else
        <br>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8 text-center p-5">
                    <img src="https://icon-library.com/images/no-data-icon/no-data-icon-0.jpg" alt=""
                        style="widows: 100px; height: 100px;">
                    <br>
                    <br>
                    <h1>No data found. Please insert a CSV file.</h1>
                </div>
            </div>
        </div>
    @endif
</div>
