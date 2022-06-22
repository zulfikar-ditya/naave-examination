@extends('layouts.app')

@php
    $title = 'Company Email - '.$company->name. ' - '.$company->code;

    $data_tables = ['email']
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        <x-btn-link :link="route('company.company-email.create', $company)" :color="'success'" :value="'Create'"/>

        <table class="table table-responsive data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </x-main-card>
@endsection

@section('js')
<script type="text/javascript">
    $(function () {
        
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('company.company-email.index', $company) }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        
    });
</script>
@endsection