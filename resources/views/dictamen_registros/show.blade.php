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
                                                    <h3 class="card-title">Registro</h3>
                                                </div>


                                                    <div class="card-body">
                                                    


                                                    <div class="form-group">
                                                        <label for="clave">Clave oficio</label>
                                                        <p>{{$dictamenRegistro->clave}}</p>
                                                    </div>


                                                    <div class="form-group">
													   <label>Periodo</label>
                                                       <p>
                                                            {{ $dictamenRegistro->periodo_inicio }} - {{ $dictamenRegistro->periodo_fin }}
                                                           
                                                       </p>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="fecha_aprobacion">Fecha Aprovación</label>

                                                        <p>{{ $dictamenRegistro->fecha_aprobacion }}</p>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="semestre_alumno">Semestre Final del Alumno</label>
                                                        <p>{{ $dictamenRegistro->semestre_alumno }}</p>
                                                    </div>

        
                                                    <div class="form-group">
                                                        <label for="director_uabjo">Nombre Director Escuela de Ciencias</label>
                                                        <p>{{ $dictamenRegistro->director_uabjo }}</p>
                                                    </div>

        
                                                    <div class="form-group">
                                                        <label for="coordinador_uabjo">Nombre Coordinador Escuela de Ciencias</label>
                                                        <p>{{ $dictamenRegistro->coordinador_uabjo }}</p>
                                                    </div>
        
                                                    <div class="form-group">
                                                        <label for="director_escolares">Nombre Director Servicios Escolares</label>
                                                        <p>{{ $dictamenRegistro->director_escolares }}</p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="subdirector_escolares">Nombre Sub Director Servicios Escolares</label>
                                                        <p>{{ $dictamenRegistro->subdirector_escolares }}</p>
                                                    </div>
        
                                                    <div class="form-group">
                                                        <label for="secretaria_escolares">Nombre Secretaria Servicios Escolares</label>
                                                        <p>{{ $dictamenRegistro->secretaria_escolares }}</p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label >Estado</label>
                                                        <p>{{ $dictamenRegistro->estado }}</p>
                                                    </div>




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

@endsection