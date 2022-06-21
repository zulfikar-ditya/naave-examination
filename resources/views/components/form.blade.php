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

    <div class="my-3">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{ $slot }}
        </div>
    </div>

    <x-input-btn :type="'submit'" :color="'success'" :id="'submit'">Submit </x-input-btn>
    <x-input-btn :type="'reset'" :color="'warning'" :id="'reset'">Reset </x-input-btn>
</form>