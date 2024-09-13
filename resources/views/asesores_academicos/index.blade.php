@extends('layouts.app')
@section('title', 'Prueba')

@section('content')
<div class="container-fluid p-0">
    <!-- Container Slogan -->
    <div class="col-12 bg-primario rounded-top mb-3">
        <div class="col-12 py-4">
            <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Control de asesores academicos</h1>
            
        </div>
    </div>
    <!-- Container Slogan -->

    <!-- Contenido -->
    <div class="row w-100 h-100 m-0 p-0">

        <!-- Header Section -->
        <form action="{{ route('asesores_academicos.index') }}" method="POST" class="row w-100 p-0 mx-auto align-items-center" id="form-number-items">
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
                <input autocomplete="off" type="text" name="q" placeholder="Buscar..." class="form-control me-2">
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
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Estatus</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody id="">
                        @forelse($items as $item)
                        <tr class="d-none d-lg-table-row col-12">
                            <td class="col-4">{{ $item->nombre}}</td>
                            <td class="col-1">{{ $item->apellido_paterno}}</td>
                            <td class="col-1">{{ $item->apellido_materno}}</td>
                            <td class="col-1">{{ $item->telefono}}</td>
                            <td class="col-1">{{ $item->correo}}</td>
                            <td class="col-3">
                                <span
                                    @class([
                                        'badge bg-success' =>  $item->activo,
                                        'badge bg-danger'  => !$item->activo
                                    ])
                                >
                                    {{( $item->activo ) ? 'Activo' : 'Inactivo' }}
                                </span>
                            
                            
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
            <div class="card-title text-center fw-bold">{{ $item->nombre}}</div>
            <div class="card-body text-center">
                <p>{{ $item->apellido_paterno}}</p>
                <p>{{ $item->apellido_materno}}</p>
                @if($item->activo)
                <p class="badge bg-success">Activo</p>
                @else
                <p class="badge bg-danger">Inactivo</p>
                @endif
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col text-center">
                        <a href="{{ route('asesores_academicos.edit', $item) }}" class="btn btn-sm btn-primario text-white">Editar</a>
                    </div>
                    <div class="col text-center">
                        <form action="{{ route('asesores_academicos.toggle.status', $item) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="activo" @if($item->activo) value="0" @else value="1" @endif>
                            <input type="submit" @if($item->activo) value="Desactivar" @else value="Activar" @endif
                            @class([
                            'btn-secundario text-white btn btn-sm' => $item->activo,
                            'btn-success btn btn-sm' => !$item->activo ])
                            onclick="return confirm('¿Seguro que Deseas Desactivar?')">
                        </form>
                    </div>
                    @if(!$item->activo)
                    <div class="col text-center">
                        <form action="{{ route('asesores_academicos.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-sm btn-secundario text-white" onclick="return confirm('¿Seguro que Deseas Eliminar?')">
                        </form>
                    </div>
                    @endif
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
