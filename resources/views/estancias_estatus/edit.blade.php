@extends('layouts.app')
@section('title', 'Estancias Estatus')

@section('content')
<!-- General Container -->
<div class="container-fluid p-0">
    <!-- Form Container -->
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- Container Slogan -->
            <div class="col-12 bg-primario rounded-top mb-3">
                <div class="col-12 py-4">
                    <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2"> Solicitud Detalle</h1>
                    <p class="text-white text-center fs-6 fw-light"></p>
                </div>
            </div>
            <div class="col-12">
                @include('layouts.partials.alerts')
            </div>
            <!-- Container Slogan -->
            <div class="form-floating my-2 row col-lg-10">
                                <input
                                    @class(['form-control'=> !$errors->first('nombrecompletouser'), 'form-control is-invalid' => $errors->first('nombrecompletouser')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ Auth::user()->titulo }} {{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}"
                                    name="nombrecompletouser" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    readonly>
                                <label class="ms-2" for="input-text">Usuario que modificará el estatus de la estancia </label>
                            </div>

            <!-- Form -->
            <form action="{{ route('estatus.update', $consulta) }}" class="form" method="POST">
                @csrf
                @method('PUT')
            

                <!-- Hide Section Button -->
                <div class="row justify-content-center">
                    <button id="btn-student-information" class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Información del alumno</span>
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
                <!-- Section student information  -->
                <section id="student-information" class="col-12 col-lg-12" >
                    <div class="row  justify-content-center">
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->matricula}}" name="matricula" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Matricula</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->nombre}}" name="nombre" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Nombre completo</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->proceso}}" name="proceso" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Proceso</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->cuatrimestre}}" name="cuatrimestre" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Cuatrimestre</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->horas}}" name="horas" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Horas por acreditar</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->fecha_solicitud}}" name="fecha_solicitud" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Fecha solicitud</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->fecha_inicio}}" name="fecha_inicio" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Fecha de inicio</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->fecha_termino}}" name="fecha_termino" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Fecha termino</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->carrera}}" name="carrera" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Carrera</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->grupo}}" name="grupo" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Grupo</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->correo}}" name="correo" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Correo electronico</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->telefono}}" name="telefono" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Telefono</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->n_social}}" name="n_social" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Número de seguridad social</label>
                                </div>
                            </div><!-- row -->
                        </div>
                    </div>
                </section>
                <!-- Section student information end -->
                <!-- Hide Section Button -->
                <div class="row justify-content-center">
                    <button id="btn-company-information" class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Información de la empresa</span>
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
                <!-- Company information section -->
                <section id="company-information" class="col-12 col-lg-12" >
                    <div class="row  justify-content-center">
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->empresa}}" name="empresa" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Nombre registrado ante el SAT</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->rfc_empresa}}" name="rfc_empresa" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">RFC</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->tipo}}" name="tipo" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Tipo</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->tamaño}}" name="tamaño" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Tamaño</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->ciudad}}" name="ciudad" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Ciudad</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->direccion}}" name="direccion" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Dirección</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->pagina_web}}" name="pagina_web" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Página web</label>
                                </div>
                            </div><!-- row -->
                        </div>
                    </div>
                </section>
                <!-- Company information section end -->
                <!-- Hide Section Button -->
                <div class="row justify-content-center">
                    <button id="btn-company-contact-information" class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Información del destinatario de carta presentación</span>
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
                <!-- Company contact information section -->
                <section id="company-contact-information" class="col-12 col-lg-12" >
                    <div class="row  justify-content-center">
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->nombre_contacto}}" name="nombre_contacto" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Nombre completo</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->cargo_contacto}}" name="cargo_contacto" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Puesto</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->correo_d}}" name="correo_d" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Correo electronico</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->telefono_d}}" name="telefono_d" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Telefono</label>
                                </div>
                            </div><!-- row -->
                        </div>
                    </div>
                </section>
                <!-- Company contact information section end -->
                <!-- Personal Information Section -->
                <!-- Hide Section Button -->
                <div class="row justify-content-center">
                    <button id="btn-industrial-adviser-information" class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Información asesor industrial</span>
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
                <!-- Industrial adviser information section -->
                <section id="industrial-adviser-information" class="col-12 col-lg-12" >
                    <div class="row  justify-content-center">
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->aindustrial_n}} {{$consulta->aindustrial_ap}} {{$consulta->aindustrial_am}} " name="nombre_ai" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Nombre completo</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->rfc_ai}}" name="rfc_ai" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">RFC</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->cargo_ai}}" name="cargo_ai" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Puesto</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->telefono_ai}}" name="telefono_ai" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Telefono</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->correo_ai}}" name="correo_ai" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Correo electornico</label>
                                </div>
                            </div><!-- row -->
                        </div>
                    </div>
                </section>
                <!-- Industrial adviser information section end -->

                <!-- Hide Section Button -->
                <div class="row justify-content-center">
                    <button id="btn-academic-adviser-information" class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Información asesor academico</span>
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
                <!-- Industrial adviser information section -->
                <section id="academic-adviser-information" class="col-12 col-lg-12" >
                    <div class="row  justify-content-center">
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->aacademico_n}} {{$consulta->aacademico_ap}} {{$consulta->aacademico_am}} " name="nombre_aa" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Nombre completo</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->titulo}}" name="titulo" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Titulo</label>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->correo_aa}}" name="correo_aa" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Correo electronico</label>
                                </div>
                                <div class="form-floating my-2 col-12 col-md col-sm">
                                    <input type="text" value="{{$consulta->telefono_aa}}" name="telefono_aa" class="form-control" disabled="">
                                    <label for="input-text" class="ms-2">Telefono</label>
                                </div>
                            </div><!-- row -->
                        </div>
                    </div>
                </section>
                <!-- Industrial adviser information section end -->
                
                
                
            
                <!-- Hide Section Button -->
                <div class="row justify-content-center">
                    <button id="btn-autorization-information" class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Autorizada</span>
                            </div>
                            <div class="col-2 text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>

                <section id="autorization-information" class="col-12 col-lg-12" >
                    <div class="row  justify-content-center">
                        <div class="col-12 col-lg-10">
                            <div class="row">
                                <div class="col col-md col-sm ms-0 ms-md-4 ms-sm-4">
                                    <label >Aceptar solicitud</label>
                                </div>
                                <div class="form-check form-check-inline col col-md col-sm ps-5 ps-md-0 ps-sm-0">
                                    <input class="form-check-input" type="radio" name="solicitud_estatus" id="solicitud_aceptada" value="ACEPTADA">
                                    <label class="form-check-label" for="inlineRadio1">Si</label>
                                </div>
                                <div class="form-check form-check-inline col col-md col-sm ps-5 ps-md-0 ps-sm-0">
                                    <input class="form-check-input" type="radio" name="solicitud_estatus" id="solicitud_aceptada" value="RECHAZADA">
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                                @if($errors->first('solicitud_estatus'))
                                <div class="text-danger">
                                    <i>{{ $errors->first('solicitud_estatus') }}</i>
                                </div>
                                @endif
                                <!-- <div class="col col-md col-sm d-flex justify-content-center">
                                    <a href="" class="btn text-white btn-primario col-10 mt-2 mt-sm-0 mt-md-0">Revisar...</a>
                                </div> -->

                                <!-- Input Radio End -->
                            </div>
                            <div class="row">
                                <!-- <div class="form-floating my-2">
                                    <input id="input-text" type="text" name="observaciones" class="form-control">
                                    <label for="input-text">Agregar observaciones...</label>                                    
                                </div> -->
                                <div class="form-floating my-2 p-1">
                                <input
                                    @class(['form-control'=> !$errors->first('observaciones'), 'form-control is-invalid' => $errors->first('observaciones')])
                                    autocomplete="off"
                                    type="text"     
                                    value="{{old('observaciones')}}"                            
                                    name="observaciones" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    >
                                <label for="input-text">Agregar observaciones...</label>
                                @if($errors->first('observaciones'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('observaciones') }}</i>
                                </div>
                                @endif
                            </div>
                            </div>
                            <!--row input-->
                            <!-- <div class="row p-1">
                                <div class="col-3 col-md col-sm ms-0 ms-md-4 ms-sm-4">
                                    <label >Carta subido</label>
                                </div>
                                <div class="form-check form-check-inline col col-md col-sm ps-5 ps-md-0 ps-sm-0">
                                    <input class="form-check-input" type="radio" name="carta_subido" id="carta_subido" value="SI" @if($consulta->carta_subido == 'SI') checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">Si</label>
                                </div>
                                <div class="form-check form-check-inline col col-md col-sm ps-5 ps-md-0 ps-sm-0">
                                    <input class="form-check-input" type="radio" name="carta_subido" id="carta_subido" value="NO" @if($consulta->carta_subido == 'NO') checked @endif> 
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                                <div class="col col-md col-sm d-flex justify-content-center">
                                    <button disabled="" class="btn text-white btn-primario col-10 mt-2 mt-sm-0 mt-md-0">Revisar...</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </section>
                    

                <!-- Personal Information Section End -->
                <div class="row justify-content-center p-2">
                    <div class="col-12 col-lg-3">
                        <button type="submit" class="btn btn-md d-block w-100 text-white btn-primario">Guardar</button>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-5 p-1">
                    <a title="Regresar" href="{{ route('estatus.index') }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
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
    $('#btn-student-information').click((e) => {
        e.preventDefault();
        $('#student-information').toggle(500);
    });
    $('#btn-company-information').click((e) => {
        e.preventDefault();
        $('#company-information').toggle(500);
    });
    $('#btn-company-contact-information').click((e) => {
        e.preventDefault();
        $('#company-contact-information').toggle(500);
    });
    $('#btn-industrial-adviser-information').click((e) => {
        e.preventDefault();
        $('#industrial-adviser-information').toggle(500);
    });
    $('#btn-academic-adviser-information').click((e) => {
        e.preventDefault();
        $('#academic-adviser-information').toggle(500);
    });
    $('#btn-autorization-information').click((e) => {
        e.preventDefault();
        $('#autorization-information').toggle(500);
    });
</script>
@endsection
