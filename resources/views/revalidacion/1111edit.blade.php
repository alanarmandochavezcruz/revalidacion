
@extends('layout.app')

@section('contenido')

<h2>Crear</h2>
<h2>{{$select_uabjo_materia->materia_uabjo}}</h2>
<h2>{{$select_uabjo_materia->tipo}}</h2>


<form action="{{route('revalidacion.update', $revalidacionRegistro->id)}}" method="post">
	@csrf
	@METHOD('PATCH')

	<input type="text" name="dictamen" value="{{$revalidacionRegistro->dictamen}}">
	<input type="text" name="uabjo_materia" value="{{$revalidacionRegistro->uabjo_materia}}">



@if ( $select_uabjo_materia->tipo == "optativa")
	@if ( (count($uabjo_optativas) > 0) || ($select_uabjo_optativa) )
		<p>Uabjo Optativa</p>
		<select name="uabjo_optativa">
				@if (!$select_uabjo_optativa)
					<option value="">...</option>
				@else
					<option value="{{$select_uabjo_optativa->id}}">{{$select_uabjo_optativa->optativa_uabjo}}</option>
				@endif

			@foreach($uabjo_optativas as $uabjo_optativa)
				<option value="{{$uabjo_optativa->id}}">{{$uabjo_optativa->optativa_uabjo}}</option>
			@endforeach
		</select>
	@endif
@endif



<p>Universidad Materia</p>
	<select name="universidad_carrera_materia" id="mod_select">
				@if (!$select_universidad_carrera_materia)
					<option value="">...</option>
				@else
					<option value="{{$select_universidad_carrera_materia->id}}" class="{{$select_universidad_carrera_materia->tipo}}">{{$select_universidad_carrera_materia->materia}}</option>
				@endif
		@foreach($universidad_carrera_materias as $universidad_carrera_materia)
			<option value="{{$universidad_carrera_materia->id}}" class="{{$universidad_carrera_materia->tipo}}">{{$universidad_carrera_materia->materia}}</option>
		@endforeach
	</select>




	<div id="select_universidad_carrera_optativa">

@if ( $select_universidad_carrera_materia->tipo == "optativa")
	@if ( (count($universidad_carrera_optativas) > 0) || ($select_universidad_carrera_optativa) )
		<p>Universidad Optativa</p>
		<select name="universidad_carrera_optativa">
				@if (!$select_universidad_carrera_optativa)
					<option value="">...</option>
				@else
					<option value="{{$select_universidad_carrera_optativa->id}}">{{$select_universidad_carrera_optativa->optativa}}</option>
				@endif

			@foreach($universidad_carrera_optativas as $universidad_carrera_optativa)
				<option value="{{$universidad_carrera_optativa->id}}">{{$universidad_carrera_optativa->optativa}}</option>
			@endforeach
		</select>
	@endif
@endif

	</div>




	<input type="number" name="calificacion" min="6" max="10" step="0.1" value="{{$revalidacionRegistro->calificacion}}" />

	<input type="submit" value="Revalidar">	
</form>


@endsection


@section('script_registros')
<script>

$('#mod_select').change(function(){
    var tipo = $(this).find(':selected').attr('class');
    
    	var select_opt = "";
    if(tipo === "optativa"){


	@if ( (count($universidad_carrera_optativas) > 0) || ($select_universidad_carrera_optativa) )
		select_opt += "<p>Universidad Optativa</p>";
		select_opt += "<select name='universidad_carrera_optativa'>";
				@if (!$select_universidad_carrera_optativa)
					select_opt += "<option value=''>...</option>";
				@else
					select_opt += "<option value='{{$select_universidad_carrera_optativa->id}}'>{{$select_universidad_carrera_optativa->optativa}}</option>";
				@endif

			@foreach($universidad_carrera_optativas as $universidad_carrera_optativa)
				select_opt += "<option value='{{$universidad_carrera_optativa->id}}'>{{$universidad_carrera_optativa->optativa}}</option>";
			@endforeach
		select_opt += "</select>";
	@endif


    }
    	$( "#select_universidad_carrera_optativa" ).html(select_opt);
});


</script>
@endsection