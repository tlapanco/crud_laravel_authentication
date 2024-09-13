@extends('layouts.app')
@section('title', 'Solicitudes completadas')

@section('content')
    <div class="container-fluid p-0">
        <!-- Container Slogan -->
        <div class="col-12 bg-primario rounded-top mb-3">
            <div class="col-12 py-4">
                <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Solicitudes Completadas</h1>
                <h1 class="text-white fw-bold text-uppercase text-center fs-6 fw-light">

                        Ciclo Escolar: {{ $datos->ciclo }} &nbsp;&nbsp;
                        Carrera : {{ $datos->carrera }} &nbsp;&nbsp;

                </h1>

            </div>
        </div>
        <!-- Container Slogan -->

        <!-- Contenido -->
        <div class="row w-100 h-100 m-0 p-0">

            <!-- Header Section -->
            <div class="col-12 col-md-3 text-center my-2">
            </div>

            <div class="col-12 col-md-5 text-center my-2 d-flex">

            </div>

            <div class="col-12 col-md-4">
            </div>
            <!-- Header Section -->

            <div class="col-12">
                @include('layouts.partials.alerts')
            </div>

            <!-- desktop version -->
            <div class="row">
                <div class="col-12">
                    <table class="table table-primaria d-none d-lg-table text-center align-center">
                        <thead class="table-head fw-bold">
                            <!-- <th>&nbsp;</th> -->
                            <th>Grupos</th>
                            <th>Alumnos</th>
                            <th>Solicitudes completadas</th>
                            <th>Cartas completadas</th>
                            <th>Opciones</th>
                            <!-- <th>&nbsp;</th> -->
                        </thead>
                        <tbody id="">
                            @forelse($listas as $lista)
                                <tr class="d-none d-lg-table-row col-12">
                                    
                                    <td class="col-2">{{ $lista->nombre }}</td>

                                    <td class="col-2">{{ $lista->nalu }}</td>
                                    <td class="col-2">{{ $lista->solis }}</td>
                                    <td class="col-2">{{ $lista->cartas }}</td>


                                    <td class="align-center col-4 ">
                                        @if($lista->solis > 0)
                                        <a href="{{ route('detalle_solicitudes_completadas', ['id' => $lista->idg, 'idp' => $idp, 'idce' => $datos->idce, 'idca' => $datos->idca]) }}"
                                        class="btn btn-primario text-white btn-sm mx-auto ">Detalle solicitudes</a>
                                        @endif
                                        @if($lista->cartas > 0)
                                        <a href="{{ route('detalle_cartas_completadas', ['id' => $lista->idg, 'idp' => $idp, 'idce' => $datos->idce, 'idca' => $datos->idca]) }}"
                                        class="btn btn-primario text-white btn-sm mx-auto ">Detalle cartas</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-9">
            </div>
            <div class="col-3">
                <a href="{{ route('regresar_completadas', ['idce' => $idce, 'idp' => $idp]) }}"
                    class="btn btn-primario text-white btn-sm d-block mx-auto w-50">Regresar</a>
            </div>
            <!-- desktop version End -->

            @forelse($listas as $lista)
                <!-- Mobile Version -->
                <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">
                    <div class="card-title text-center fw-bold">Grupo: {{ $lista->nombre }}</div>
                    <div class="card-body text-center">
                        <p> Alumnos: {{ $lista->nalu }} </p>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{ route('detalle_solicitudes_completadas', ['id' => $lista->idg, 'idp' => $idp, 'idce' => $datos->idce, 'idca' => $datos->idca]) }}"
                            class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Detalle solicitudes</a>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{ route('detalle_cartas_completadas', ['id' => $lista->idg, 'idp' => $idp, 'idce' => $datos->idce, 'idca' => $datos->idca]) }}"
                            class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Detalle cartas</a>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                        </div>
                    </div>
                </div>
                <!-- Mobile Version End -->
            @empty
            @endforelse

        </div>
        <!-- Contenido End -->

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            $('#select-number-items').change(() => {
                $('#form-number-items').submit();
            });
        });
    </script>
@endsection
