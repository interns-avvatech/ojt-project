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


      // Get provinces of selected region and populate the province select element
      $('#region').change(function() {
        var regionCode = $(this).val();

        if (regionCode) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: '/admin/get-provinces/' + regionCode,
                type: 'GET',

                success: function(data) {
                    // alert(JSON.stringify(data,null,2))
                    // return
                    $('#province').empty().append('<option >Select Province</option>');
                    $('#barangay').empty().append('<option >Select Barangay</option>');
                    $('#municipality').empty().append('<option >Select Municipality</option>');
                    $.each(data, function(key, value) {
                        $('#province').append('<option value="' + value.code +
                            '">' + value.name + '</option>');
                    });
                }
            });
        }
    });

    // Get municipalities of selected province and populate the municipality select element
    $('#province').change(function() {
        var provinceCode = $(this).val();
        if (provinceCode) {
            $.ajax({
                url: '/admin/get-municipalities/' + provinceCode,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#barangay').empty().append('<option >Select Barangay</option>');
                    $('#municipality').empty().append(
                        '<option >Select Municipality</option>');
                    $.each(data, function(key, value) {
                        $('#municipality').append('<option value="' + value
                            .code + '">' + value.name + '</option>');
                    });
                }
            });
        }
    });

    // Get barangays of selected municipality and populate the barangay select element
    $('#municipality').change(function() {
        var municipalityCode = $(this).val();
        if (municipalityCode) {
            $.ajax({
                url: '/admin/get-barangays/' + municipalityCode,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#barangay').empty().append('<option >Select Barangay</option>');
                    $.each(data, function(key, value) {
                        $('#barangay').append('<option value="' + value.code +
                            '">' + value.name + '</option>');
                    });
                }
            });
        }
    });
});

$(function () {
    $('.livesearch').select2({
        placeholder: 'Select Location',
        ajax: {
            url: '/ajax-autocomplete-search',
            dataType: 'json',
            //delay: 150,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
});
