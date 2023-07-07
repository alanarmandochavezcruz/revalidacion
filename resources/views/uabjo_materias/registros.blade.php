
        @foreach($uabjo_materias as $uabjo_materia)
        <tr>
            <td>{{$uabjo_materia->nombre}}</td>
            <td>

<div class="btn-group">

@can('update_uabjo_materias')
<a href="{{route('uabjo_materias.edit', [$id_uabjo_carrera, $uabjo_materia->id])}}" class="btn btn-primary">
    <i class="fas fa-edit"></i>
</a>
@endcan

@can('delete_uabjo_materias')
                    <button type="button" class="btn btn-danger" onclick="destruir_registro('{{route('uabjo_materias.destroy', [$id_uabjo_carrera, $uabjo_materia->id])}}')">
                    <i class="fas fa-minus"></i>
                    </button>
@endcan

@can('read_uabjo_materias')
<a href="{{route('uabjo_materias.show', [$id_uabjo_carrera, $uabjo_materia->id])}}" class="btn btn-success">
    <i class="fas fa-eye"></i>
</a>
@endcan

</div>

            </td>
        </tr>
        @endforeach