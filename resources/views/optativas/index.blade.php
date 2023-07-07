@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Optativas') }}</h1>
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
                            <h3 class="card-title">Optativas</h3>
                        </div>
                        <div class="card-body">

<p>
    <a href="{{route('carreras.index', $id_universidad)}}" class="btn btn-success">
        <i class="fas fa-arrow-left"></i>
    </a>
@can('create_optativas')
    <a href="{{route('optativas.create', [$id_universidad, $id_carrera])}}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
    </a>
@endcan
</p>



<!--  Modal Eliminar Registro
----------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------
-->


@can('delete_optativas')
<div class="modal fade modal-fullscreen" id="modal-eliminar_registro">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Registro</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


<form id="eliminar_registro">
                
                @csrf
                @METHOD('DELETE')

                <div class="form-group">
                    <button class="btn btn-danger" id="btn_eliminar" >Eliminar
                     </button>
                </div>
</form>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <!--<button type="button" class="btn btn-primary">Guardar</button>-->
            </div>
        </div>
    </div>
</div>
@endcan

<!--
----------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------
-->

<!-- 
----------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------
-->

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Optativa</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
                                @include('optativas.registros')

    </tbody>
    <tfoot>
        <tr>
            <th>Optativa</th>
            <th></th>
        </tr>
    </tfoot>
</table>

<!--
----------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------
-->






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
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" defer="defer"/>
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" defer="defer"/>
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" defer="defer"/>
 
  <!-- Modal Eliminar Registro -->
  <link rel="stylesheet" href="{{ asset('css/modal_eliminar_registro.css') }}" defer="defer"/>
@endsection

@section('scripts')


<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}" ></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"  defer="defer"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"  defer="defer"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"  defer="defer"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"  defer="defer"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"  defer="defer"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"  defer="defer"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"  defer="defer"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"  defer="defer"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"  defer="defer"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"  defer="defer"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"  defer="defer"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"  defer="defer"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"  defer="defer"></script>



<script>
  $(function () {
    $("#example11").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "ordering": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');



$('#modal-eliminar_registro').on('hidden.bs.modal', function () {
        $("#eliminar_registro").removeAttr("method");
        $("#eliminar_registro").removeAttr("action");
        $("#btn_eliminar").removeAttr("type");
});

  });
</script>


<script type="text/javascript">



    function destruir_registro(url_destroy){
        $('#modal-eliminar_registro').modal('show');


        //$("#btn_eliminar").attr("data-value", url_destroy);
        $("#eliminar_registro").attr("method", "post");
        $("#eliminar_registro").attr("action", url_destroy);
        $("#btn_eliminar").attr("type", "submit");
        
    }
</script>

@endsection