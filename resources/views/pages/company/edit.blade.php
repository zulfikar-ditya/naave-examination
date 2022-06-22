@extends('layouts.app')

@php
    $title = 'Edit Company';
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        @include('pages.company.__fields')
    </x-main-card>
@endsection