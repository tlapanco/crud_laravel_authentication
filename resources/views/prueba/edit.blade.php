
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
                        <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Editar Prueba - {{ $item->name }}</h1>
                        <p class="text-white text-center fs-6 fw-light"></p>
                    </div>
                </div>
                <!-- Container Slogan -->

                <!-- Form -->
                <form action="{{ route('prueba.update', $item) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Hide Section Button -->
                    <div class="row justify-content-center">
                        <button id="btn-general-information" class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-8 text-start">
                                    <span class="w-100">Información General</span>
                                </div>
                                <div class="col-2 text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </div>
                        </button>
                    </div>
                    <!-- Hide Section Button End -->

                    <!-- Personal Information Section -->
                    <section id="general-information" class="col-12 col-lg-12">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">

                                <!-- Input Text -->
                                <div class="form-floating my-2">
                                    <input @class(['form-control'=> !$errors->first('name'), 'form-control is-invalid' => $errors->first('name')])
                                    autocomplete="off" type="text" value="{{ (old( 'name' )) ? old( 'name' ) : $item->name}}" name="name" placeholder="input-text" id="input-text">
                                    <label for="input-text">Nombre de Prueba</label>
                                    @if($errors->first('name'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('name') }}</i>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-11">
                                <h6>Estatus:</h6>
                                <!-- Input Radios -->
                                <div class="form-check">
                                    <div class="row items-center justify-content-start">
                                        <!-- Input Radio -->
                                        <div class="col-12">
                                            <div class="d-flex w-50 justify-content-between justify-content-lg-start">
                                                <div class="d-flex me-2">
                                                    <input class="form-check-input mx-auto" name="activo" type="radio" id="opcion-2" value="0" @if(!$item->activo) checked @endif>
                                                    <label class="form-check-label ms-1" for="opcion-1"> Inactivo </label>
                                                </div>

                                                <div class="d-flex me-2">
                                                    <input class="form-check-input mx-auto" name="activo" type="radio" id="opcion-1" value="1" @if($item->activo) checked @endif>
                                                    <label class="form-check-label ms-1" for="opcion-1"> Activo </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Input Radio End -->
                                    </div>
                                </div>
                                <!-- Input Radios End -->
                            </div>

                            <!-- Input Select -->
                            <div class="form-floating my-2">
                                <select name="role" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'role' ) }}" placeholder="Cargo" required>
                                    <option value="{{ $item->role }}" selected>{{ $item->role }}</option>
                                    <option value="Profesor">Profesor</option>
                                    <option value="Alumno">Alumno</option>
                                    <option value="Directivo">Directivo</option>
                                </select>
                                <label for="input-text">Cargo</label>

                                @if($errors->first('role'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('role') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- Input Select End -->

                            <!-- Input Radios -->
                            <div class="form-check my-2">
                                <div class="row items-center justify-content-center">

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input
                                                class="form-check-input mx-auto"
                                                name="gender"{{-- <-- Nombre del Campo --}}
                                                type="radio"
                                                id="opcion-1"
                                                value="M"
                                                required
                                                @if($item->gender == 'M') checked @endif>
                                            <label class="form-check-label ms-1" for="opcion-1"> Masculino </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input
                                                class="form-check-input mx-auto"
                                                name="gender"{{-- <-- Nombre del Campo --}}
                                                type="radio"
                                                id="opcion-2"
                                                value="F"
                                                required
                                                @if($item->gender == 'F') checked @endif>
                                            <label class="form-check-label ms-1" for="opcion-2"> Femenino </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                </div>
                            </div>
                            <!-- Input Radios End -->

                            {{-- Input TextArea --}}
                            <div class="form-floating my-2">
                                <textarea
                                    @class(['form-control'=> !$errors->first('description'), 'form-control is-invalid' => $errors->first('description')])
                                    name="description"{{-- <-- Nombre del Campo --}}
                                    id="description-textarea"
                                    style="height: 10rem"
                                    value="{{ old('description') }}"
                                    required>
                                    {{ $item->description }}
                                </textarea>
                                <label for="description-textarea">Descripción</label>
                                @if($errors->first('description'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('description') }}</i>
                                </div>
                                @endif
                            </div>
                            {{-- Input TextArea End --}}
                        </div><br>
                    </section>
                    <!-- Personal Information Section End -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-3">
                            <button type="submit" class="btn btn-md d-block w-100 text-white btn-primario">Guardar Cambios</button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        <a title="Regresar" href="{{ route('prueba.index') }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
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
        $('#btn-general-information').click((e)=>{
            e.preventDefault();
            $('#general-information').toggle(500);
        });
    </script>
@endsection
