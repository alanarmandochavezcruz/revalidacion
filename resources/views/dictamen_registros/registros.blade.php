
            @foreach($dictamen_registros as $dictamen_registro)
                <tr>
                    <td>
                        {{$dictamen_registro->clave}}</td>
                    <td>
                        {{ $dictamen_registro->periodo_inicio }} - {{ $dictamen_registro->periodo_fin }}
                    </td>
                    <td>{{$dictamen_registro->director_uabjo}}</td>
                    <td>{{$dictamen_registro->coordinador_uabjo}}</td>
                    <td>{{$dictamen_registro->director_escolares}}</td>
                    <td>{{$dictamen_registro->subdirector_escolares }}</td>
                    <td>{{$dictamen_registro->secretaria_escolares}}</td>
                    <td>{{$dictamen_registro->estado}}</td>
                    <td>

<div class="btn-group">

@can('update_dictamen')
<a href="{{route('predictamen.edit', $dictamen_registro->id)}}" class="btn btn-primary">
    <i class="fas fa-edit"></i>
</a>
@endcan


@can('delete_dictamen')
                    <button type="button" class="btn btn-danger" onclick="destruir_registro('{{route('predictamen.destroy', $dictamen_registro->id)}}')">
                    <i class="fas fa-minus"></i>
                    </button>
@endcan

@can('read_dictamen')
<a href="{{route('predictamen.show', $dictamen_registro->id)}}" class="btn btn-success">
    <i class="fas fa-eye"></i>
</a>
@endcan

</div>


                        @can('read_revalidacion')
                        <a href="{{route('revalidacion.index', $dictamen_registro->id)}}">
                            <button type="button" class="btn btn-info">
                                <i class="fas fa-book"></i> Revaliación
                            </button>
                        </a>
                        @endcan
                    </td>
                 
                </tr>
            @endforeach
