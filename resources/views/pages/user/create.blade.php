@extends('layouts.app')

@php
    $title = 'Create User';
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        @include('pages.user.__fields')
    </x-main-card>
@endsection