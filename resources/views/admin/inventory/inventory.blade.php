@extends('layouts.admin')
@section('title', 'Inventory')
@section('admin-content')

    @php
        // Check if the file is still in JSON format
        function is_valid_json($raw_json)
        {
            $decoded = json_decode($raw_json, true);
            if ($decoded == null || is_int($decoded)) {
                return $raw_json;
            } else {
                $result = '';
                foreach ($decoded as $key => $value) {
                    $result .= '<br>' . '<b>' . $key . '</b>' . ': ' . $value;
                }
                print_r($result);
            }
        }
    @endphp

    {{-- format try2 --}}

    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <h1 class="my-4 font-weight-semibold">Inventory</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="col-auto me-2">
                    {{-- Upload CSV --}}
                    <button class="btn btn-primary rounded-pill" data-target="#upload" data-toggle="modal" data-placement="top"
                        title="Upload CSV">Upload File</button>
                    @include('admin.inventory.action-popUp.upload')
                </div>
                <div class="dropdown user-dropdown">
                    <a class="btn rounded-pill btn-outline-secondary dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        Filter
                    </a>
                    <form action="{{ route('filterInventory') }}" class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" value="default" name="filter" type="submit">Default</button>
                        <button class="dropdown-item" value="all" name="filter" type="submit">Show All</button>
                        <button class="dropdown-item" value="zero" name="filter" type="submit">Zero Quantity</button>
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
        <div class="container-fluid my-4" style="display: grid">
            <div style="justify-self: end; display: flex; gap: 1rem;">
                <div class="form-label">
                    <label style="font-size: 14px;">Selected Entries:</label>
                </div>
                <div class="dropdown user-dropdown">
                    <a class="btn btn-sm btn-secondary rounded-pill dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        Action
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item delete_all"
                            data-url="{{ route('delete-selected-inventory') }}">Delete</button>
                        <button class="dropdown-item">Edit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-inverse card-flat border-none">
            <div class="card-block p-b-10">
                @include('admin.inventory.inventoryTable')
            </div>
        </div>
    </div>

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
                scrollY: '100vh',
                scrollCollapse: true,
                // columnDefs: [
                //     { width: '10%', targets: 8 }, // change the width of the first column header to 20%
                //     { width: '10%', targets: 9 }  // change the width of the second column header to 80%
                //     ]
                // columns: [
                //     { width: '20%' },
                //     { width: '20%' },
                //     { width: '20%' },
                //     { width: '20%' },
                //     { width: '20%' },
                //     { width: '20%' },
                //     { width: '20%' },
                //     { width: '20%' },
                //     { width: '20%' },
                // ]
                // stateSave: true,
                // "bFilter": false,
            });
            // Individual column searching with selects
            $('#ojt_flow').DataTable({
                retrieve: true,
                // searching: false,
                initComplete: function() {
                    var table = this;
                    this.api().columns([2, 3, 4, 5, 6, 7]).every(function() {
                        var column = this;
                        var select = $(
                                '<select class="filter-select" multiple="multiple" data-placeholder="' +
                                column
                                .header().textContent + '"><option value=""></option></select>')
                            .appendTo($(column.footer()).not(':last-child').empty())
                            .on('change', function() {
                                var vals = $(this).val();
                                if (vals && vals.length > 0) {
                                    var searchTerms = vals.join('|');
                                    column.search(searchTerms, true, false).draw();
                                } else {
                                    column.search('').draw();
                                }
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>');
                        });

                        // Enable Select2 for the select element
                        select.select2();
                    });
                }
            });

        });
    </script>
@endpush
