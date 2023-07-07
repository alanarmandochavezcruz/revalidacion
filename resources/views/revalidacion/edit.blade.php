@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Revalidación') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Revalidación</h3>
                        </div>
                        <div class="card-body">

                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">


                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Editar Registro</h3>
                                                </div>


                                                    <div class="card-body">



<h2>{{$uabjo_materia->nombre}} ({{$uabjo_materia->tipo}})</h2>


                                                    @if($errors->any())
                                                    <div class="alert alert-danger alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                                            <ul>
                                                            @foreach($errors->all() as $error)
                                                                <li>{{$error}}</li>
                                                            @endforeach
                                                            </ul>
                                                    </div>
                                                    @endif



<form action="{{route('revalidacion.update', [$revalidacionRegistro->id, $revalidacionRegistro->dictamen, $revalidacionRegistro->uabjo_materia])}}" method="post">
	@csrf
	@METHOD('PUT')

	@if (count($uabjo_optativas) > 0)
        <div class="form-group">
            <label>Uabjo Optativa</label>
            <select name="uabjo_optativa" class="form-control">
                @foreach($uabjo_optativas as $uabjo_optativa)
                    <option value="{{$uabjo_optativa->id}}" {{ $uabjo_optativa->id == $revalidacionRegistro->uabjo_optativa ? 'selected' : '' }}>{{$uabjo_optativa->nombre}}</option>
                @endforeach
            </select>
        </div>
	@endif


        <div class="form-group">
            <label>Universidad Materia</label>
        	<select name="universidad_carrera_materia" id="mod_select" class="form-control">
                        <option value="0">...</option>
        		@foreach($universidad_materias as $universidad_materia)
        			<option value="{{$universidad_materia->id}}" class="{{$universidad_materia->tipo}}" 
        				{{ $universidad_materia->id == $revalidacionRegistro->universidad_carrera_materia ? 'selected' : '' }}>{{$universidad_materia->nombre}}</option>
        		@endforeach
        	</select>
        </div>


        <div class="form-group" id="select_universidad_optativa">


	@if (count($universidad_optativas) > 0)
        <label>Universidad Optativa</label>
		<select name='universidad_carrera_optativa' class="form-control">
			@foreach($universidad_optativas as $universidad_optativa)
				<option value='{{$universidad_optativa->id}}' {{ $universidad_optativa->id == $revalidacionRegistro->universidad_carrera_optativa ? 'selected' : '' }}>{{$universidad_optativa->nombre}}</option>
			@endforeach
		</select>
	@endif

        </div>


        <div class="form-group">
            <label for="calificacion">calificacion</label>
    	    <input type="number" name="calificacion" id="calificacion" min="6" max="10" step="0.1" class="form-control" value="{{$revalidacionRegistro->calificacion}}" />
        </div>


	
        <div class="form-group">
            <input type="submit" value="Revalidar" class="btn btn-primary" />
        </div>	
</form>




                                                    </div>

                                                    <div class="card-footer">
                                                    </div>
                                                
                                            </div>                                            



                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


@endsection


@section('styles')
@endsection

@section('scripts')


<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}" ></script>
<script>

$('#mod_select').change(function(){
    var tipo = $(this).find(':selected').attr('class');
    
    	var select_opt = "";
    if(tipo === "optativa"){

	@if (count($universidad_optativas) > 0)
		select_opt += "<label>Universidad Optativa</label><select name='universidad_carrera_optativa' class='form-control'>";
			@foreach($universidad_optativas as $universidad_optativa)
				select_opt += "<option value='{{$universidad_optativa->id}}' {{ $universidad_optativa->id == $revalidacionRegistro->universidad_carrera_optativa ? 'selected' : '' }}>{{$universidad_optativa->nombre}}</option>";
			@endforeach
		select_opt += "</select>";
	@endif


    }
    	$( "#select_universidad_optativa" ).html(select_opt);
});


</script>
@endsection


