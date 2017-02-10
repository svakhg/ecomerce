
@section('css')
  <style>
    
  </style>
@stop

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Ventas
        <small>Ventas de maringuizar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Ventas</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tablas de Ventas</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="data-table-mensajes" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Correo</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Detalles</th>
                </tr>
                </thead>
                <tbody id="table-body">
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    </tr>
  </div>
</div>

<div id="ShowModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mensaje <div style="color: red:" class="overlay"><i style="color: red;" class="fa fa-refresh fa-spin"></i></div></h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@stop

@section('scripts')
<script src="{{ asset('subadmin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('subadmin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
        $('#data-table-mensajes').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax:'/admin/inbox/all',
            iDisplayLength: 10
        });    

  });



</script>

@stop
