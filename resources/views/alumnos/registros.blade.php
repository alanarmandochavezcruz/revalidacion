
        @foreach($alumnos as $alumno)
        <tr>
            <td>{{$alumno->clave}}</td>
            <td>{{$alumno->curp}}</td>
            <td>{{$alumno->nombres}} {{$alumno->apellidos}}</td>
            <td>

<div class="btn-group">
@can('update_alumnos')
<a href="{{route('alumnos.edit', [$alumno->id, $id_uabjo_carrera, $id_universidad, $id_universidad_carrera])}}" class="btn btn-primary">
    <i class="fas fa-edit"></i>
</a>
@endcan

@can('delete_alumnos')
                    <button type="button" class="btn btn-danger" onclick="destruir_registro('{{route('alumnos.destroy', [$alumno->id, $id_uabjo_carrera, $id_universidad, $id_universidad_carrera])}}')">
                    <i class="fas fa-minus"></i>
                    </button>
@endcan

@can('read_alumnos')
<a href="{{route('alumnos.show', [$alumno->id, $id_uabjo_carrera, $id_universidad, $id_universidad_carrera])}}" class="btn btn-success">
    <i class="fas fa-eye"></i>
</a>
@endcan

</div>


@can('read_dictamen')
                <a href="{{ route('predictamen.index', $alumno->id) }}">
                    <button type="button" class="btn btn-info">
                    <i class="fas fa-book"></i>
                    Predictamen
                    </button>
                </a>
@endcan


            </td>
        </tr>
        @endforeach