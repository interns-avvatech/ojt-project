@extends('layouts.admin')
@section('title', 'Cart')
@section('admin-content')

<div class="col-lg-12">
    <h1 class="my-4">Your Cart</h1>


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-block">
                    <div class="card-title text-uppercase float-left p-b-30  font-weight-bold">Your Cart</div>



                    <table class="table" id='order-table'>
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">Image</th>
                                <th scope="col">Product Info</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <div class="card-title text-uppercase font-weight-bold">Cart Summary</div>
                    <hr>
                    <div class="text-uppercase ">Total Cart Price</div>
                    <div class="text-uppercase my-2"><p style="font-size: 40px;">$356</p></div>
                    <hr>
                    <div class="text-uppercase"><button class="btn btn-primary">Checkout</button></div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection