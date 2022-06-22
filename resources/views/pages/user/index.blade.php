@extends('layouts.app')

@php
    $title = 'User';

    $data_tables = ['name', 'email',]
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        <x-btn-link :link="route('user.create')" :color="'success'" :value="'Create'"/>

        <table class="table table-responsive">
            <thead>
                @foreach ($data_tables as $item)
                    <th>{{Str::title($item)}}</th>
                @endforeach
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($model as $item)
                <tr>
                    @foreach ($data_tables as $data_table)
                        <td>{{$item->$data_table}}</td>
                    @endforeach
                    <td>
                        <div class="">
                            <x-btn-link :link="route('user.show', $item)" :color="'info'" :value="'Detail'"/>
                            <x-btn-link :link="route('user.edit', $item)" :color="'warning'" :value="'Edit'"/>
                            <x-btn-link :link="'#'" :color="'danger'" :value="'Delete'" :id="'btn-delete-'.$item->id"/>
                            <form action="{{route('user.destroy', $item)}}" id="form-delete-{{$item->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$model->links()}}
    </x-main-card>
@endsection

@section('js')
    @foreach ($model as $item)
        <script>
            var btn = document.getElementById('btn-delete-{{$item->id}}');
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
                            document.getElementById('form-delete-{{$item->id}}').submit()
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
    @endforeach
@endsection