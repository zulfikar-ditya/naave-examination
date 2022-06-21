@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center h-screen">
        <div class="col-md-4">
            <div class="card">
                
                <div class="card-body">
                    <h1 class="text-center">Register</h1>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <x-validate />
                        <div class="">
                            <x-input :type="'text'" :name="'Name'" :value="''" :required="true" :autofocus="true"/>
                            <x-input :type="'email'" :name="'email'" :value="''" :required="true" :autofocus="false"/>
                            <x-input :type="'password'" :name="'password'" :value="''" :required="true" :autofocus="false"/>
                            <x-input :type="'password'" :name="'password_confirmation'" :value="''" :required="true" :autofocus="false"/>
                        </div>

                        <x-input-btn :type="'submit'" :title="'Login'" :color="'info'" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
