@extends('layouts.app')

@php
    $title = 'Show Company';
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
                    <td>Name</td>
                    <td>{{$model->name}}</td>
                </tr>
                <tr>
                    <td>Code</td>
                    <td>{{$model->code}}</td>
                </tr>
                <tr>
                    <td>Contact Person</td>
                    <td>{{$model->contact_person}}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{$model->name}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{$model->address}}</td>
                </tr>
                <tr>
                    <td>SIUP</td>
                    <td>
                        <x-btn-link :link="url('storage', $model->siup)" :color="'primary'" :value="'View'" />
                    </td>
                </tr>
                <tr>
                    <td>NPWP</td>
                    <td>
                        <x-btn-link :link="url('storage', $model->npwp)" :color="'primary'" :value="'View'" />
                    </td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{$model->cerated_at}}</td>
                </tr>
                <tr>
                    <td>Last Modified</td>
                    <td>{{$model->updated_at}}</td>
                </tr>
            </tbody>
        </table>

        <x-btn-link :link="route('company.index')" :color="'success'" :value="'Back'"/>
        <x-btn-link :link="route('company.company-email.index', $model)" :color="'primary'" :value="'Company Email'"/>
        <x-btn-link :link="route('company.edit', $model)" :color="'info'" :value="'Edit'"/>
        <x-btn-link :link="'#'" :color="'danger'" :value="'Delete'" :id="'btn-delete-'.$model->id"/>
        <form action="{{route('company.destroy', $model)}}" id="form-delete-{{$model->id}}" method="POST">
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