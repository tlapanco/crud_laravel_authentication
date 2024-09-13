@extends('layouts.app')
@section('title', 'Cartas completadas')

@section('content')
    <div class="container-fluid p-0">
        <!-- Container Slogan -->
        <div class="col-12 bg-primario rounded-top mb-3">
            <div class="col-12 py-4">
                <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Cartas Completadas</h1>
                <h1 class="text-white fw-bold text-uppercase text-center fs-6 fw-light">

                        Ciclo Escolar: {{ $datos->ciclo }} &nbsp;
                        Carrera: {{ $datos->carrera }}. &nbsp;
                        Grupo: {{ $datos->grupo }}

                </h1>
            </div>
        </div>
        <!-- Container Slogan -->

        <!-- Contenido -->
        <div class="row w-100 h-100 m-0 p-0">

            <!-- Header Section -->
            <form action="{{ route('detalle_cartas_completadas', ['id' => $idg, 'idp' => $idp, 'idce' => $datos->idce, 'idca' => $datos->idca]) }}" method="POST"
                class="row w-100 p-0 mx-auto align-items-center" id="form-number-items">
                <div class="col-12 col-md-4 text-center my-2">
                    @csrf
                    @method('GET')

                </div>
                <div class="col-11 col-md-4 text-center my-2 d-flex">
                    <input autocomplete="off" type="text" name="q" placeholder="Buscar..."
                        class="form-control me-2">
                    <input type="submit" value="Buscar" class="btn btn-primario text-white">
                </div>

            </form>
            <!-- Header Section -->

            <div class="col-12">
                @include('layouts.partials.alerts')
            </div>

            <!-- desktop version -->
            <div class="row">
                <div class="col-12">
                    <table class="table table-primaria d-none d-lg-table text-center align-center">
                        <thead class="table-head fw-bold">
                            <th>Matricula</th>
                            <th>Información Personal</th>
                            <th>Correo</th>
                            <th>Empresa</th>
                            <th>Descargar carta</th>
                        </thead>
                        <tbody id="">
                            @forelse($usuarios as $usuario)
                                <tr class="d-none d-lg-table-row"> 
                                    <td class="col">
                                        {{ $usuario->matricula }}
                                    </td>
                                    <td class="col">
                                        {{ $usuario->nombreu }}
                                    </td>
                                    <td class="col">
                                        {{ $usuario->email }}
                                    </td>
                                    <td class="col">
                                        {{ $usuario->empresa }}
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primario text-white fw-bold w-20">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                                <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>
                                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-8">
            </div>
            <div class="col-4">
                <a href="{{ route('detalle_carreras_completadas', ['id' => $datos->idca, 'idce' => $datos->idce, 'idp' => $idp]) }}"
                    class="btn btn-primario text-white btn-sm d-block mx-auto w-50">Regresar</a>
            </div>
            <!-- desktop version End -->

            @forelse($usuarios as $usuario)
                <!-- Mobile Version -->
                <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">
                    <div class="card-title text-center fw-bold">Matricula: {{ $usuario->matricula }}</div>
                    <div class="card-body text-center">
                        <p>Información Personal: {{ $usuario->nombreu }}</p>
                        {{ $usuario->email }}
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
