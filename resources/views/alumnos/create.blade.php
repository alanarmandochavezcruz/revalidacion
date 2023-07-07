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
                                                    <h3 class="card-title">Crear Registro</h3>
                                                </div>


                                                <form action="{{route('alumnos.store', [$id_uabjo_carrera, $id_universidad,$id_universidad_carrera])}}" method="post">
                                                    <div class="card-body">

                                                    <div class="form-group">
                                                        
                                                         @if($errors->any())
                                                         <div class="alert alert-danger alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                                                    <ul>
                                                                        @foreach($errors->all() as $error)
                                                                            <li>
                                                                                {{$error}}
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                        </div>
                                                         @endif
                                                    </div>


                                                    @csrf

                                                    <div class="form-group">
                                                        <label for="curp">Curp Alumno(a)</label>
                                                        <input type="text" name="curp" class="form-control" placeholder="Ingrese nombre(s)" value="{{ old('curp') }}" required minlength="18" maxlength="18" pattern="([A-Z0-9]+)" title="Curp Alumno">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="clave">Clave Alumno(a)</label>
                                                        <input type="text" name="clave" class="form-control" placeholder="Ingrese nombre(s)" value="{{ old('clave') }}" required minlength="6" maxlength="6" pattern="([a-zA-Z0-9]+)" title="Clave Alumno">
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="nombres">Nombre(s) Alumno(a)</label>
                                                        <input type="text" name="nombres" class="form-control" placeholder="Ingrese nombre(s)" value="{{ old('nombres') }}" required minlength="1" maxlength="255" pattern="([a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+)(\s[a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+)*" title="Nombre(s) Alumno(a)">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="apellidos">Apellido(s) Alumno(a)</label>
                                                        <input type="text" name="apellidos" class="form-control" placeholder="Ingrese nombre(s)" value="{{ old('apellidos') }}" required minlength="1" maxlength="255" pattern="([a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+)(\s[a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+)*" title="Apellido(s) Alumno(a)">
                                                    </div>


<div class="form-group">
    <label>Sexo</label>
        <select name="sexo" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
            <option value="hombre"  {{ old('sexo') == 'hombre' ? 'selected' : '' }} >hombre</option>
            <option value="mujer" {{ old('sexo') == 'mujer' ? 'selected' : '' }}>mujer</option>
        </select>
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