@extends('layouts.admin')

@section('title', 'Logs')

@section('admin-content')


    <div class="card">
        <div class="card-body">
            <p>Welcome, {{ Auth::user()->name }}!</p>
            <br>
        </div>
    </div>

    <div class="col-lg-10 mx-auto">
        <div class="d-flex justify-content-between">
            <h1 class="my-4">Activity log</h1>
            <div class="col-auto">
                <button class="btn btn-success my-4" data-bs-target="#cache" data-bs-toggle="modal" data-bs-placement="top"
                    title="Counter">Counter<i class="fa fa-th ms-2"></i></button>
                @include('admin.dashboard.action-popUp.cache')
            </div>
        </div>


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
@endsection

@push('script')
    {{-- required script --}}
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

    {{-- custom script --}}
    <script src="{{ asset('js/admin/inventory.js') }}"></script>
@endpush
