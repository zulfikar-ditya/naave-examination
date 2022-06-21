@props(['method', 'action', 'id'])

@php
    $main_id = '';
    if (isset($id)) {
        $main_id = $id;
    }
@endphp

<form action="{{ $action }}" method="post" enctype="multipart/form-data" id="id">
    @csrf
    <x-validate />
    @if ($method != 'create')
        <input type="hidden" name="_method" value="PUT">
    @endif
    <div class="">
        {{ $slot }}
    </div>

    <x-input-btn :type="'submit'" :title="'Submit'" :color="'info'" />
    <x-input-btn :type="'reset'" :title="'Reset'" :color="'warning'" />
</form>