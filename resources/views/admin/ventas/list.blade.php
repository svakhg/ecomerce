
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
              
              <table id="data-table-ventas" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Correo</th>
                  <th>Total</th>
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

<div id="exampleModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Subir Nueva Imagen</h4>
      </div>
      <div class="modal-body">

            <form id="uploadimage" role="form"  action="/admin/sliders/upload" method="POST" enctype="multipart/form-data">
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control"  name="nombre" placeholder="Nombre">
                </div>              
                <div class="form-group">
                  <label for="exampleInputEmail1">Descripcion</label>
                  <input type="text" class="form-control" id="exampleInputEmail1"  name="description" placeholder="Descripcion">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Imagen</label>
                  <input id="imgInp" type="file" name="imagen" >

                  <p class="help-block">Imagen.</p>
                </div>
                <img  id="blah" src="#" alt="your image" style="width: 300px;width: 300px;" />
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Subir</button>
              </div>
            </form>
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
        $('#data-table-ventas').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
                        
            iDisplayLength: 10
        });    

  });

</script>

@stop
