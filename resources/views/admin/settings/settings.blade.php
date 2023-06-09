@extends('layouts.admin')
@section('title', 'Settings')
@section('admin-content')
    <div class="d-flex h-100">
        <div class="col-6 mx-auto align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="my-4">Settings</h2>
                <select id="mySelect" class="btn btn-sm btn-outline-secondary" onchange="location = this.value;">
                    <optgroup>User Setting</optgroup>
                    <option value="{{route('manage')}}" {{request()->routeIs('manage') ? 'selected' : ''}}>User Management</option>
                    <option value="{{ route('create') }}" {{ request()->routeIs('create') ? 'selected' : '' }}>Create User</option>
                    <option value="">Option 2</option>
                </select>
                
            </div>
            <hr>
            @include('admin.settings.settings-modal.add-currency')
            @include('admin.settings.settings-modal.add-methods')
            <!-- This is the Form -->
            <form class="row" action="{{ route('settings', $settings['id']) }}" method="post">
                @csrf
                <div class="col-lg-6">
                    <div class="mt-4">
                        <div class="d-flex justify-content-between">
                            <p><b>Payment Methods </b></p>


                        </div>

                        <select name="payment_methods" class="form-control mt-1">
                            @foreach ($settings['method'] as $settingMethods)
                                <option value="{{ $settingMethods['id'] }}"
                                    @if ($settings['payment_methods']['id'] === $settingMethods['id']) selected @endif>
                                    {{ $settingMethods['method'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <p class="mb-3"><b>Payment Status </b></p>
                        <select name="payment_status" class="form-control">
                            @foreach ($settings['status'] as $settingStatus)
                                <option value="{{ $settingStatus['id'] }}"
                                    @if ($settings['payment_status']['id'] === $settingStatus['id']) selected @endif>
                                    {{ $settingStatus['status'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mt-4">
                        <p class="mb-3"><b>Multiplier default</b></p>
                        <input name="multiplier_default" class="form-control" value="{{ $settings['multiplier_default'] }}">
                    </div>

                    <div class="mt-4">
                        <p class="mb-3"><b>Multiplier Cost</b></p>
                        <input name="multiplier_cost" class="form-control" placeholder="Your Multiplier cost is.."
                            value="{{ $settings['multiplier_cost'] }}">
                    </div>

                </div>

                <div class="col-lg-6 mt-3">
                    <div class="mt-1">
                        <p style="margin-top: 10px; margin-bottom: 18px;"><b>Sold Price</b></p>
                        <select name="sold_price" class="form-control">
                            @foreach ($settings['currency_option'] as $settingCurrency)
                                <option value="{{ $settingCurrency['id'] }}"
                                    @if ($settings['sold_price'] === $settingCurrency['id']) selected @endif>
                                    {{ $settingCurrency['symbol'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-4">
                        <p><b>Estimated Card Cost</b></p>
                        <select name="estimated_card_cost" class="form-control">
                            @foreach ($settings['currency_option'] as $settingCurrency)
                                <option value="{{ $settingCurrency['id'] }}"
                                    @if ($settings['estimated_card_cost'] === $settingCurrency['id']) selected @endif>
                                    {{ $settingCurrency['symbol'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-4">
                        <p><b>Shipment Cost</b></p>
                        <select name="ship_cost" class="form-control">
                            @foreach ($settings['currency_option'] as $settingCurrency)
                                <option value="{{ $settingCurrency['id'] }}"
                                    @if ($settings['ship_cost'] === $settingCurrency['id']) selected @endif>
                                    {{ $settingCurrency['symbol'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-4">
                        <p><b>Shipment Price</b></p>
                        <select name="ship_price" class="form-control">
                            @foreach ($settings['currency_option'] as $settingCurrency)
                                <option value="{{ $settingCurrency['id'] }}"
                                    @if ($settings['ship_price'] === $settingCurrency['id']) selected @endif>
                                    {{ $settingCurrency['symbol'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-0 col-12">
                    <!-- It shows the value of the card/inventory not the currency -->
                    <div class="d-flex justify-content-between">
                        <h5><b>Currency</b></h5>
                        <button class="btn btn-small btn-secondary" type="button" data-toggle="modal"
                            data-target="#addCurrency">Add Currency</button>
                    </div>

                    <div class="row align-items-start">
                        <div class="col-sm">
                            <p>TCG Low</p>
                            <select name="tcg_low" class="form-control">
                                @foreach ($settings['currency_option'] as $settingCurrency)
                                    <option value="{{ $settingCurrency['id'] }}"
                                        @if ($settings['tcg_low'] === $settingCurrency['id']) selected @endif>
                                        {{ $settingCurrency['symbol'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm">
                            <p>TCG Mid</p>
                            <select name="tcg_mid" class="form-control">
                                @foreach ($settings['currency_option'] as $settingCurrency)
                                    <option value="{{ $settingCurrency['id'] }}"
                                        @if ($settings['tcg_mid'] === $settingCurrency['id']) selected @endif>
                                        {{ $settingCurrency['symbol'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm">
                            <p>TCG High</p>
                            <select name="tcg_high" class="form-control">
                                @foreach ($settings['currency_option'] as $settingCurrency)
                                    <option value="{{ $settingCurrency['id'] }}"
                                        @if ($settings['tcg_high'] === $settingCurrency['id']) selected @endif>
                                        {{ $settingCurrency['symbol'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-4 col-12">
                    <button class="btn btn-secondary form-control" type="submit">Save Changes</button>
                </div>
        </div>

        </form>
    </div>

@endsection
