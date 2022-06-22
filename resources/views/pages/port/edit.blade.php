@extends('layouts.app')

@php
    $title = 'Edit Port';
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        @include('pages.port.__fields')
    </x-main-card>
@endsection