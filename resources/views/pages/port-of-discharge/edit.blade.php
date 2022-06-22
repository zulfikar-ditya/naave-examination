@extends('layouts.app')

@php
    $title = 'Edit Port of discharge';
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        @include('pages.port-of-discharge.__fields')
    </x-main-card>
@endsection