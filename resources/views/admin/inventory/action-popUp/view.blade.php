<div class="modal fade" id="view{{ $item['id'] }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header align-middle">
                <h5 class="modal-title" id="myModalLabel">Card Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <img src="{{ $item['product']['art_crop'] }}" alt="{{ $item['product']['name'] }}"
                                class="text-center image-size">
                            <h1 class="text-center my-1">{{ $item['product']['name'] }}</h1>
                            <div class="mx-3">
                                <div class="d-flex justify-content-between mt-3">
                                    <h6>Product ID:</h6>
                                    <p><strong>{{ $item['product_id'] }}</strong></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6>Set Name:</h6>
                                    <p><strong>{{ $item['product']['set_name'] }}</strong></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="w-75">Type Line:</h6>
                                    <p class="text-nowrap"><strong>{{ $item['product']['type_line'] }}</strong></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6>Color Identity:</h6>
                                    <p><strong>{{ $item['product']['color_identity'] }}</strong></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6>Finishes:</h6>
                                    <p><strong>{{ $item['product']['finishes'] }}</strong></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6>Rarity:</h6>
                                    <p><strong>{{ $item['product']['rarity'] }}</strong></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6>Frame Effects:</h6>
                                    <p><strong>{{ $item['product']['frame_effects'] }}</strong></p>
                                </div>
                                <div class="d-flex justify-content-center align-items-start mt-3">
                                    <div class="">
                                        <h4>Card Price: <strong>${{ $item['price_each'] }}</strong></h4>
                                    </div>
                                    <span class="badge badge-primary rounded-pill ml-1 px-2">Quantity:
                                        {{ $item['quantity'] }}</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Additional Details --}}
                    <div class="col-8">
                        {{-- Stats --}}
                        <div class="card p-2">
                            <div class="row">
                                <div class="mx-auto px-3">
                                    <p class="text-center" id="oracle-text">
                                        <strong>{{ $item['product']['oracle_text'] }}</strong>
                                    </p>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex justify-content-center text-center">
                                        <h5><b>Card Stats</b></h5>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex justify-content-between">
                                                <h6>Mana Cost:</h6>
                                                <p><strong>{{ $item['product']['mana_cost'] }}</strong></p>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <h6>Power:</h6>
                                                <p><strong>{{ $item['product']['power'] }}</strong></p>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex justify-content-between">
                                                <h6>CMC:</h6>
                                                <p><strong>{{ $item['product']['cmc'] }}</strong></p>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <h6>Toughness:</h6>
                                                <p><strong>{{ $item['product']['toughness'] }}</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Card Details --}}
                        <div class="card p-2 mt-1">
                            <div class="mx-auto">
                                <h5 class="text-center"><b>Card Details</b></h5>
                            </div>
                            <div class="row">
                                {{-- Col 1 --}}
                                <div class="col-6">
                                    <div class="d-flex justify-content-between">
                                        <h6>Object:</h6>
                                        <p><strong>{{ $item['product']['object'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Language:</h6>
                                        <p><strong>{{ $item['product']['lang'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Release date:</h6>
                                        <p><strong>{{ $item['product']['released_at'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Games:</h6>
                                        <p><strong>{{ $item['product']['games'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Reserved:</h6>
                                        <p><strong>{{ $item['product']['reserved'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Oversized:</h6>
                                        <p><strong>{{ $item['product']['oversized'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Promo:</h6>
                                        <p><strong>{{ $item['product']['promo'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Reprint:</h6>
                                        <p><strong>{{ $item['product']['reprint'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Digital:</h6>
                                        <p class=""><strong>{{ $item['product']['digital'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Border Color:</h6>
                                        <p class=""><strong>{{ $item['product']['border_color'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Frame:</h6>
                                        <p class=""><strong>{{ $item['product']['frame'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Story Spotlight:</h6>
                                        <p class=""><strong>{{ $item['product']['story_spotlight'] }}</strong>
                                        </p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Booster:</h6>
                                        <p class=""><strong>{{ $item['product']['booster'] }}</strong></p>
                                    </div>
                                </div>

                                {{-- Col 2 --}}
                                <div class="col-6">
                                    <div class="d-flex justify-content-between">
                                        <h6>Keywords:</h6>
                                        @if ($item['product']['keywords'] == null)
                                            <p><strong>None</strong></p>
                                        @else
                                            <p><strong>{{ $item['product']['keywords'] }}</strong></p>
                                        @endif
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Layout:</h6>
                                        <p><strong>{{ $item['product']['layout'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>High Res Image:</h6>
                                        <p><strong>{{ $item['product']['highres_image'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Image Status:</h6>
                                        <p><strong>{{ $item['product']['image_status'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Foil:</h6>
                                        <p><strong>{{ $item['product']['foil'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Non Foil:</h6>
                                        <p><strong>{{ $item['product']['nonfoil'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Variation:</h6>
                                        <p><strong>{{ $item['product']['variation'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Collector Number:</h6>
                                        <p><strong>{{ $item['product']['collector_number'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Artist:</h6>
                                        <p class=""><strong>{{ $item['product']['artist'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Full Art:</h6>
                                        <p class=""><strong>{{ $item['product']['full_art'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Text Less:</h6>
                                        <p class=""><strong>{{ $item['product']['textless'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>EDHREC rank:</h6>
                                        <p class=""><strong>{{ $item['product']['edhrec_rank'] }}</strong></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6>Penny Rank:</h6>
                                        <p class=""><strong>{{ $item['product']['penny_rank'] }}</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- More Details (ID) --}}
                <div class="card mt-2 px-3">
                    <div class="mx-auto mt-2">
                        <h5 class="text-center"><b>ID's</b></h5>
                    </div>
                    <div class="row">
                        {{-- Col 1 --}}
                        <div class="col-6">
                            <div class="d-flex justify-content-between">
                                <h6>Object ID:</h6>
                                <p class=""><strong>{{ $item['product']['object_id'] }}</strong></p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <h6>Multiverse ID:</h6>
                                <p class=""><strong>{{ $item['product']['multiverse_ids'] }}</strong></p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <h6>TCGPLAYER ID:</h6>
                                <p class=""><strong>{{ $item['product']['tcgplayer_id'] }}</strong></p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <h6>Card Back ID:</h6>
                                <p class=""><strong>{{ $item['product']['card_back_id'] }}</strong></p>
                            </div>
                        </div>
                        {{-- Col 2 --}}
                        <div class="col-6">
                            <div class="d-flex justify-content-between">
                                <h6>Oracle ID:</h6>
                                <p class=""><strong>{{ $item['product']['oracle_id'] }}</strong></p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <h6>MTGO ID:</h6>
                                <p class=""><strong>{{ $item['product']['mtgo_id'] }}</strong></p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <h6>Card Market ID:</h6>
                                <p class=""><strong>{{ $item['product']['cardmarket_id'] }}</strong></p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <h6>Artist ID:</h6>
                                <p class=""><strong>{{ $item['product']['artist_ids'] }}</strong></p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <h6>Illustration ID:</h6>
                                <p class=""><strong>{{ $item['product']['illustration_id'] }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Set --}}
                <div class="card mt-2">
                    <h5 class="text-center mt-2"><b>SET</b></h5>
                    <div class="mx-auto w-75">
                        <div class="d-flex justify-content-between">
                            <h6>Set:</h6>
                            <p class=""><strong>{{ $item['product']['set'] }}</strong></p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <h6>Set ID:</h6>
                            <p class=""><strong>{{ $item['product']['set_id'] }}</strong></p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <h6>Set Type:</h6>
                            <p class=""><strong>{{ $item['product']['set_type'] }}</strong></p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <h6>Set URI:</h6>
                            <p class=""><strong>{{ $item['product']['set_uri'] }}</strong></p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <h6>Set Search URI:</h6>
                            <p class=""><strong>{{ $item['product']['set_search_uri'] }}</strong></p>
                        </div>
                    </div>
                </div>

                {{-- URI --}}
                <div class="card mt-2">
                    <h5 class="text-center mt-2"><b>URI's</b></h5>
                    <div class="px-5">
                        <div class="d-flex justify-content-between">
                            <h6 class="">URI:</h6>
                            <p class=""><strong>{{ $item['product']['uri'] }}</strong></p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <h6>Scryfall URI:</h6>
                            <p class=""><strong>{{ $item['product']['scryfall_uri'] }}</strong></p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <h6>Rullings URI:</h6>
                            <p class=""><strong>{{ $item['product']['rulings_uri'] }}</strong></p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <h6>Prints Search URI:</h6>
                            <p class="text-nowrap"><strong>{{ $item['product']['prints_search_uri'] }}</strong></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <span class="badge badge-primary rounded-pill">14</span> --}}
