@extends('layouts.app')

@php
    $title = 'Show Company Freight - '.$company->name. ' - '.$company->code;
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        <table class="table table-responsive">
            <thead>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <tr>
                    <td>Freight</td>
                    <td>{{$model->freight}}</td>
                </tr>
                <tr>
                    <td>Port of Loading</td>
                    <td>{{$model->port_of_loading->name}}</td>
                </tr>
                <tr>
                    <td>Port of Discharge</td>
                    <td>{{$model->port_of_discharge->name}}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{$model->created_at}}</td>
                </tr>
                <tr>
                    <td>Last Modified</td>
                    <td>{{$model->updated_at}}</td>
                </tr>
            </tbody>
        </table>

        <x-btn-link :link="route('company.company-freight.index', ['company' => $company, 'company_freight' => $model])" :color="'success'" :value="'Back'"/>
        <x-btn-link :link="route('company.company-freight.edit', ['company' => $company, 'company_freight' => $model])" :color="'info'" :value="'Edit'"/>
        <x-btn-link :link="'#'" :color="'danger'" :value="'Delete'" :id="'btn-delete-'.$model->id"/>
        <form action="{{route('company.company-freight.destroy', ['company' => $company, 'company_freight' => $model])}}" id="form-delete-{{$model->id}}" method="POST">
            @csrf
            @method('DELETE')
        </form>
    </x-main-card>
@endsection

@section('js')
    <script>
        var btn = document.getElementById('btn-delete-{{$model->id}}');
        btn.addEventListener('click', (e) => {
            e.preventDefault()
            swal({
                    title: "Are you sure?", 
                    text: "Once deleted, you will not be able to recover this record!", 
                    icon: "warning", 
                    buttons: true, 
                    dangerMode: true 
                }).then((willDelete) => {
                    if (willDelete) {
                        // console.log(document.getElementById('form-delete-{{$model->id}}'));
                        document.getElementById('form-delete-{{$model->id}}').submit();
                    } else { 
                        swal({
                            title: "Fyuuh!!!",
                            text: 'Your record is safe!',
                            icon: 'success'
                        }); 
                    } 
                });
        })
    </script>
@endsection