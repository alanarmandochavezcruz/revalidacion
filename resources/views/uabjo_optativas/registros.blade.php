
        @foreach($uabjo_optativas as $uabjo_optativa)
        <tr>
            <td>{{$uabjo_optativa->nombre}}</td>
            <td>

<div class="btn-group">

@can('update_uabjo_optativas')
<a href="{{route('uabjo_optativas.edit', [$uabjo_optativa->id, $id_uabjo_carrera])}}" class="btn btn-primary">
    <i class="fas fa-edit"></i>
</a>
@endcan


@can('delete_uabjo_optativas')
                    <button type="button" class="btn btn-danger" onclick="destruir_registro('{{route('uabjo_optativas.destroy', [$uabjo_optativa->id, $id_uabjo_carrera])}}')">
                    <i class="fas fa-minus"></i>
                    </button>
@endcan


@can('read_uabjo_optativas')
<a href="{{route('uabjo_optativas.show', [$uabjo_optativa->id, $id_uabjo_carrera])}}" class="btn btn-success">
    <i class="fas fa-eye"></i>
</a>
@endcan


</div>

            </td>
        </tr>
        @endforeach