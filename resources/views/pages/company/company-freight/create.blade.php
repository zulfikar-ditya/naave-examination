@extends('layouts.app')

@php
    $title = 'COmpany Freight - '.$company->name. ' - '.$company->code;
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        @include('pages.company.company-freight.__fields')
    </x-main-card>
@endsection