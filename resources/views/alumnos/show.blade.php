@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Alumnos') }}</h1>
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
                            <h3 class="card-title">Alumnos</h3>
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
                                                            <label>Nombre(s) Alumno</label>
                                                            <p>{{$alumno->nombres}}</p>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Apellido(s) Alumno</label>
                                                            <p>{{$alumno->apellidos}}</p>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Sexo Alumno</label>
                                                            <p>{{$alumno->sexo}}</p>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Curp Alumno</label>
                                                            <p>{{$alumno->curp}}</p>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Clave Alumno</label>
                                                            <p>{{$alumno->clave}}</p>
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