@extends('layouts.admin')
@section('title', 'Orders')
@section('admin-content')
    <div class="mx-4">
        <h1 class="my-4">Orders</h1>

        <button class="btn btn-danger btn-sm my-4 delete_all" data-url="{{ route('delete-selected-order') }}">Bulk
            Delete</button>

        <table class="table datatable datatable-column-search-selects table-sm table-hover" id='order-table'>
            <thead class="bg-light table-group-divider table-divider-color">
                <tr>
                    <th scope="col"><input type="checkbox" id="selector"></th>
                    <th scope="col">Sold Date</th>
                    <th scope="col">Product Name</th>

                    <th scope="col">Product ID</th>
                    <th scope="col">Finish</th>
                    <th scope="col">Sold Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sold To</th>
                    <th scope="col">Set</th>
                    <th scope="col">TCG MID</th>
                    <th scope="col">Ship Cost</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Note</th>
                    <th scope="col">Ship Price</th>
                    <th scope="col">Tracking Number</th>
                    <th scope="col">Multiplier</th>
                    <th scope="col">Multiplier Price</th>
                    <th scope="col">ID</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>

                @if (is_array($orders) && count($orders))
                    @foreach ($orders as $order)
                        <tr id="tr_{{ $order['id'] }}">
                            <th><input class="sub_chk" data-id="{{ $order['id'] }}" type="checkbox"></th>

                            <td>{{ $order['sold_date'] }}</td>


                            <td>{{ $order['card_name'] }}</td>
                            <td>{{ $order['tcgplacer_id'] }}</td>
                            <td>{{ $order['finish'] }}</td>

                            <td>
                                @foreach ($settings['currency_option'] as $currency)
                                    @if ($settings['sold_price'] === $currency['id'])
                                        {{ $currency['symbol'] . $order['sold_price'] }}
                                    @endif
                                @endforeach
                            </td>

                            <td class="text-center align-middle col-1">
                                <div class="btn-group" role="group" aria-label="Quantity">
                                    <form method="post" action="{{ route('order.down', $order['id']) }}"
                                        class="disable-form">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-outline-secondary rounded-pill btn-sm disable-quantity"><i
                                                class="icon-minus2"></i></button>
                                    </form>
                                    <span class="mx-3 qty">{{ $order['qty'] }}</span>
                                    <form method="post" action="{{ route('order.up', $order['id']) }}"
                                        class="disable-form">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-outline-secondary rounded-pill btn-sm disable-quantity"><i
                                                class="icon-plus2"></i></button>
                                    </form>
                                </div>
                            </td>


                            <td>{{ $order['sold_to'] }}</td>
                            <td>{{ $order['set'] }}</td>
                            <td>
                                @foreach ($settings['currency_option'] as $currency)
                                    @if ($settings['tcg_mid'] === $currency['id'])
                                        {{ $currency['symbol'] . number_format(floatVal($order['tcg_mid']), 2, '.', ',') }}
                                    @endif
                                @endforeach
                            </td>


                            <td>
                                @foreach ($settings['currency_option'] as $currency)
                                    @if ($settings['ship_cost'] === $currency['id'])
                                        {{ $currency['symbol'] . number_format(floatVal($order['ship_cost']), 2, '.', ',') }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($settings['status'] as $status)
                                    @if (intval($order['payment_status']) === $status['id'])
                                        {{ $status['status'] }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $order['payment_method'] }}</td>
                            <td>{{ $order['note'] }}</td>
                            <td>{{ $order['ship_price'] }}</td>

                            <td>{{ $order['tracking_number'] }}</td>
                            <td>{{ $order['multiplier'] }}</td>
                            <td>{{ $order['multiplier_price'] }}</td>
                            <td>{{ $order['product_id'] }}</td>


                            <td style="width:10PX">
                                <button type="button" class="btn" data-toggle="modal"
                                    data-target="{{ '#edit-order' . $order['id'] }}"><i class='fa fa-pencil'></i></button>
                                @include('admin.orders.order-modals.edit-modal')

                                <button type="button" class="btn" data-toggle="modal"
                                    data-target="{{ '#order' . $order['id'] }}"><i class='fa fa-undo'></i></button>
                                @include('admin.orders.order-modals.delete-modal')
                            </td>
                        </tr>
                    @endforeach
            <tfoot>
                <th>Total</th>

                <th>
                    <button type="button" class="btn" data-toggle="modal" data-target="#checkout{{ $order['id'] }}"><i
                            class='fa fa-shopping-bag'></i></button>
                    @include('admin.orders.order-modals.checkout-modal')
                </th>

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
                <td></td>


            </tfoot>
            @endif


            </tbody>
        </table>
    </div>
    <h1>Shipping Location Selection</h1>

    <button class="click">click me</button>

@endsection

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
@endpush
@push('script')
    {{-- required script --}}

    {{-- 
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script> --}}
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

    {{-- custom script --}}
    <script src="{{ asset('js/admin/order.js') }}"></script>
    <script>
        $(function() {
            $('#order-table').DataTable({
                "lengthMenu": [50, 100, 200, 500],
                dom: 'Bfrtip',
                buttons: [
                    'pageLength',
                    'excelHtml5',
                    {
                        extend: 'colvis',
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
                        columnText: function(dt, idx, title) {
                            return (idx) + ': ' + title;
                        }
                    }
                ],
                columnDefs: [{
                    targets: [7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
                    visible: false
                }],
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api(),
                        data;

                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$₱\,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };

                    //columns
                    //sold price
                    var column6total = api
                        .column(5)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);


                    //qty
                    var column7total = api
                        .column(6)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var column8total = api
                        .column(8)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var column9total = api
                        .column(9)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);




                    // footer column 5
                    $(api.column(5).footer()).html(`<b>
            <?php
            foreach ($settings['currency_option'] as $currency):
                if ($settings['sold_price'] === $currency['id']):
                    echo $currency['symbol'];
                endif;
            endforeach;
            ?> 
            ${column6total.toLocaleString(undefined, { minimumFractionDigits: 2 })}</b>`);

                    // footer total qty
                    $(api.column(6).footer()).html(`<b>${column7total}</b>`);

                    // footer column 8
                    $(api.column(8).footer()).html(`<b>
            <?php foreach ($settings['currency_option'] as $currency):
                if ($settings['sold_price'] === $currency['id']):
                    echo $currency['symbol'];
                endif;
            endforeach;
            ?> 
            ${column8total.toLocaleString(undefined, { minimumFractionDigits: 2 })}</b>`);

                    // footer column 9
                    $(api.column(9).footer()).html(`
            <?php foreach ($settings['currency_option'] as $currency):
                if ($settings['ship_cost'] === $currency['id']):
                    echo $currency['symbol'];
                endif;
            endforeach; ?> 
            <b>${column9total.toLocaleString(undefined, { minimumFractionDigits: 2 })}</b>`);
                }


            });



          
        })
    </script>
@endpush
