@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center h-screen">
        <div class="col-md-4">
            <div class="card">                
                <div class="card-body">
                    <h1 class="text-center">Login</h1>
                    <form method="POST" action="{{ route('login') }}">
                        <x-validate />
                        @csrf
                        <div class="">
                            <x-input :type="'email'" :name="'email'" :value="''" :required="false" :autofocus="true"/>
                            <x-input :type="'password'" :name="'password'" :value="''" :required="false" :autofocus="false"/>
                            <x-input-check :name="'remember'" :value="''"/>
                        </div>
                        <x-input-btn :type="'submit'" :title="'Login'" :color="'info'" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
