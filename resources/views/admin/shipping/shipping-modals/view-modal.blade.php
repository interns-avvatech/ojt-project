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

                    @foreach (json_decode($checkout['cart_contents'], true) as $content)
                        <p><strong>Product Name: </strong>{{ $content['card_name'] }}</p>
                    @endforeach
                    
                </div>
            </div>
            <div class="modal-footer">

            </div>


        </div>
    </div>
</div>
