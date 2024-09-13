@extends('Auth.layouts.auth')
@section('title', 'Iniciar Sesión')
@section('content')
<div class="row align-items-center vh-100 w-100 justify-content-end shadow-lg rounded m-0" id="form-auth-container">
    <div class="col-12 col-lg-4 bg-white py-5 p-lg-4 h-100" id="login-container">
        @if($errors->first('captcha'))
            <div class="alert rounded-0 alert-error">
                <i>{{ $errors->first('captcha') }}</i>
            </div>
        @endif
        @if(session('message'))
            <div class="alert rounded-0 alert-error">
                <i>{{ session('message') }}</i>
            </div>
        @endif
        <div class="container my-4 d-lg-none">
            <img src="{{ asset('img/logo.svg') }}" class="d-lg-none w-25 img-fluid" alt="logo-upmp">
        </div>
        <h1 class="bg-primario text-white fw-bold fs-3 py-3 mb-1 text-center">Iniciar Sesion</h1>
        <h2 class="bg-primario text-white p-1 fs-6 text-center">Vinculación</h2>
        <h5 class="text-danger fs-6 text-center fw-bold">Usuario de prueba: </h5>
        <h6 class="text-danger fs-6 text-center">biblio@admin.com | password</h6>
        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            @method('POST')
            <div class="d-flex flex-column">
                <label class="fs-5 text-center fw-bold my-2" for="email">Correo Electronico:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electronico" data-index="1">
            </div>

            <div class="d-flex flex-column mb-5">
                <label class="fs-5 text-center fw-bold my-2" for="password">Contraseña:</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña" data-index="2">
            </div>
            <input type="submit" value="Iniciar Sesion" class="btn-primario btn text-white d-block mx-auto">

        </form>
    </div>
</div>
@stop
