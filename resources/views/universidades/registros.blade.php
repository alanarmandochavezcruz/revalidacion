
        @foreach($universidades as $universidad)
        <tr>
            <td>{{$universidad->nombre}}</td>
            <td>

<div class="btn-group">

@can('update_universidades')
    <a href="{{route('universidades.edit', $universidad->id)}}" class="btn btn-primary">
        <i class="fas fa-edit"></i>
    </a>
@endcan


@can('delete_universidades')
                    <button type="button" class="btn btn-danger" onclick="destruir_registro('{{route('universidades.destroy', $universidad->id)}}')">
                    <i class="fas fa-minus"></i>
                    </button>
@endcan


@can('read_universidades')
    <a href="{{route('universidades.show', $universidad->id)}}" class="btn btn-success">
        <i class="fas fa-eye"></i>
    </a>
@endcan


</div>



@can('read_carreras')
                <a href="{{ route('carreras.index', $universidad->id) }}">
                    <button type="button" class="btn btn-info">
                    <i class="fas fa-book"></i>
                    Lista de Carreras
                    </button>

                </a>
@endcan



            </td>
        </tr>
        @endforeach