$(function () {
    $('#order-table').DataTable({
        "lengthMenu": [50, 100, 200, 500],
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'excelHtml5',
            {
                extend: 'colvis',
                columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
                columnText: function (dt, idx, title) {
                    return (idx) + ': ' + title;
                }
            }
        ],
        columnDefs: [
            { targets: [12, 13, 14, 15, 16, 17, 18], visible: false }
        ],
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(),
                data;

            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$₱\,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            //columns
            var column6total = api
                .column(6)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var column7total = api
                .column(7)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var column8total = api
                .column(8)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var column9total = api
                .column(9)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);




            // footer column 6
            $(api.column(6).footer()).html(`<b>
            <?php 
            foreach ($settings['currency_option'] as $currency) :
                 if ($settings['tcg_mid'] === $currency['id']) : 
                    echo $currency['symbol']; 
                 endif; 
            endforeach;
            ?> 
            ${column6total.toLocaleString(undefined, { minimumFractionDigits: 2 })}</b>`);

            // footer column 7
            $(api.column(7).footer()).html(`<b>${column7total}</b>`);

            // footer column 8
            $(api.column(8).footer()).html(`<b>
            <?php foreach ($settings['currency_option'] as $currency) :
                if ($settings['sold_price'] === $currency['id']) :
                    echo $currency['symbol'];
                endif;endforeach;
            ?> 
            ${column8total.toLocaleString(undefined, { minimumFractionDigits: 2 })}</b>`);

            // footer column 9
            $(api.column(9).footer()).html(`
            <?php foreach ($settings['currency_option'] as $currency) :
                if ($settings['ship_cost'] === $currency['id']) :
                    echo $currency['symbol'];
                endif;
            endforeach;?> 
            <b>${column9total.toLocaleString(undefined, { minimumFractionDigits: 2 })}</b>`);
        }


    });

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
