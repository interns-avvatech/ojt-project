@extends('layouts.admin')

@section('title', 'Dashboard')

@section('admin-content')


<div class="col-lg-12">
    <div class="d-flex justify-content-between">
        <h1 class="my-4 font-weight-semibold">Dashboard</h1>
    </div>


    <div class="row">
        <div class="col-lg-4 col-sm-4">

            <!-- total orders -->
            <div class="card card-inverse card-flat" style="background-color: #0CC2AA">
                <div style="padding: .75rem 1.25rem;">
                    <h5 class="text-uppercase text-semibold text-alpha-4">Total Orders</h5>
                </div>
                <div class="card-block">
                    <div class="row m-b-10">
                        <div class="col-lg-3 col-sm-3 col-4">
                            <i class="icon-cart2 x6 text-alpha-2"></i>
                        </div>
                        <div class="col-lg-9 col-sm-9 col-8">
                            <div class="x4 text-light no-line-height text-alpha-9 text-right">463<i class="icon-arrow-up16 x2 text-alpha-6 position-right"></i></div>
                        </div>
                    </div>
                    <h6 class="text-alpha-5 float-left m-t-5 m-b-5">Completed orders</h6>
                    <h6 class="text-bold text-alpha-7 float-right m-t-5 m-b-5">240</h6>
                    <div class="clearfix"></div>
                    <h6 class="text-alpha-5 float-left m-t-5 m-b-5">Cancelled orders</h6>
                    <h6 class="text-bold text-alpha-7 float-right m-t-5 m-b-5">3%</h6>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /total orders -->

        </div>
        <div class="col-lg-4 col-sm-4">

            <!-- Total orders -->
            <div class="card card-inverse card-flat" style="background-color: #FCC100 ">
            <div style="padding: .75rem 1.25rem;">
                    <h5 class="text-uppercase text-semibold text-alpha-8">Total Sales</h5>
                </div>
                <div class="card-block">
                    <div class="row m-b-10">
                        <div class="col-lg-3 col-sm-3 col-4">
                            <i class="icon-price-tags x6 text-alpha-4"></i>
                        </div>
                        <div class="col-lg-9 col-sm-9 col-8">
                            <div class="x4 text-light no-line-height text-right">1,264</div>
                        </div>
                    </div>
                    <h6 class="text-alpha-7 float-left m-t-5 m-b-5">This month</h6>
                    <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">126</h6>
                    <div class="clearfix"></div>
                    <h6 class="text-alpha-7 float-left m-t-5 m-b-5">Last month</h6>
                    <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">98</h6>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /Total orders -->

        </div>
        <div class="col-lg-4 col-sm-4">

            <!-- total products -->
            <div class="card card-inverse card-flat" style="background-color: #6887FF">
                <div style="padding: .75rem 1.25rem;">
                    <h5 class="text-uppercase text-semibold text-alpha-8">Total Products</h5>
                </div>
                <div class="card-block">
                    <div class="row m-b-10">
                        <div class="col-lg-3 col-sm-3 col-4">
                            <i class="icon-coin-dollar x6 text-alpha-4"></i>
                        </div>
                        <div class="col-lg-9 col-sm-9 col-8">
                            <div class="x4 text-light no-line-height text-right"><small class="x2 position-left">$</small>40,268</div>
                        </div>
                    </div>
                    <h6 class="text-alpha-7 float-left m-t-5 m-b-5">This month</h6>
                    <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">$4,206</h6>
                    <div class="clearfix"></div>
                    <h6 class="text-alpha-7 float-left m-t-5 m-b-5">Last month</h6>
                    <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">$3,980</h6>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- /total products -->

        </div>
    </div>


    {{--orders statistics--}}
    <div class="row">
        <div class="col-lg-12 col-sm-4">
            @include('admin.dashboard.partials.chart')
        </div>
    </div>

    {{--activity logs--}}

    <div class="row my-4">
        <div class="col-lg-12 col-sm-4">

            <div class="card card-inverse card-flat border-none p-b-10">
                <div class="card-block p-b-10">
                    <div class="card-title text-uppercase float-left p-b-30 p-t-12 font-weight-bold">Activity Logs</div>
                    <table class="table" id='order-table'>
                        <thead>
                            <tr>
                                <th scope="col">Event</th>
                                <th scope="col">Card ID</th>
                                <th scope="col">Quantity Old</th>
                                <th scope="col">Quantity New</th>
                                <th scope="col">Price Old</th>
                                <th scope="col">Price New</th>
                                <th scope="col">Date and Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($logs))
                            @foreach ($logs as $log)
                            <tr>
                                <td>{{ $log['event'] }}</td>
                                <td>{{ $log['properties']['old']['product_id'] }}</td>
                                <td>{{ $log['properties']['old']['quantity'] }}</td>
                                <td>{{ $log['properties']['attributes']['quantity'] }}</td>
                                <td>{{ $log['properties']['old']['price_each'] }}</td>
                                <td>{{ $log['properties']['attributes']['price_each'] }}</td>
                                <td>{{ $log['updated_at'] }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>No Logs</tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


</div>
@endsection

@push('script')
{{-- required script --}}
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

{{-- custom script --}}
<script src="{{ asset('js/admin/inventory.js') }}"></script>
@endpush