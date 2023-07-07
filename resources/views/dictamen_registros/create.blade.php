@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dictamen') }}</h1>
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
                            <h3 class="card-title">Dictamen</h3>
                        </div>
                        <div class="card-body">

                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">


                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Crear Registro</h3>
                                                </div>


                                                <form action="{{route('predictamen.store', $id_alumno)}}" method="post">
                                                    <div class="card-body">


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
                                                    

                                                    @csrf

                                                    <div class="form-group">
                                                        <label for="clave">Clave oficio</label>
                                                        <input type="text" name="clave" class="form-control" id="clave" placeholder="Ingrese Clave" value="{{old('clave')}}" required minlength="1" maxlength="255" pattern="([0-9A-Z]+)(\/[0-9A-Z]+)*" title="Clave del Oficio">
                                                    </div>

													<h5 class="mt-12">Periodo</h5>
                                                    <div class="row">
	                                                    <div class="col-lg-6">
	                                                    	
		                                                    <div class="form-group">
		                                                        <label for="periodo_inicio">Inicio</label>
		                                                        <input type="number" name="periodo_inicio" class="form-control" id="periodo_inicio" min="1800" max="9999" placeholder="0000" value="{{old('periodo_inicio')}}" required>
		                                                    </div>

	                                                    </div>

	                                                    <div class="col-lg-6">
	                                                    	
		                                                    <div class="form-group">
		                                                        <label for="periodo_fin">Fin</label>
		                                                        <input type="number" name="periodo_fin" class="form-control" id="periodo_fin" min="1800" max="9999" placeholder="0000" value="{{old('periodo_fin')}}" required>
		                                                    </div>

                                                    
	                                                    </div>
                                                    </div>





                                                    <div class="form-group">
                                                        <label for="semestre_alumno">semestre_alumno</label>
                                                        <input type="text" name="semestre_alumno" class="form-control" id="semestre_alumno" placeholder="Ingrese nombre" value="{{old('semestre_alumno')}}" required minlength="5" maxlength="7" pattern="([a-zéA-ZÉ]+)" title="Semestre Alumno">
                                                    </div>

        
                                                    <div class="form-group">
                                                        <label for="director_uabjo">Nombre director uabjo</label>
                                                        <input type="text" name="director_uabjo" class="form-control" id="director_uabjo" placeholder="Ingrese nombre" value="{{old('director_uabjo')}}" required minlength="1" maxlength="255" pattern="([a-záéíóúüñA-ZÁÉÍÓÚÜÑ.]+)(\s[a-záéíóúüñA-ZÁÉÍÓÚÜÑ.]+)*" title="Nombre del Director Escuela de Ciencias">
                                                    </div>
        
                                                    <div class="form-group">
                                                        <label for="coordinador_uabjo">Nombre coordinador uabjo</label>
                                                        <input type="text" name="coordinador_uabjo" class="form-control" id="coordinador_uabjo" placeholder="Ingrese nombre" value="{{old('coordinador_uabjo')}}" required minlength="1" maxlength="255" pattern="([a-záéíóúüñA-ZÁÉÍÓÚÜÑ.]+)(\s[a-záéíóúüñA-ZÁÉÍÓÚÜÑ.]+)*" title="Nombre del Coordinador de la Escuela de Ciencias">
                                                    </div>
        
                                                    <div class="form-group">
                                                        <label for="director_escolares">Nombre Director escolares</label>
                                                        <input type="text" name="director_escolares" class="form-control" id="director_escolares" placeholder="Ingrese nombre" value="{{old('director_escolares')}}" required minlength="1" maxlength="255" pattern="([a-záéíóúüñA-ZÁÉÍÓÚÜÑ.]+)(\s[a-záéíóúüñA-ZÁÉÍÓÚÜÑ.]+)*" title="Nombre del Director de Servicios Escolares">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="subdirector_escolares">Nombre Sub Director escolares</label>
                                                        <input type="text" name="subdirector_escolares" class="form-control" id="subdirector_escolares" placeholder="Ingrese nombre" value="{{old('subdirector_escolares')}}" required minlength="1" maxlength="255" pattern="([a-záéíóúüñA-ZÁÉÍÓÚÜÑ.]+)(\s[a-záéíóúüñA-ZÁÉÍÓÚÜÑ.]+)*" title="Nombre del Subdirector de Servicios Escolares">
                                                    </div>
        
                                                    <div class="form-group">
                                                        <label for="secretaria_escolares">Nombre secretaria escolares</label>
                                                        <input type="text" name="secretaria_escolares" class="form-control" id="secretaria_escolares" placeholder="Ingrese nombre" value="{{old('secretaria_escolares')}}" required minlength="1" maxlength="255" pattern="([a-záéíóúüñA-ZÁÉÍÓÚÜÑ.]+)(\s[a-záéíóúüñA-ZÁÉÍÓÚÜÑ.]+)*" title="Nombre del Secretario(a) de Servicios Escolares">
                                                    </div>



                                                    </div>

                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Crear</button>
                                                    </div>
                                                </form>
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

@endsection