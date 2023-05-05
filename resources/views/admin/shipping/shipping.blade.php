@extends('layouts.admin')
@section('title', 'Settings')
@section('admin-content')


    <div class="col-lg-12 col-sm-4">

        <div class="d-flex justify-content-between">
            <h1 class="my-4 font-weight-semibold">Shipping</h1>
        </div>

        <div class="card card-inverse card-flat border-none p-b-10">
            <div class="card-block p-b-10">
                <table class="table" id='shipping-table'>
                    <thead>
                        <tr>
                            <th scope="col" style="width:10px"><input type="checkbox" id="selector"></th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Sold To</th>
                            <th scope="col">Shipping Date</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($checkouts as $checkout)
                            <tr>
                                <th style="width:10px"><input class="sub_chk" type="checkbox"></th>
                                <td>{{ $checkout['checkout_id'] }}</td>
                                <td>{{ $checkout['sold_to'] }}</td>
                                <td>{{ $checkout['created_at'] }}</td>
                                <td>{{ $checkout['total'] }}</td>
                                <td>
                                    <form action="">
                                        <button type="button" class="btn" data-toggle="modal"
                                            data-target="{{ '#view-order' }}"><i class='fa fa-eye'></i></button>
                                        @include('admin.shipping.shipping-modals.view-modal')
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
     

    </div>
@endsection
