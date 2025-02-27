@extends('layouts.app')
@section('title', 'Áreas')

@section('content')
<!-- General Container -->
<div class="container-fluid p-0"> 
    <!-- Form Container -->
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- Container Slogan -->
            <div class="col-12 bg-primario rounded-top mb-3">
                <div class="col-12 py-4">
                    <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Crear Nuevo Asesor Industrial</h1>
                    <p class="text-white text-center fs-6 fw-light"></p>
                </div>
            </div>
            <!-- Container Slogan -->

            <!-- Form -->
            <form action="{{ route('asesores_industriales.store') }}" class="form" method="POST">
                @csrf
                @method('POST')

                <!-- Hide Section Button -->
                <div class="row justify-content-center">
                    <button id="btn-general-information" class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Información General</span>
                            </div>
                            <div class="col-2 text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
                <!-- Hide Section Button End -->

                <!-- Personal Information Section -->
                <br>
                <section id="general-information" class="col-12 col-lg-12" >
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('rfc'), 'form-control is-invalid' => $errors->first('rfc')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ old( 'rfc' ) }}"
                                    name="rfc" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">RFC del asesor industrial</label>

                                @if($errors->first('rfc'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('rfc') }}</i>
                                </div>
                                @endif

                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('titulacion'), 'form-control is-invalid' => $errors->first('titulacion')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ old( 'titulacion' ) }}"
                                    name="titulacion" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Titulacion del asesor industrial</label>

                                @if($errors->first('titulacion'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('titulacion') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('nombre'), 'form-control is-invalid' => $errors->first('nombre')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ old( 'nombre' ) }}"
                                    name="nombre" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Nombre del asesor industrial </label>

                                @if($errors->first('nombre'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('nombre') }}</i>
                                </div>
                                @endif

                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('apellido_paterno'), 'form-control is-invalid' => $errors->first('apellido_paterno')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ old( 'apellido_paterno' ) }}"
                                    name="apellido_paterno" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Apellido paterno del  asesor industrial </label>

                                @if($errors->first('apellido_paterno'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('apellido_paterno') }}</i>
                                </div>
                                @endif

                            </div>
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('apellido_materno'), 'form-control is-invalid' => $errors->first('apellido_materno')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ old( 'apellido_materno' ) }}"
                                    name="apellido_materno" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Apellido materno del  asesor industrial </label>

                                @if($errors->first('apellido_materno'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('apellido_materno') }}</i>
                                </div>
                                @endif

                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('cargo'), 'form-control is-invalid' => $errors->first('cargo')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ old( 'cargo' ) }}"
                                    name="cargo" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Cargo del  asesor industrial </label>

                                @if($errors->first('cargo'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('cargo') }}</i>
                                </div>
                                @endif

                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('telefono'), 'form-control is-invalid' => $errors->first('telefono')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ old( 'telefono' ) }}"
                                    name="telefono" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Teléfono del  asesor industrial </label>

                                @if($errors->first('telefono'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('telefono') }}</i>
                                </div>
                                @endif

                            </div>

                            
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('correo'), 'form-control is-invalid' => $errors->first('correo')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ old( 'correo' ) }}"
                                    name="correo" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Correo del  asesor industrial </label>

                                @if($errors->first('correo'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('correo') }}</i>
                                </div>
                                @endif

                            </div>


                            <div class="form-check my-2">
                                <div class="row items-center justify-content-center">
                                    <h3 class="text-start  fs-6">Activo</h3>
                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="activo"{{-- <-- Nombre del Campo --}} type="radio" id="opcion-1" value="1" required checked>
                                            <label class="form-check-label ms-1" for="opcion-1"> Si</label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="activo"{{-- <-- Nombre del Campo --}} type="radio" id="opcion-2" value="0" required>
                                            <label class="form-check-label ms-1" for="opcion-2"> No </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                </div>
                            </div>

                            <!-- Input Text End -->

                            <!-- Input Select -->
                            <div class="form-floating my-2">
                                <select name="idem" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off"
                                       value="{{ old( 'idem' ) }}" placeholder="Seleccione una empresa" required>
                                    <option value="" selected disabled>-- Seleccione una empresa--</option>
                                    @foreach($empresas as $c)
                                    <option value="{{$c->idem}}">{{$c->nombre}}</option>
                                    @endforeach
                                </select>
                                <label for="input-text">Seleccione Empresa</label>

                                @if($errors->first('idem'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idem') }}</i>
                                </div> 
                                @endif
                            </div>
                            
                            {{-- Input TextArea --}}

                            {{-- Input TextArea End --}}
                        </div>
                    </div>
                </section>
                <!-- Personal Information Section End -->
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-3">
                        <button type="submit" class="btn btn-md d-block w-100 text-white btn-primario">Guardar</button>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <a title="Regresar" href="{{ route('asesores_industriales.index') }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
                </div>
            </form>
            <!-- Form End -->
        </div>
    </div>
    <!-- Form Container End -->
</div>
<!-- General container End -->
@endsection

@section('scripts')
<script>
    $('#btn-general-information').click((e) => {
        e.preventDefault();
        $('#general-information').toggle(500);
    });
</script>
@endsection
