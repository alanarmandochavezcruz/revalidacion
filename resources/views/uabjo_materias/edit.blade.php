@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Materias Escuela de Ciencias') }}</h1>
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
                            <h3 class="card-title">Materias Escuela de Ciencias</h3>
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


                                                <form action="{{route('uabjo_materias.update', [$id_uabjo_carrera, $uabjoMateria->id])}}" method="post">
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
                                                        <label for="nombre">Nombre Materia</label>
                                                        <input type="text" name="nombre" value="{{$uabjoMateria->nombre}}" class="form-control" id="nombre" placeholder="Ingrese nombre" required minlength="1" maxlength="255" pattern="([a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+)(\s[a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+)*" title="Materia Escuela de Ciencias">
                                                    </div>














<div class="form-group" data-select2-id="29">
    <label>Tipo</label>
        <select name="tipo" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
            <option value="materia"  {{ $uabjoMateria->tipo == 'materia' ? 'selected' : '' }} >Materia</option>
            <option value="optativa" {{ $uabjoMateria->tipo == 'optativa' ? 'selected' : '' }}>Optativa</option>
        </select>
</div>




















                                                    </div>

                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
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