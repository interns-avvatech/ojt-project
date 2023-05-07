<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header align-middle">
                <h5 class="modal-title" id="myModalLabel">Upload CSV File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    <form action="{{ route('importProductFromCsv') }}" class="row justify-content-center"
                        accept-charset="utf-8" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="file" name="file" id="importFile" class="form-control col-8 w-75 mr-2">
                        <button type="submit" id="submit" class="btn btn-success col-2 w-auto disable ml-2">Import
                            CSV</button>
                        <button id="loading" class="btn btn-success col-2 w-auto ml-2" hidden type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <span class="badge badge-primary rounded-pill">14</span> --}}
