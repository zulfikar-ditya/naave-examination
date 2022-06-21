@props(['link', 'color', 'class', 'value', 'id'])

@php
    $main_id = $value;
    if (isset($id)) {
        $main_id = $id;
    }

    $main_class = 'btn btn-'.$color.' ';
    if (isset($class)) {
        $main_class .= $class;
    }
@endphp

<a href="{{$link}}" class="{{$main_class}}" id="{{$main_id}}">{{$value}}</a>