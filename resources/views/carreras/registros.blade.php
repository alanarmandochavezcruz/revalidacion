
        @foreach($carreras as $carrera)
        <tr>
            <td>{{$carrera->nombre}}</td>
            <td>

<div class="btn-group">

@can('update_carreras')
<a href="{{route('carreras.edit', [$carrera->id, $id_universidad])}}" class="btn btn-primary">
    <i class="fas fa-edit"></i>
</a>
@endcan

@can('delete_carreras')
                    <button type="button" class="btn btn-danger" onclick="destruir_registro('{{route('carreras.destroy', [$carrera->id, $id_universidad])}}')">
                    <i class="fas fa-minus"></i>
                    </button>
@endcan


@can('read_carreras')
<a href="{{route('carreras.show', [$carrera->id, $id_universidad])}}" class="btn btn-success">
    <i class="fas fa-eye"></i>
</a>
@endcan


</div>

            @can('read_materias')
                <a href="{{ route('materias.index', [$id_universidad, $carrera->id]) }}">
                    <button type="button" class="btn btn-info">
                    <i class="fas fa-book"></i>
                    Lista de Materias
                    </button>
                </a>
            @endcan



            @can('read_optativas')
                <a href="{{ route('optativas.index', [$id_universidad, $carrera->id]) }}">
                    <button type="button" class="btn btn-info">
                    <i class="fas fa-book"></i>
                    Lista de Optativas
                    </button>
                </a>
            @endcan


            </td>
        </tr>
        @endforeach