@extends('layouts.admin')

@section('title', 'Admin Panel')

@section('admin-content')

<div class="col-lg-12">
    <div class="d-flex justify-content-between">
        <h1 class="my-4 font-weight-semibold">Admin Panel</h1>
        <div>
            <button class="btn btn-success"> Members <span class="badge badge-danger rounded-pill ml-2">0</span></button>
            <button class="btn btn-warning"> Create Users <span class="badge badge-danger rounded-pill ml-2">0</span></button>
        </div>
    </div>

    <div class="card card-inverse card-flat border-none">
        <div class="card-block p-b-10">
            <p>Welcome, {{ Auth::user()->name }}!</p>
            <br>
        </div>
    </div>

</div>


@endsection