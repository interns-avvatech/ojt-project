 <!-- Modal -->
 <div class="modal fade" id="checkout{{ $order['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">

                 <h5 class="modal-title" id="exampleModalLabel">Check out</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <form action="{{ route('checkout-orders') }}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="mb-3">
                                 <strong>Name:</strong>
                                 <input type="text" name="name" class="form-control" placeholder="Name">
                             </div>

                             <strong>Ship cost:</strong>
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
                             </div>
                         </div>

                         <div class="col-md-6">
                             <div class="mb-3">
                                 <strong>Payment Method</strong>
                                 <select required name="payment_methods" class="form-control">
                                     <option value="" disabled selected hidden>Enter your mode of payment</option>
                                     @foreach ($settings['method'] as $setting)
                                         <option value="{{ $setting['method'] }}">{{ $setting['method'] }}</option>
                                     @endforeach
                                 </select>
                             </div>

                             <strong>Ship price:</strong>
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
                             </div>
                         </div>

                         <div class="mb-3">
                             <strong>Address:</strong>
                             <input required type="text" name="address" class="form-control" placeholder="Address">
                         </div>
                    
                         <div class="mb-3">
                             <strong>Note:</strong>
                             <input type="text" name="note" value="" class="form-control"
                                 placeholder="Enter the note">
                         </div>


                     </div>

                 </div>

                 <div class="modal-footer">

                     <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                     <button type="submit" class="btn btn-success" id="checkout">Checkout</button>

                 </div>
             </form>
         </div>
     </div>
 </div>
