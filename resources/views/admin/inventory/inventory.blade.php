@extends('layouts.admin')
@section('title', 'Inventory')
@section('admin-content')
    <br>
    <div class="container-fluid px-5">
        <div class="col-auto">
            <div class="d-flex justify-content-between">
                <h2>Inventory</h2>
                <div class="d-flex">
                    <div class="col-auto me-2">
                        {{-- Upload CSV --}}
                        <button class="btn btn-success" data-target="#upload" data-toggle="modal" data-placement="top"
                            title="Upload CSV">Upload File<i class="fa fa-upload ml-2"></i></button>
                        @include('admin.inventory.action-popUp.upload')
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Filter
                        </a>

                        <form action="{{ route('filterInventory') }}" class="dropdown-menu">
                            <button class="dropdown-item" value="default" name="filter" type="submit">Default</button>
                            <button class="dropdown-item" value="all" name="filter" type="submit">Show All</button>
                            <button class="dropdown-item" value="zero" name="filter" type="submit">Zero
                                Quantity</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Error handler for file import --}}
            @if ($errors->any())
                <div class="alert alert-danger form-control w-75 mx-auto">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    @foreach ($errors->all() as $error)
                        <div class="note note-danger mb-3 text-center">
                            <strong>{{ $error[0] }}:</strong> {{ $error[1] }}
                        </div>
                    @endforeach
                </div>
            @endif
            <br>

        </div>

        <br>
    </div>
    </div>

    @include('admin.inventory.inventoryTable')

@endsection

@push('script')
    {{-- custom script --}}
    <script src="{{ asset('js/admin/inventory.js') }}"></script>
    <script>
        $(function() {
            'use strict';

            // DataTable setup
            $.extend($.fn.dataTable.defaults, {
                autoWidth: false,
                columnDefs: [{
                    orderable: false,
                    width: '100px',
                    targets: [1]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {

                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: {
                        'first': 'First',
                        'last': 'Last',
                        'next': '&rarr;',
                        'previous': '&larr;'
                    }
                },

                lengthMenu: [50, 100, 200, 500],
                displayLength: 50,
                scrollY: '55vh',
                scrollCollapse: true,
                // stateSave: true,
                // "bFilter": false,

            });
            // Individual column searching with selects
            $('#ojt_flow').DataTable({
                retrieve: true,
                // searching: false,
                initComplete: function() {
                    this.api().columns([2, 3, 4, 5, 6, 7]).every(function() {

                        var column = this;
                        var select = $(
                                '<select class="filter-select" data-placeholder="' + column
                                .header().textContent + '"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).not(':last-child').empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                }
            });

            // Enable Select2 select for individual column searching
            $('.filter-select').select2();

            $('.select').select2();

        });
    </script>
@endpush
