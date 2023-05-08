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
                        <option value="{{route('manage')}}" {{request()->routeIs('manage') ? 'selected' : ''}}>User Management</option>
                        <option value="{{ route('create') }}" {{ request()->routeIs('create') ? 'selected' : '' }}>Create User</option>
                        <option value="">Option 2</option>
                    </select>
                </div>
            </div>
            <hr>

            <div>
                <div class="card">
                    <div class="card-header">{{ __('Create User') }}</div>
                    <div class="card-block">
                        <form method="post" action="{{ route('setting-register') }}">
                            @csrf
                            {{-- Name --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Role --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('User Role') }}</label>

                                <div class="col-md-6">

                                    <select name="role" class="form-control">
                                        <option value="0">Admin</option>
                                        <option value="1">Staff</option>
                                    </select>

                                </div>

                            </div>

                            {{-- Email --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Confirm Password --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="row mb-0 justify-content-between">
                                <div>

                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
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
