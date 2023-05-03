$(function () {


    table.columns().eq(0).each(function(colIdx) {
        $('input, select', table.column(colIdx).header()).on('keyup change', function() {
            table
                .column(colIdx)
                .search(this.value)
                .draw();
        });
        $('input, select', table.column(colIdx).header()).on('click', function(e) {
            e.stopPropagation();
        });
    });

    $('#selector').on('click', function (e) {
        if ($(this).is(':checked', true)) {
            $(".sub_chk").prop('checked', true);
        } else {
            $(".sub_chk").prop('checked', false);
        }
    });

    $(document).on('change', '.quantity', function (event) {
        if (event.target === this) {
            var row = $(this).closest('.product_row')
            var tcg_mid = row.find('.price_input').val()
            var multiplier = row.find('.multiplier').val()
            var quantity = $(this).val()
            var sold = (parseFloat(tcg_mid) * parseFloat(multiplier)) * quantity;
            row.find('.sold').val(sold.toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            }))

        }
    })

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

                    $.each(allVals, function (inventories, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });

            }
        }


    });

    $(document).on('change', '.multiplier', function (event) {
        if (event.target === this) {
            var row = $(this).closest('.product_row')
            var multiplier = $(this).val()
            var tcg_mid = row.find('.price_input').val()
            var multiplied_price = (parseFloat(tcg_mid) * parseFloat(multiplier))
            row.find('.multiplied_price').val(multiplied_price.toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            }));

            var quantity = row.find('.quantity').val()
            var sold = (parseFloat(tcg_mid) * parseFloat(multiplier)) * quantity;
            row.find('.sold').val(sold.toLocaleString(undefined, {
                manimumFractionDigits: 2,
                maximumFractionDigits: 2,

            }))

        }
    })



    $(document).on('blur', '.editable', function () {
        var $cell = $(this);
        var newValue = $cell.text();
        var itemId = $cell.closest('tr').data('item-id');

        $.ajax({
            url: '/update-item-price/' + itemId,
            type: 'PUT',
            data: {
                price: newValue
            },
            success: function (data) {
                // handle successful response
            },
            error: function (xhr, status, error) {
                // handle error response
            }
        });

    });



    $('.button').on('click', function () {
        // remove the active class and green background color from all buttons
        buttons.removeClass('active').css('background-color', '');

        // add the active class and green background color to the clicked button
        var activeBtn = $(this).addClass('active').css('background-color', 'green');
    });

    $(document).on('click', '.disable', function (event) {
        if ($(this).hasClass('disabled')) {
            event.preventDefault();
            return false;
        }
        $(this).hide();
        $('#loading').removeAttr('hidden');
    });

    $(document).on('click', '.disable-quantity, .disable-price', function (event) {
        if ($(this).hasClass('disabled')) {
            event.preventDefault();
            return false;
        }
    });

    $('.disable-form').on('submit', function () {
        var btn = $(this).find('.disable-quantity, .disable-price');
        btn.addClass('disabled');
    });

    $(document).on('blur', '.price_input', function (event) {
        if (event.target === this) {
            const form = $(this).closest('form').submit();
        }
    })
});
