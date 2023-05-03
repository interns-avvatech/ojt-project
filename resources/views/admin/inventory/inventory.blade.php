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


<div class="col-lg-12">
    <div class="d-flex justify-content-between">
        <h1 class="my-4 font-weight-bold">Inventory</h1>
        <div class="d-flex">
            <div class="col-auto me-2">
                {{-- Upload CSV --}}
                <button class="btn btn-success" data-bs-target="#upload" data-bs-toggle="modal" data-bs-placement="top" title="Upload CSV">Upload File<i class="fa fa-upload ms-2"></i></button>
                @include('admin.inventory.action-popUp.upload')
            </div>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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