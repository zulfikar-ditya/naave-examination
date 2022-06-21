@props(['type', 'title', 'color', 'class', 'id'])

@php
    $main_class = 'btn btn-'.$color.' ';
    if (isset($class)) {
        $main_class .= $class;
    }
    $main_id = $title;
    if (isset($id)) {
        $main_id = $id;
    }
@endphp

<input type="{{$type}}" value="{{$title}}" id="{{$main_id}}" class="{{$main_class}}">