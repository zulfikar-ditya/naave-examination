@props(['name', 'value', 'class', 'id'])

@php
    $main_class = 'form-check-input ';
    if (isset($class)) {
        $main_class .= $class;
    }

    $main_id = $name;
    if (isset($id)) {
        $main_id = $id;
    }
@endphp

<div class="form-group my-3">
    <input class="{{$main_class}}" type="checkbox" name="{{$name}}" id="{{$main_id}}" {{ $value ? 'checked' : '' }}>

    <label class="form-check-label" for="remember">
        {{Str::title($name)}}
    </label>
</div>
