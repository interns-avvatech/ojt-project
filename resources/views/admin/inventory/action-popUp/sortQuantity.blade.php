<div class="modal fade" id="sort" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Quantity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('sortQuantity') }}" method="GET">
                    <label for="">Sort by price:</label>
                    <input type="text" name="value" id="sortValue">
                    <button type="submit" name="condition" value="=">=</button>
                    <button type="submit" name="condition" value="<">&lt;</button>
                    <button type="submit" name="condition" value="<="><=</button>
                            <button type="submit" name="condition" value=">">&gt;</button>
                            <button type="submit" name="condition" value=">=">>=</button>
                            <button type="submit" name="condition" value="reset">RESET</button>
                </form>
            </div>
        </div>
    </div>
</div>
