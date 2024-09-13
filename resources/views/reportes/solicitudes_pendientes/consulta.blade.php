@extends('layouts.app')
@section('title', 'Solicitudes pendientes')

@section('content')
    <div class="container-fluid p-0">
        <!-- Container Slogan -->
        <div class="col-12 bg-primario rounded-top mb-3">
            <div class="col-12 py-4">
                <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Solicitudes pendientes</h1>
                <p class="text-white text-center fs-6 fw-light">Total alumnos pendientes por carrera</p>
            </div>
        </div>
        <!-- Container Slogan -->

        <!-- Contenido -->
        <div class="row w-100 h-100 m-0 p-0">

            <!-- Header Section -->
            <!-- <div class="col-12 col-md-3 text-center my-2">
            </div> -->

            <div class="col-12 col-md-6 text-center my-2 d-flex">
                <div class="col-6 col-md-4 text-center my-2">
                    <h6>CICLO ESCOLAR:</h6>
                </div>
                <select class="form-select" name="idce" id="ciclos" class="form-control">
                    @if (isset($idce))
                        @foreach ($ce_select as $ce)
                            <option value="{{ $idce }}">{{ $ce->nombre }} </option>
                        @endforeach

                        @foreach ($ciclos as $ciclo)
                            @if ($ciclo->idce != $idce)
                                <option value="{{ $ciclo->idce }}">{{ $ciclo->nombre }}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="0">--Seleccione un Ciclo Escolar--</option>
                        @foreach ($ciclos as $ciclo)
                            <option value="{{ $ciclo->idce }}">{{ $ciclo->nombre }}</option>
                        @endforeach
                    @endif
                </select>
            </div> <!-- Ciclos select end</!-->
            <div class="col-12 col-md-6 text-center my-2 d-flex">
                <div class="col-6 col-md-4 text-center my-2">
                    <h6>PROCESO:</h6>
                </div>
                <select class="form-select" name="idp" id="procesos" class="form-control">
                    @if (isset($idp))
                        @foreach ($p_select as $p)
                            <option value="{{ $idp }}">{{ $p->nombre }} </option>
                        @endforeach

                        @foreach ($procesos as $proceso)
                            @if ($proceso->idp != $idp)
                                <option value="{{ $proceso->idp }}">{{ $proceso->nombre }}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="0">--Seleccione un Ciclo Escolar--</option>
                        @foreach ($procesos as $proceso)
                            <option value="{{ $proceso->idp }}">{{ $proceso->nombre }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-12 col-md-4">
            </div>
            <!-- Header Section -->

            <div class="col-12">
                @include('layouts.partials.alerts')
            </div>

            <!-- desktop version -->
            @if (isset($idce) and isset($idp))
                <div id="resultado1">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-primaria d-none d-lg-table text-center align-center">
                                <thead class="table-head fw-bold">
                                    <th>Carreras</th>
                                    <th>Alumnos</th>
                                    <th>Grupos</th>                                    
                                    <th>Opciones</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody id="">
                                    @foreach ($listas as $lista)
                                        <tr class="d-none d-lg-table-row col-12">
                                            <td class="align-center col-5">{{ $lista->nombre }}</td>

                                            <td class="align-center col-2">{{ $lista->nalu }}</td>

                                            <td class="align-center col-3">{{ $lista->ngru }} </td>

                                            <td class="align-center col-2">
                                                <a href="{{ route('detalle_carreras', ['id' => $lista->idca, 'idce' => $idce, 'idp' => $idp]) }}"
                                                    class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Detalle</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            @else
                <div id="resultado1">
                </div>
            @endif
            <!-- desktop version End -->

            @if (isset($idce) and isset($idp))
                <!-- Mobile Version -->
                @foreach ($listas as $lista)
                    <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">
                        <div class="card-title text-center fw-bold">Carrera: {{ $lista->nombre }}</div>
                        <div class="card-body text-center">
                            <p> Alumnos: {{ $lista->nalu }} </p>
                        </div>
                        <div class="card-body text-center">
                            Grupos: {{ $lista->ngru }}
                        </div>
                        <div class="card-body text-center">
                            <a href="{{ route('detalle_carreras', ['id' => $lista->idca, 'idce' => $idce, 'idp' => $idp]) }}"
                                class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Detalle</a>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                @endforeach
                <div id="resultado1">
                </div>
            @else
                <div id="resultado1">
                </div>
            @endif
                <!-- Mobile Version End -->
        </div>
        <!-- Contenido End -->

    </div>
@endsection

@section('scripts')

    <script type="text/javascript">        
        $(document).ready(function() {
            var valciclo;
            var valproceso;
            $("#ciclos").change(function(){                
                valciclo = $("#ciclos").val(); 
                if (valciclo != 0 && valproceso !=0) {
                    $("#resultado1").load("{{ route('contenido')}}?idce=" + valciclo + "&idp=" + valproceso).serialize();   }               
            });
            $("#procesos").change(function(){                
                valproceso = $("#procesos").val();    
                if (valciclo != 0 && valproceso !=0) {
                    $("#resultado1").load("{{ route('contenido')}}?idce=" + valciclo + "&idp=" + valproceso).serialize(); }           
                });         
        });
    </script>

    <script>
        $(document).ready(() => {
            $('#select-number-items').change(() => {
                $('#form-number-items').submit();
            });
        });
    </script>
@endsection
