@extends('admin.layout.layout')
@section('title', 'Orders')
@section('content')
    <div class="mx-4">
        <h1 class="my-4">Orders</h1>

        <button class="btn btn-danger btn-sm my-4 delete_all" data-url="{{ route('delete-selected-order') }}">Bulk
            Delete</button>

        <table class="table" id='order-table'>
            <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="selector"></th>
                    <th scope="col">Sold Date</th>
                    <th scope="col">Sold To</th>
                    <th scope="col">Card Name</th>
                    <th scope="col">Set</th>
                    <th scope="col">Finish</th>
                    <th scope="col">TCG MID</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Sold Price</th>
                    <th scope="col">Ship Cost</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Note</th>
                    <th scope="col">Ship Price</th>
                    <th scope="col">TCG Player ID</th>
                    <th scope="col">Tracking Number</th>
                    <th scope="col">Multiplier</th>
                    <th scope="col">Multiplier Price</th>
                    <th scope="col">Product ID</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>

                @if ($orders->count())
                    @foreach ($orders as $order)
                        <tr id="tr_{{ $order->id }}">
                            <th><input class="sub_chk" data-id="{{ $order->id }}" type="checkbox"></th>
                            <td>{{ $order->sold_date }}</td>
                            <td>{{ $order->sold_to }}</td>
                            <td>{{ $order->card_name }}</td>
                            <td>{{ $order->set }}</td>
                            <td>{{ $order->finish }}</td>
                            <td>
                                @foreach ($settings['currency_option'] as $currency)
                                    @if ($settings['tcg_mid'] === $currency['id'])
                                        {{ $currency['symbol'] . number_format($order->tcg_mid, 2, '.', ',') }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $order->qty }}</td>
                            <td>
                                @foreach ($settings['currency_option'] as $currency)
                                    @if ($settings['sold_price'] === $currency['id'])
                                        {{ $currency['symbol'] . number_format($order->sold_price, 2, '.', ',') }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($settings['currency_option'] as $currency)
                                    @if ($settings['ship_cost'] === $currency['id'])
                                        {{ $currency['symbol'] . number_format($order->ship_cost, 2, '.', ',') }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($settings['status'] as $status)
                                    @if (intval($order->payment_status) === $status['id'])
                                        {{ $status['status'] }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->note }}</td>
                            <td>{{ $order->ship_price }}</td>
                            <td>{{ $order->tcgplacer_id }}</td>
                            <td>{{ $order->tracking_number }}</td>
                            <td>{{ $order->multiplier }}</td>
                            <td>{{ $order->multiplier_price }}</td>
                            <td>{{ $order->product_id }}</td>


                            <td class="">
                                <button type="button" class="btn" data-toggle="modal"
                                    data-target="{{ '#edit-order' . $order->id }}"><i class='fa fa-pencil'></i></button>
                                @include('admin.orders.order-modals.edit-modal')

                                <button type="button" class="btn" data-toggle="modal"
                                    data-target="{{ '#order' . $order->id }}"><i class='fa fa-undo'></i></button>
                                @include('admin.orders.order-modals.delete-modal')

                            </td>
                        </tr>
                    @endforeach
            <tfoot>
                <th>Total</th>
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
@endsection

@push('script')
    {{-- required script --}}
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

    {{-- custom script --}}
    <script src="{{ asset('js/admin/order.js') }}"></script>
@endpush
