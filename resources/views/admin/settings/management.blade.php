@extends('layouts.admin')
@section('title', 'Settings')
@section('admin-content')
    <div class="d-flex h-100">
        <div class="col-6 mx-auto align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="my-4">Settings</h2>
                <div>
                    <a href="{{ route('settings') }}" class="btn btn-sm btn-outline-secondary">Payment Setting</a>
                    <select id="mySelect" class="btn btn-sm btn-outline-secondary" onchange="location = this.value;">
                        <optgroup>User Setting</optgroup>
                        <option value="{{ route('manage') }}" {{ request()->routeIs('manage') ? 'selected' : '' }}>User
                            Management</option>
                        <option value="{{ route('create') }}" {{ request()->routeIs('create') ? 'selected' : '' }}>Create
                            User</option>
                        <option value="">Option 2</option>
                    </select>
                </div>
            </div>
            <hr>

            <div>
                <div class="card">
                    <div class="card-header">{{ __('User Management') }}</div>
                    <div class="card-block">
                        <table class="table datatable datatable-column-search-selects table-sm table-hover"
                            id='order-table'>
                            <thead class="bg-light table-group-divider table-divider-color">
                                <tr>
                                    <th><input type="checkbox" id="selector"  class="text-center"></th>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Date Created</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (is_array($users) && count($users))
                                    <tr>
                                     
                                    </tr>
                                @else
                                    @foreach ($users as $item)
                                    <tr>
                                        <td class="text-center"><input type="checkbox" id="selector"></td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role ? 'Staff' : 'Admin' }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a class="btn" data-target="" data-toggle="modal" data-placement="top" title="Delete "><i class="icon-pencil"></i></a>
                                            <a class="btn" data-target="" data-toggle="modal" data-placement="top" title="Delete "><i class="icon-trash"></i></a>
                                            {{-- @include('admin.inventory.action-popUp.action') --}}
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
