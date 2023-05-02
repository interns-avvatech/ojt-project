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
    {{-- required script --}}
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>


    {{-- custom script --}}
    <script src="{{ asset('js/admin/inventory.js') }}"></script>
    <script>
        $(function() {
            // Apply the search
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
        })
    </script>
@endpush
