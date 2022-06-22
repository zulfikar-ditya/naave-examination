@extends('layouts.app')

@php
    $title = 'Company';

    $data_tables = ['name', 'code', 'contact_person']
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        <x-btn-link :link="route('company.create')" :color="'success'" :value="'Create'"/>

        <table class="table table-responsive data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Code</th>
                <th>Contact Person</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </x-main-card>
@endsection

@section('js')
    <script type="text/javascript">
    $(function () {
        
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('company.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'code', name: 'code'},
                {data: 'contact_person', name: 'contact_person'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        
    });
</script>
@endsection