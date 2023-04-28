@extends('admin.layout.layout')
@section('title', 'welcome page')
@section('content')
    <button class="btn btn-primary">Click me</button>
    

@endsection

@push('script')
    <script src="{{ asset('js/admin/inventory.js') }}"></script>
@endpush
