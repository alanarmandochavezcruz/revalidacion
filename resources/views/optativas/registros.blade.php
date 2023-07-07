
        @foreach($optativas as $optativa)
        <tr>
            <td>{{$optativa->nombre}}</td>
            <td>

<div class="btn-group">

@can('update_optativas')
<a href="{{route('optativas.edit', [$optativa->id, $id_universidad, $id_carrera])}}" class="btn btn-primary">
    <i class="fas fa-edit"></i>
</a>
@endcan

@can('delete_optativas')
                    <button type="button" class="btn btn-danger" onclick="destruir_registro('{{route('optativas.destroy', [$optativa->id, $id_universidad, $id_carrera])}}')">
                    <i class="fas fa-minus"></i>
                    </button>
@endcan

@can('read_optativas')
<a href="{{route('optativas.show', [$optativa->id, $id_universidad, $id_carrera])}}" class="btn btn-success">
    <i class="fas fa-eye"></i>
</a>
@endcan

</div>

            </td>
        </tr>
        @endforeach