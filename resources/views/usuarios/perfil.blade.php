@extends('layouts.app')

@section('title', 'Perfil')

@section('content')

    <div class="container-fluid w-75">
        <div class="row">
            <div class="col-12 bg-primario rounded-top mb-3">
                <div class="col-12 py-4">
                    <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Perfil UPMP</h1>
                    <p class="text-white text-center fs-6 fw-light">Este es el estado actual de tu cuenta dentro de la institucion</p>
                </div>
            </div>

            <div class="col-12 text-center mb-2">
                <img src="{{asset($usuario->foto)}}" alt="user-profile-image" width="150" height="150" class="rounded-pill">
            </div>

            <div class="col-12">
                <h4 class="bg-primario text-white text-center p-1 rounded fs-6">Nombre</h4>
                <h3 class="text-center fs-6 p-2 text-secundario">{{ $usuario->get_fullname }}</h2>
            </div>

            <div class="col-12">
                <h4 class="bg-primario text-white text-center p-1 rounded fs-6">Tipo de Administrador</h4>
                <h3 class="text-center fs-6 p-2 text-secundario">{{ $usuario->area->nombre }}</h2>
            </div>

            <div class="col-12">
                <h4 class="bg-primario text-white text-center p-1 rounded fs-6">Correo</h4>
                <h3 class="text-center fs-6 p-2 text-secundario">{{ $usuario->email }}</h2>
            </div>

            <div>
                <h4 class="bg-primario text-white text-center p-1 rounded fs-6">Estado</h4>
                <h3
                    @class([
                        'text-center fs-6 p-2 text-success fw-bold' => $usuario->activo,
                        'text-center fs-6 p-2 text-danger fw-bold' => !$usuario->activo
                    ])>
                    --{{ $usuario->get_status }}--
                </h3>
            </div>

            <hr class="text-primario bg-primario p-2">

            <h3 class="text-center bg-primario fs-6 text-white fw-bold p-2">Cambiar Contraseña</h3>

            <form action="{{ route('updatepassword', Auth::user()->idadmin) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <div class="col-12 col-lg-11 my-1">
                        <h6>Ingresa tu nueva contraseña:</h6>
                        <div class="form-floating my-0">
                            <input id="password" type="password" name="password" placeholder="Contraseña"
                                data-index="1" autocomplete="off" @class([
                                    'form-control' => !$errors->first('password'),
                                    'form-control is-invalid' => $errors->first('password'),
                                ])>

                            <!-- Errors Field -->
                            @if ($errors->first('password'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('password') }}</i>
                                </div>
                            @endif
                            <!-- Errors Field End -->
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-12 col-lg-11 my-1">
                        <!-- Start Confirmar_password-->
                        <h6>Repite tu nueva contraseña:</h6>
                        <div class="form-floating my-0">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="Contraseña" data-index="6" autocomplete="off"
                                @class([
                                    'form-control' => !$errors->first('password'),
                                    'form-control is-invalid' => $errors->first('password'),
                                ])>
                            @if ($errors->first('password'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('password') }}</i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div><br>
                <button type="submit" class="btn btn-sm d-block w-50 text-white btn-primario mx-auto">
                    Cambiar contraseña
                </button>
            </form>
        </div>
    </div>

@endsection