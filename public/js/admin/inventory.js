$(function () {
    var finish = 6;
    var rarity = 7;
    //Input Text and Dropdown
    $('#ojt_flow thead td').each(function (index) {
        if (index === 6) {
            var title = "Finish";
            $(this).html('<select><option value="">' + title +
                '</option><option value="' + "Normal" +
                '">Normal</option><option value="' + "Foil" +
                '">Foil</option></select>'
            );
        } else if (index === 7) {
            var title = "Rarity";
            $(this).html('<select><option value="">' + title +
                '</option><option value="' + "uncommon" +
                '">Uncommon</option><option value="' + "rare" +
                '">Rare</option><option value="' + "mythic" +
                '">Mythic</option></select>'
            );
        } else {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="' + title + '" />');
        }
    });

    // DataTable
    var table = $('#ojt_flow').DataTable({
        lengthMenu: [50, 100, 200, 500],
        scrollY: '55vh',
        scrollCollapse: true,
        stateSave: true,
        "bFilter": false

    });


    // Apply the search
    table.columns().eq(0).each(function (colIdx) {
        $('input, select', table.column(colIdx).header()).on('keyup change', function () {
            table
                .column(colIdx)
                .search(this.value)
                .draw();
        });
        $('input, select', table.column(colIdx).header()).on('click', function (e) {
            e.stopPropagation();
        });
    });

    $(document).on('change', '.quantity', function(event) {
        if (event.target === this) {
            var row = $(this).closest('.product_row')
            var tcg_mid = row.find('.tcg_mid').val().trim().replace('$', '')
            var multiplier = row.find('.multiplier').val()
            var quantity = $(this).val()
            var sold = (parseFloat(tcg_mid) * parseFloat(multiplier)) * quantity;
            row.find('.sold').val(sold.toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            }))

        }
    })
    
    $(document).on('change', '.multiplier', function(event) {
        if (event.target === this) {
            var row = $(this).closest('.product_row')
            var multiplier = $(this).val()
            var tcg_mid = row.find('.tcg_mid').val().trim().replace('$', '')
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



    $(document).on('blur', '.editable', function() {
        var $cell = $(this);
        var newValue = $cell.text();
        var itemId = $cell.closest('tr').data('item-id');

        $.ajax({
            url: '/update-item-price/' + itemId,
            type: 'PUT',
            data: {
                price: newValue
            },
            success: function(data) {
                // handle successful response
            },
            error: function(xhr, status, error) {
                // handle error response
            }
        });

    });

    

    $('.button').on('click',function() {
        // remove the active class and green background color from all buttons
        buttons.removeClass('active').css('background-color', '');

        // add the active class and green background color to the clicked button
        var activeBtn = $(this).addClass('active').css('background-color', 'green');
    });

    $(document).on('click', '.disable', function(event) {
        if ($(this).hasClass('disabled')) {
            event.preventDefault();
            return false;
        }
        $(this).hide();
        $('#loading').removeAttr('hidden');
    });

    $(document).on('click', '.disable-quantity, .disable-price', function(event) {
        if ($(this).hasClass('disabled')) {
            event.preventDefault();
            return false;
        }
    });

    $('.disable-form').on('submit', function() {
        var btn = $(this).find('.disable-quantity, .disable-price');
        btn.addClass('disabled');
    });

    $(document).on('blur', '.price_input', function(event){
        if(event.target === this)
        {
          const form = $(this).closest('form').submit();
        }
    })
});
