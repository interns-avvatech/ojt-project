@extends('layouts.admin')
@section('title', 'Settings')
@section('admin-content')


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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection