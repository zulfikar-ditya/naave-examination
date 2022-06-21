@props(['title'])

<div class="container pt-5 mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="text-bold">{{Str::title($title)}}</h3>
        </div>
        <div class="card-body">
            {{$slot}}
        </div>
    </div>
</div>