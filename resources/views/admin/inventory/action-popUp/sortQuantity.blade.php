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
                    <div>
                        <div>
                            <label for="">Sort by price:</label>
                        </div>
                        <div>
                            <input type="number" name="value" id="sortValue" class="form-control" value="0" required>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div>
                            <label for="">Select Action: </label>
                        </div>
                        <div class="text-center" id="">
                            <button type="submit" name="condition" value="=" class="btn btn-secondary">=</button>
                            <button type="submit" name="condition" value="<" class="btn btn-secondary">&lt;</button>
                            <button type="submit" name="condition" value="<=" class="btn btn-secondary">&le;</button>
                            <button type="submit" name="condition" value=">" class="btn btn-secondary">&gt;</button>
                            <button type="submit" name="condition" value=">=" class="btn btn-secondary">&ge;</button>
                            <button type="submit" name="condition" value="reset" class="btn btn-secondary">RESET</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
