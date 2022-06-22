@props(['name', 'required', 'class', 'id', 'autofocus'])

@php
    $main_class = 'form-control ';
    if (isset($class)) {
        $main_class .= $class;
    }

    $main_id = $name;
    if (isset($id)) {
        $main_id = $id;
    }
@endphp

<div class="form-group my-3">
    <label for="{{$name}}" class="font-bold @error($name) text-danger @enderror">
        {{Str::title($name)}}
        <span class="{{$required ? 'text-danger' : 'text-info'}}">*</span>
    </label>
    <select name="{{$name}}" id="{{$main_id}}" class="{{$main_class}}" {{$required ? 'required' : ''}} >
        <option value="">----</option>
        {{$slot}}
    </select>
</div>