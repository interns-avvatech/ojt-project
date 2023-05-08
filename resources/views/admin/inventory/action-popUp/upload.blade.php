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
                        accept-charset="utf-8" enctype="multipart/form-data" method="POST" onsubmit="uploadCsv(event)">
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
                <div class="progress mb-3" style="height: 20px;">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%"
                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
                <script>
                    function uploadCsv(event) {
                        event.preventDefault();

                        var form = event.target;
                        var formData = new FormData(form);

                        $.ajax({
                            url: form.action,
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            xhr: function() {
                                var xhr = $.ajaxSettings.xhr();
                                xhr.upload.onprogress = function(e) {
                                    var percentage = Math.floor((e.loaded / e.total) * 100);
                                    $('.progress-bar').css('width', percentage + '%').text(percentage + '%');
                                };
                                return xhr;
                            },
                            beforeSend: function() {
                                $('#submit').addClass('disable').prop('disabled', true);
                                $('#loading').removeAttr('hidden');
                                $('.progress-bar').removeClass('progress-bar-striped bg-info').addClass('progress-bar-striped bg-success');
                            },
                            success: function(response) {
                                // Handle successful upload
                                console.log(response);
                                location.reload(); // Reloads the current page
                            },
                            error: function(xhr, status, error) {
                                // Handle upload error
                                console.log(xhr.responseText);
                            },
                            complete: function() {
                                $('#submit').removeClass('disable').prop('disabled', false);
                                $('#loading').attr('hidden', 'hidden');
                                $('.progress-bar').removeClass('progress-bar-striped bg-success').addClass(
                                    'progress-bar-striped bg-info');
                            }
                        });
                    }
                </script>

            </div>
        </div>
    </div>
</div>


{{-- <span class="badge badge-primary rounded-pill">14</span> --}}
