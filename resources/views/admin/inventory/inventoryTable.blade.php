{{-- Table --}}
<div class="container-fluid px-5">
    @if (isset($inventories) && count($inventories) > 0)
        <button class="btn btn-danger btn-sm my-4 delete_all" data-url="{{ route('delete-selected-inventory') }}">Bulk
            Delete</button>
        <div class="table-responsive-md">
            <table class="table  datatable datatable-column-search-selects table-sm table-hover " id="ojt_flow">
                <thead class="bg-light table-group-divider table-divider-color">
                    <tr class="tr-background">
                        <th scope="col" class="text-center ">Selector</th>
                        <th scope="col" class="text-center ">Thumbnail</th>
                        <th scope="col" class="text-center ">Name</th>
                        <th scope="col" class="text-center ">Color Identity</th>
                        <th scope="col"  class="text-center">Type</th>
                        <th scope="col" class="text-center">Frame Effects</th>
                        <th scope="col" class="text-center">Finish</th>
                        <th scope="col" class="text-center">Rarity</th>
                        <th scope="col" class="col-1 text-center"><a href="#sort" data-toggle="modal"
                                style="text-decoration: underline; color:black;">Quantity</a></th>
                        <th scope="col" class="text-center">TCG Mid</th>
                        <th scope="col" class="text-center">Total</th>
                        <th scope="col" class="text-center">Action</th>
                        @include('admin.inventory.action-popUp.sortQuantity')
                    </tr>

                   
                </thead>

                <tbody>
                    @if (is_array($inventories) && count($inventories))
                        @foreach ($inventories as $item)
                            @include('admin.inventory.sort-list.inventoryRow')
                        @endforeach
                    @endif

                </tbody>
                <tfoot>
                    <tr >
                        <td></td>
                        <td></td>
                        <td class="width-400">Name</td>
                        <td class="width-100">Color Identity</td>
                        <td class="width-400">Type</td>
                        <td class="width-400">Frame Effects</td>
                        <td class="width-200">Finish</td>
                        <td class="width-200">Rarity</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     
                    </tr>

                </tfoot>
            </table>

        </div>
        
    @else
        <br>
        <div class="table-responsive-md">
            {{-- <div class="row justify-content-center align-items-center">
                <div class="col-lg-8 text-center p-5">
                    <img src="https://icon-library.com/images/no-data-icon/no-data-icon-0.jpg" alt=""
                        style="widows: 100px; height: 100px;">
                    <br>
                    <br>
                    <h1>No data found. Please insert a CSV file.</h1>
                </div>
            </div> --}}
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
                        <th scope="col" class="col-1 text-center"><a href="#sort" data-toggle="modal"
                                style="text-decoration: underline; color:black;">Quantity</a></th>
                        <th scope="col" class="text-center">TCG Mid</th>
                        <th scope="col" class="text-center">Total</th>
                        <th scope="col" class="text-center">Action</th>
                        @include('admin.inventory.action-popUp.sortQuantity')
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td colspan="12" class="text-center">Upload Data</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    @endif
</div>
