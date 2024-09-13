@extends('layouts.app')
@section('title', 'Estancias Estatus')

@section('content')
<div class="container-fluid p-0">
    <!-- Container Slogan -->
    <div class="col-12 bg-primario rounded-top mb-3">
        <div class="col-12 py-4">
            <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Solicitudes Por Revisar</h1>            
        </div>
    </div>
    <!-- Container Slogan -->

    <!-- Contenido -->
    <div class="row w-100 h-100 m-0 p-0">

        <!-- Header Section -->
        <form action="{{ route('estatus.index') }}" method="POST" class="row w-100 p-0 mx-auto align-items-center" id="form-number-items">
            <div class="col-12 col-md-4 text-center my-2">
                @csrf
                @method('GET')
                <select name="paginate" id="select-number-items">
                    <option value="10" @if($items->count() == '10') selected @endif >10</option>
                    <option value="50" @if($items->count() == '50') selected @endif >50</option>
                    <option value="100" @if($items->count() == '100') selected @endif >100</option>
                    <option value="250" @if($items->count() == '250') selected @endif >250</option>
                </select>
            </div>
            <div class="col-12 col-md-4 text-center my-2 d-flex">
                <label for="text" class="m-auto pe-2">Matricula: </label>
                <input autocomplete="off" type="text" name="q" placeholder="2019110039" class="form-control me-2">
                <input type="submit" value="Buscar" class="btn btn-primario text-white">
            </div>

            <!-- <div class="col-12 col-md-4">
                <a href="{{ route('estatus.create') }}" class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Crear Nuevo</a>
            </div> -->
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
                        <th>Matrícula</th>
                        <th>Nombre</th>
                        <th>Proceso</th>
                        <th>Empresa</th>
                        <th>Solicitud estatus</th>                        
                        <!-- <th>Carta subido</th>                         -->
                        <th>Opciones</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody id="">
                        @forelse($items as $item)
                        <tr class="d-none d-lg-table-row col-12">
                            <td class="col">{{ $item->matricula}}</td>
                            <td class="col">{{ $item->nombre}}</td>
                            <td class="col">{{ $item->proceso}}</td>
                            <td class="col">{{ $item->empresa}}</td>
                            <td class="col">{{ $item->solicitud_estatus}}</td>
                            <!-- <td class="col">{{ $item->carta_subido}}</td> -->
                            <td class="align-center col">
                                {{--  start botón de editar --}}
                                <div class="">
                                    <a href="{{ route('estatus.edit', $item) }}" class="btn btn-sm btn-primario text-white w-20" >
                                        <span>Revisar...</span>
                                    </a>
                                </div>
                                {{--  end botón de editar --}}
                            </td>
                          
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- desktop version End -->

        @foreach($items as $item)
        <!-- Mobile Version -->
        <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">
            <div class="card-title text-center fw-bold">{{ $item->matricula}}</div>
            <div class="card-body text-center">
                <p>{{ $item->nombre}}</p>
                <p>{{ $item->proceso}}</p>
                <p>Solicitud estatus: {{ $item->solicitud_estatus}}</p>
                <!-- <p>Carta subido: {{ $item->carta_subido}}</p>    -->             
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col text-center">
                        <a href="{{ route('estatus.edit', $item) }}" class="btn btn-sm btn-primario text-white">Revisar...</a>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Mobile Version End -->
        @endforeach
    </div>
    <!-- Contenido End -->

    <!-- Links -->
    <div class="row my-3 w-100 h-100 p-0">
        <div class="col-12 col-md-3">
            <p class="text-secondary text-center fst-italic">Mostrando {{ $items->count() }} resultados de {{ $items->total() }}</p>
        </div>
        <div class="col-12 col-md-9">
            {{ $items->links() }}
        </div>
    </div>
    <!-- Links End -->
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
