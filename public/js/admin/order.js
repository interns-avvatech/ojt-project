$(function () {
   

    $('#selector').on('click', function (e) {
        if ($(this).is(':checked', true)) {
            $(".sub_chk").prop('checked', true);
        } else {
            $(".sub_chk").prop('checked', false);
        }
    });

    $('.delete_all').on('click', function (e) {
        var allVals = [];
        $(".sub_chk:checked").each(function () {
            allVals.push($(this).attr('data-id'));
        });
        if (allVals.length <= 0) {
            alert("Please Select Row");
        } else {
            var check = confirm("Are you sure you want to delete this row? ");
            if (check == true) {
                var selected = allVals.join(",");
                $.ajax({
                    url: $(this).data('url'),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: 'ids=' + selected,
                    success: function (data) {
                        if (data['success']) {

                            location.reload()
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);

                    }
                }),

                    $.each(allVals, function (orders, value) {
                        $('table tr').filter("[data-row-id'" + value + "']").remove();
                    });
            }
        }
    });
});
