 <!-- Modal -->
 <div class="modal fade" id="{{ 'order' . $order->id }}" tabindex="-1"  aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Return/Cancel Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                Are you sure you want to return this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <a href="{{ route('delete-order', [$order->id, $order->tcgplacer_id]) }}">
                    <button type="button" class="btn btn-primary" id="delete">Yes</button>
                </a>
            </div>
        </div>
    </div>
</div>
