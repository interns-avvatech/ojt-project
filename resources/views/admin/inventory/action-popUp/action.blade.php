<!-- Sold Modal -->
<div class="modal fade" id="edit{{ $item['id'] }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">{{ $item['product']['name'] }} Sold</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('csv.update', $item['id']) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- <div class="mb-3">
                                <strong>Name:</strong>
                                <input required type="text" name="name" class="form-control" placeholder="Name">
                            </div> --}}

                            <div class="mb-3">
                                <p class="font-weight-bold float-left">Estimated Card Cost:</p>
                                <div class="mb-3 input-group">
                                    <div class="input-group-text">
                                        @foreach ($settings['currency_option'] as $currency)
                                            @if ($settings['estimated_card_cost'] === $currency['id'])
                                                {{ $currency['symbol'] }}
                                            @endif
                                        @endforeach

                                        @if (!empty($item['log']))
                                            {{ floatval($settings['multiplier_cost']) * floatval(preg_replace('/[^-0-9\.]/', '', $item['log'][0]['properties']['old']['price_each'])) }}
                                        @else
                                            {{ floatval($settings['multiplier_cost']) * floatval(preg_replace('/[^-0-9\.]/', '', $item['price_each'])) }}
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <p class="font-weight-bold float-left">Multiplied Price:</p>
                            <div class="mb-3 input-group">
                                <div class="input-group-text">₱</div>
                                <input type="text" name="multiplied_price"
                                    value="{{ floatval($settings['multiplier_default']) * floatval(preg_replace('/[^-0-9\.]/', '', $item['price_each'])) }}"
                                    class="form-control multiplied_price" placeholder="">
                            </div>


                            {{-- <strong>Ship price:</strong>
                            <div class="mb-3 input-group">
                                <div class="input-group-text">
                                    @foreach ($settings['currency_option'] as $currency)
                                        @if ($settings['ship_price'] === $currency['id'])
                                            {{ $currency['symbol'] }}
                                        @endif
                                    @endforeach
                                </div>
                                <input type="text" name="ship_price" value="0" class="form-control"
                                    placeholder="">
                            </div> --}}

                            {{-- <strong>Ship cost:</strong>
                            <div class="mb-3 input-group">
                                <div class="input-group-text">
                                    @foreach ($settings['currency_option'] as $currency)
                                        @if ($settings['ship_cost'] === $currency['id'])
                                            {{ $currency['symbol'] }}
                                        @endif
                                    @endforeach
                                </div>
                                <input type="text" name="ship_cost" value="0" class="form-control"
                                    placeholder="">
                            </div> --}}

                            <div class="mb-3">
                                <input type="text" name="payment_status" value="{{ $settings['status'][2]['id'] }}"
                                    class="hidden d-none">
                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">
                                <p class="font-weight-bold float-left">Quantity:</p>
                                <input type="number" name="quantity" class="form-control quantity"
                                    placeholder="quantity" value="1" min="1" max="{{ $item['quantity'] }}"
                                    data-row="{{ $item['id'] }}">
                            </div>
                            {{-- <div class="mb-3">
                                <strong>Payment Method</strong>
                                <select required name="payment_methods" class="form-control">
                                    <option value="" disabled selected hidden>Enter your mode of payment</option>
                                    @foreach ($settings['method'] as $setting)
                                        <option value="{{ $setting['method'] }}">{{ $setting['method'] }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="mb-3">
                                <p class="font-weight-bold float-left">Multiplier:</p>
                                <input type="number" name="multiplier" value="{{ $settings['multiplier_default'] }}"
                                    class="form-control multiplier" min="1" max="60">
                            </div>

                            {{-- <div class="mb-3">
                                <strong>Note:</strong>
                                <input type="text" name="note" value="" class="form-control"
                                    placeholder="Enter the note">
                            </div> --}}
                        </div>

                        <p class="font-weight-bold float-left mx-3">Sold Price</p>
                        <div class="mb-3 input-group mx-3">
                            <div class="input-group-text">
                                @foreach ($settings['currency_option'] as $currency)
                                    @if ($settings['sold_price'] === $currency['id'])
                                        {{ $currency['symbol'] }}
                                    @endif
                                @endforeach
                            </div>
                            <input type="text" name="sold"
                                value="{{ number_format(floatval(preg_replace('/[^-0-9\.]/', '', $item['price_each'])) * floatval($settings['multiplier_default']), 2, '.', ',') }}"
                                class="form-control sold">
                        </div>



                    </div>


                </div>

                {{-- fotter button --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                        Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i>
                        Sold</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete{{ $item['id'] }}" tabindex="-1" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Row</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('csv.delete', ['id' => $item['id']]) }}" method="post"
                enctype="multipart/form-data">

                @csrf
                <div class="modal-body">

                    <h4 class="text-center">Are you sure you want to delete this row?</h4>

                </div>
                {{-- fotter button --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                        Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
