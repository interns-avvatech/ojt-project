<!-- Modal -->
<div class="modal fade" id="{{ 'view-order' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <div class="mb-3">
                    <p><strong>Date: </strong>{{ $checkout['created_at'] }}</p>
                </div>
                <div class="mb-3">
                    <p><strong>Order ID: </strong>{{ $checkout['checkout_id'] }}</p>
                </div>
                <div class="mb-3">
                    <p><strong>Payment Method: </strong>{{ $checkout['payment_method'] }}</p>
                </div>
                <div class="mb-3">
                    <p><strong>Shipping Address: </strong>{{ $checkout['address'] }}</p>
                </div>
                <div class="mb-3">

                    @foreach (json_decode($checkout['cart_contents'], true) as $content)
                        <p><strong>Product Name: </strong>{{ $content['card_name'] }}</p>
                        <p><strong>Product ID: </strong>{{ $content['product']['product_id'] }}</p>
                        <p><strong>Price: </strong>{{ $content['tcg_mid'] }}</p>
                        <p><strong>Quantity: </strong>{{ $content['qty'] }}</p>
                        <p><strong>Total: </strong>{{ $content['sold_price'] }}</p>
                    @endforeach
                    
                </div>
            </div>
            <div class="modal-footer">

            </div>


        </div>
    </div>
</div>
