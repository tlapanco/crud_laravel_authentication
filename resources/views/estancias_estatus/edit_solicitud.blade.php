@extends('layouts.app')
@section('title', 'Editar solicitud')

@section('content')


  
<!-- General Container -->
<div class="container-fluid p-0">
    <!-- Form Container -->
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- Container Slogan -->
            <div class="col-12 bg-primario rounded-top mb-3">
                <div class="col-12 py-4">
                    <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Modificar Solicitud</h1>
                    <p class="text-white text-center fs-6 fw-light"></p>
                </div>
            </div>
            <!-- Container Slogan -->

            <!-- Form -->
            <form action="{{ route('estatus.update.solicitud',$consulta) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                <!-- Hide Section Button -->
                <div class="row justify-content-center">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-16 text-start">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tab1">Información del Alumno</a>
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab2">Información de la Empresa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab3">Información a quien va dirigido la Carta de Presentación</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab4">Información del Asesro Industrial y Académico</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-2 text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                        </div>
                </div>
                <!-- Hide Section Button End -->

                <!-- Personal Information Section -->
                
     
        <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade show active" id="tab1">
                        <section id="general-information" class="col-12 col-lg-12" >
                            <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input @class(['form-control'=> !$errors->first('nombrecompletouser'), 'form-control is-invalid' => $errors->first('nombrecompletouser')])
                                autocomplete="off"
                                type="text"
                                value="{{ Auth::user()->titulo }} {{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}"
                                name="nombrecompletouser" {{-- <-- Nombre del Campo --}}
                                placeholder="input-text"
                                id="input-text"
                                readonly>
                                <label for="input-text">Usuario que edita la Solicitud</label>
                            </div>
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('fecha_solicitud'), 'form-control is-invalid' => $errors->first('fecha_solicitud')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->fecha_solicitud }}"
                                    name="fecha_solicitud" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Fecha de la solicitud  año-mm-dd</label>
                                @if($errors->first('fecha_solicitud'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('fecha_solicitud') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('matricula'), 'form-control is-invalid' => $errors->first('matricula')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->matricula }}"
                                    name="matricula" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Matricula</label>
                                @if($errors->first('matricula'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('matricula') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('nombre'), 'form-control is-invalid' => $errors->first('nombre')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->nombre }}"
                                    name="nombre" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Nombre de alumno</label>
                                @if($errors->first('nombre'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('nombre') }}</i>
                                </div>
                                @endif
                            </div>
                            
                            <div class="form-floating my-2">
                                <select name="idp" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idp' ) }}" placeholder="Seleccione un Proceso">
                                <option value="{{$consulta ->idp}}" selected >{{$consulta ->proc}}</option>  
                                    @foreach($procesos as $p)
                                    <option value="{{$p ->idp}}">{{$p ->nombre}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Seleccione Proceso</label>
                                @if($errors->first('idp'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idp') }}</i>
                                </div>
                                @endif
                            </div>


                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('telefono'), 'form-control is-invalid' => $errors->first('telefono')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->telefono}}"
                                    name="telefono" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Celular del alumno</label>
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
                                    value="{{ $consulta->correo }}"
                                    name="correo" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Correo Institucional del alumno</label>
                                @if($errors->first('correo'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('correo') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('fecha_inicio'), 'form-control is-invalid' => $errors->first('fecha_inicio')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->fecha_inicio }}"
                                    name="fecha_inicio" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Fecha de inicio  año-mm-dd</label>
                                @if($errors->first('fecha_inicio'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('fecha_inicio') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('fecha_termino'), 'form-control is-invalid' => $errors->first('fecha_termino')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->fecha_termino }}"
                                    name="fecha_termino" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Fecha de termino  año-mm-dd</label>
                                @if($errors->first('fecha_termino'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('fecha_termino') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <select name="horas" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'horas' ) }}" placeholder="Seleccione horas a creditar" >
                                <option value="{{$consulta ->horas}}" selected >{{$consulta ->hrs}}</option>    
                                    @foreach($procesos as $p)
                                    <option value="{{$p ->horas}}">{{$p ->horas}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Seleccione horas a creditar</label>
                                @if($errors->first('horas'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('horas') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <select name="idc" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idc' ) }}" placeholder="Seleccione Cuatrimestres" required>
                                <option value="{{$consulta ->idc}}" selected >{{$consulta ->cuatri}}</option>    
                                    @foreach($cuatrimestres as $p)
                                    <option value="{{$p ->idc}}">{{$p ->nombre}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Seleccione Cuatrimestre</label>
                                @if($errors->first('idc'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idc') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <select name="idca" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idca' ) }}" placeholder="Seleccione Carrera" >
                                <option value="{{$consulta ->idca}}" selected>{{$consulta ->carre}}</option>    
                                    @foreach($carreras as $p)
                                    <option value="{{$p ->idca}}">{{$p ->nombre}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Seleccione Carrera</label>
                                @if($errors->first('idca'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idca') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <select name="idg" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idg' ) }}" placeholder="Seleccione Grupo" >
                                <option value="{{$consulta ->idg}}" selected>{{$consulta ->grp}}</option>    
                                    @foreach($grupos as $g)
                                    <option value="{{$g ->idg}}">{{$g ->nombre}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Seleccione Grupo</label>
                                @if($errors->first('idg'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idg') }}</i>
                                </div>
                                @endif
                            </div>
                            
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('n_social'), 'form-control is-invalid' => $errors->first('n_social')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->n_social }}"
                                    name="n_social" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Numero de seguro social</label>
                                @if($errors->first('n_social'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('n_social') }}</i>
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
                                            <label class="form-check-label ms-1" for="opcion-1"> Si </label>
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
                            {{-- Input TextArea --}}
                            {{-- Input TextArea End --}}
                        </div>
                        </div>
                    </section>
                </div>
                

            <!-- DATOS GENERALES DE LA EMPRESA -->
            <div class="tab-pane fade" id="tab2">
                <section id="general-information" class="col-12 col-lg-12" >
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">

                        <div class="form-floating my-2">
                                <select name="idem" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idem' ) }}" placeholder="Seleccione Empresa" >
                                <option value="{{$consulta ->idem}}" selected >{{$consulta ->empr}}</option>    
                                    @foreach($empresas as $e)
                                    <option value="{{$e ->idem}}">{{$e ->nombre}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Nombre como esta dada en el SAT</label>
                                @if($errors->first('idem'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idem') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <select name="idti" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idti' ) }}" placeholder="Seleccione Tipo de Empresa" >
                                <option value="{{$consulta ->idti}}" selected >{{$consulta ->ti}}</option>    
                                    @foreach($tipos as $t)
                                    <option value="{{$t ->idti}}">{{$t ->nombre}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Seleccione Tipo de Empresa</label>
                                @if($errors->first('idti'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idti') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <select name="direccion" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'direccion' ) }}" placeholder="Seleccione la Direccion" >
                                <option value="{{$consulta ->direccion}}" selected >{{$consulta ->dir}}</option>    
                                    @foreach($empresas as $e)
                                    <option value="{{$e ->direccion}}">{{$e ->direccion}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Dirección</label>
                                @if($errors->first('direccion'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('direccion') }}</i>
                                </div>
                                @endif
                            </div>


                            <!-- 
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('direccion_e'), 'form-control is-invalid' => $errors->first('direccion_e')])
                                    autocomplete="off"
                                    type="text"
                                        {{ Auth::user()->nombre }}{{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}"
                                    name="matricula" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Direccion (automaticamente)</label>
                                @if($errors->first('matricula'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('matricula') }}</i>
                                </div>
                                @endif
                            </div>  

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('matricula'), 'form-control is-invalid' => $errors->first('matricula')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ old( 'matricula' ) }}"
                                    name="matricula" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Estado (automaticamente)</label>
                                @if($errors->first('matricula'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('matricula') }}</i>
                                </div>
                                @endif
                            </div>  -->

                            <div class="form-floating my-2">
                                <select name="idta" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idta' ) }}" placeholder="Seleccione Tamaño" >
                                <option value="{{$consulta ->idta}}" selected >{{$consulta ->ta}}</option>    
                                    @foreach($tamaños as $ta)
                                    <option value="{{$ta ->idta}}">{{$ta ->nombre}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Seleccione Tamaño</label>
                                @if($errors->first('idta'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idta') }}</i>
                                </div>
                                @endif
                            </div>
                        </div> 
                        </div>   
                    </section>
                </div>

                <!-- A QUIEN VA DIRIGIDO -->
                <div class="tab-pane fade" id="tab3">
                <section id="general-information" class="col-12 col-lg-12" >
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('nombre_contacto'), 'form-control is-invalid' => $errors->first('nombre_contacto')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->nombre_contacto}}"
                                    name="nombre_contacto" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Nombre del contacto</label>
                                @if($errors->first('nombre_contacto'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('nombre_contacto') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('cargo'), 'form-control is-invalid' => $errors->first('cargo')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->cargo}}"
                                    name="cargo" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Cargo en la empresa</label>
                                @if($errors->first('cargo'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('cargo') }}</i>
                                </div>
                                @endif  
                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('correo_d'), 'form-control is-invalid' => $errors->first('correo_d')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->correo_d}}"
                                    name="correo_d" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Correo electronico</label>
                                @if($errors->first('correo_d'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('correo_d') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('telefono_d'), 'form-control is-invalid' => $errors->first('telefono_d')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->telefono_d}}"
                                    name="telefono_d" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Telefono</label>
                                @if($errors->first('telefono_d'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('telefono_d') }}</i>
                                </div>
                                @endif
                            </div>
                        </div>
                        </div>
                    </section>    
                </div>
    
                <!-- DATOS DEL ASESOR INDUSTRIAL Y ACADEMICO -->
                <div class="tab-pane fade" id="tab4">
                <section id="general-information" class="col-12 col-lg-12" >
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">

                        <div class="form-floating my-2">
                                <select name="idai" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idai' ) }}" placeholder="Seleccione Asesor Industrial" >
                                <option value="{{$consulta ->idai}}" selected >{{$consulta ->asein}}</option>    
                                    @foreach($asesores_industriales as $ai)
                                    <option value="{{$ai ->idai}}">{{$ai ->nombre}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Seleccione el Asesor Industrial</label>
                                @if($errors->first('idai'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idai') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <select name="cargo" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'cargo' ) }}" placeholder="Seleccione Cargo" >
                                <option value="{{$consulta ->cargo}}" selected >{{$consulta ->cari}}</option>    
                                    @foreach($asesores_industriales as $ai)
                                    <option value="{{$ai ->cargo}}">{{$ai ->cargo}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Cargo en la empresa</label>
                                @if($errors->first('cargo'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('cargo') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <select name="tel" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'tel' ) }}" placeholder="Seleccione Telefono" >
                                <option value="{{$consulta ->tel}}" selected >{{$consulta ->teli}}</option>    
                                    @foreach($asesores_industriales as $ai)
                                    <option value="{{$ai ->tel}}">{{$ai ->telefono}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Telefono</label>
                                @if($errors->first('tel'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('tel') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <select name="corr" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'corr' ) }}" placeholder="Seleccione Correo electronico" >
                                <option value="{{$consulta ->corr}}" selected >{{$consulta ->cori}}</option>    
                                    @foreach($asesores_industriales as $ai)
                                    <option value="{{$ai ->corr}}">{{$ai ->correo}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Correo electrónico</label>
                                @if($errors->first('corr'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('corr') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                                <select name="idaa" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idaa' ) }}" placeholder="Seleccione Asesor Academico" >
                                <option value="{{$consulta ->idaa}}" selected >{{$consulta ->aseca}}</option>    
                                    @foreach($asesores_academicos  as $aa)
                                    <option value="{{$aa ->idaa}}">{{$aa ->nombre}}</option>
                                    @endforeach 
                                </select>
                                <label for="input-text">Seleccione Asesor Académico</label>
                                @if($errors->first('idaa'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idaa') }}</i>
                                </div>
                                @endif
                            </div>
                        </div>
                        </div>
                    </section> 
                </div>
        </div>
                



                
        


                <!-- Personal Information Section End -->
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-3">
                        <button type="submit" class="btn btn-md d-block w-100 text-white btn-primario">Guardar </button>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <a title="Regresar" href="{{ route('estatus.regresar', $consulta) }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
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
