
        @foreach($uabjo_carreras as $uabjo_carrera)
        <tr>
            <td>{{$uabjo_carrera->nombre}}</td>
            <td>



<div class="btn-group">
@can('update_uabjo_carreras')
<a href="{{route('uabjo_carreras.edit', $uabjo_carrera->id)}}">
    <button type="button" class="btn btn-primary">
        <i class="fas fa-edit"></i>
    </button>
</a>
@endcan

@can('delete_uabjo_carreras')
                    <button type="button" class="btn btn-danger" onclick="destruir_registro('{{route('uabjo_carreras.destroy', $uabjo_carrera->id)}}')">
                    <i class="fas fa-minus"></i>
                    </button>
@endcan

@can('read_uabjo_carreras')
<a href="{{route('uabjo_carreras.show', $uabjo_carrera->id)}}">
    <button type="button" class="btn btn-success">
        <i class="fas fa-eye"></i>
    </button>
</a>
@endcan
</div>

@can('read_uabjo_materias')
                <a href="{{ route('uabjo_materias.index', $uabjo_carrera->id) }}">
                    <button type="button" class="btn btn-info">
                    <i class="fas fa-book"></i>
                    Lista de Materias
                    </button>

                </a>
@endcan

@can('read_uabjo_optativas')
                <a href="{{ route('uabjo_optativas.index', $uabjo_carrera->id) }}">
                    <button type="button" class="btn btn-info">
                    <i class="fas fa-book"></i>
                    Lista de Optativas
                    </button>

                </a>
@endcan

            </td>
        </tr>
        @endforeach