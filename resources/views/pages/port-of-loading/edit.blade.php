@extends('layouts.app')

@php
    $title = 'Edit Port of Loading';
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        @include('pages.port-of-loading.__fields')
    </x-main-card>
@endsection