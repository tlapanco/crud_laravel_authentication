<div class="row">
    <div class="col-12">
        <table class="table table-primaria d-none d-lg-table text-center align-center">
            <thead class="table-head fw-bold">
                <th>Carrera</th>
                <th>Alumnos con archivos pendientes</th>
                <th>Grupos</th>                
                <th>Opciones</th>
                <th>&nbsp;</th>
            </thead>
            <tbody id="">
                @foreach ($listas as $lista)
                <tr class="d-none d-lg-table-row col-12">
                    <td class="align-center col-4">{{ $lista->nombre }}</td>

                    <td class="align-center col-4">{{ $lista->nalu }}</td>

                    <td class="align-center col-2">{{ $lista->ngru }} </td>

                    <td class="align-center col-3">
                        <a href="{{ route('detalle_carreras', ['id' => $lista->idca, 'idce' => $idce, 'idp' => $idp]) }}"
                            class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Detalle</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
