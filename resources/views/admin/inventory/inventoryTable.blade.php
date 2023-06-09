{{-- Table --}}
<div class="container-fluid">
    @if (isset($inventories) && count($inventories) > 0)
        {{-- <button class="btn btn-danger btn-sm my-4 delete_all" data-url="{{ route('delete-selected-inventory') }}">Bulk
            Delete</button> --}}
        <div class="table-responsive-md">
            <table class="table datatable datatable-column-search-selects table-sm table-hover " id="ojt_flow">
                <thead class="bg-light table-group-divider table-divider-color">
                    <tr>
                        <th scope="col" class="text-center"><input type="checkbox" id="selector"></th>
                        <th scope="col" class="text-center">Thumbnail</th>
                        <th scope="col" class="text-center width-400">Name</th>
                        <th scope="col" class="text-center width-400">Color Identity</th>
                        <th scope="col" class="text-center width-400">Type</th>
                        <th scope="col" class="text-center">Frame Effects</th>
                        <th scope="col" class="text-center width-400">Finish</th>
                        <th scope="col" class="text-center width-400">Rarity</th>
                        <th scope="col" class="col-1 text-center"><a href="#sort" data-toggle="modal"
                                style="text-decoration: none; color:black;">Quantity</a></th>
                        <th scope="col" class="text-center width-400">TCG Mid</th>
                        <th scope="col" class="text-center">Total</th>
                        <th scope="col" class="text-center">Action</th>
                        @include('admin.inventory.action-popUp.sortQuantity')
                    </tr>


                </thead>

                <tbody>
                    {{-- Quantity Sorting --}}
                    @if (is_array($inventories) && count($inventories))
                        @foreach ($inventories as $item)
                            @include('admin.inventory.sort-list.inventoryRow')
                        @endforeach
                    @endif

                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Name</td>
                        <td>Color Identity</td>
                        <td>Type</td>
                        <td>Frame Effects</td>
                        <td>Finish</td>
                        <td>Rarity</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                </tfoot>
            </table>

        </div>
    @else
        {{-- <br>
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
        </div> --}}
        <div class="table-responsive-md">
            <table class="table datatable datatable-column-search-selects table-sm table-hover " id="ojt_flow">
                <thead class="bg-light table-group-divider table-divider-color">
                    <tr class="tr-background">
                        <th scope="col" class="text-center ">Selector</th>
                        <th scope="col" class="text-center ">Thumbnail</th>
                        <th scope="col" class="text-center ">Name</th>
                        <th scope="col" class="text-center ">Color Identity</th>
                        <th scope="col" class="text-center">Type</th>
                        <th scope="col" class="text-center">Frame Effects</th>
                        <th scope="col" class="text-center">Finish</th>
                        <th scope="col" class="text-center">Rarity</th>
                        <th scope="col" class="col-1 text-center"><a href="#sort" data-toggle="modal"
                                style="text-decoration: none; color:black;">Quantity</a></th>
                        <th scope="col" class="text-center">TCG Mid</th>
                        <th scope="col" class="text-center">Total</th>
                        <th scope="col" class="text-center">Action</th>
                        @include('admin.inventory.action-popUp.sortQuantity')
                    </tr>
                </thead>
            </table>
        </div>
    @endif



</div>
