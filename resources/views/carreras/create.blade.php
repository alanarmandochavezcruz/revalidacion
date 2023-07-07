@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Carreras') }}</h1>
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
                            <h3 class="card-title">Carreras</h3>
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


                                                <form action="{{route('carreras.store', $id_universidad)}}" method="post">
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
                                                        <label for="nombre">Nombre carrera</label>
                                                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre" value="{{ old('nombre') }}" required minlength="1" maxlength="255" pattern="([a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+)(\s[a-záéíóúüñA-ZÁÉÍÓÚÜÑ]+)*" title="Nombre Carrera">
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