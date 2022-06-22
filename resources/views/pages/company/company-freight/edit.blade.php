@extends('layouts.app')

@php
    $title = 'Edit Company Freight - '.$company->name. ' - '.$company->code;
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        @include('pages.company.company-freight.__fields')
    </x-main-card>
@endsection