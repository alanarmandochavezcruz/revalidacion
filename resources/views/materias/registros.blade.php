
        @foreach($materias as $materia)
        <tr>
            <td>{{$materia->nombre}}</td>
            <td>

<div class="btn-group">
@can('update_materias')
<a href="{{route('materias.edit', [$materia->id, $id_universidad, $id_carrera])}}" class="btn btn-primary">
    <i class="fas fa-edit"></i>
</a>
@endcan

@can('delete_materias')
                    <button type="button" class="btn btn-danger" onclick="destruir_registro('{{route('materias.destroy', [$materia->id, $id_universidad, $id_carrera])}}')">
                    <i class="fas fa-minus"></i>
                    </button>
@endcan

@can('read_materias')
<a href="{{route('materias.show', [$materia->id, $id_universidad, $id_carrera])}}" class="btn btn-success">
    <i class="fas fa-eye"></i>
</a>
@endcan


</div>




            </td>
        </tr>
        @endforeach