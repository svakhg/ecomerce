
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
                  <th>Nombre Completo</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th>Total</th>
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
        <h4 class="modal-title">Deatlles de Venta <div style="color: red:" class="overlay"><i style="color: red;" class="fa fa-refresh fa-spin"></i></div></h4>
      </div>
      <div class="modal-body">
      <div class="content">
        <div class="row" style="margin-bottom: 20px;">
          <div class="col-md-4">
            <span class="fa fa-user" ></span><label>Nombre</label><br>
            <span id="nombre_"></span>
          </div>
          <div class="col-md-4">
            <span class="fa fa-envelope" ></span><label>Correo</label><br>
            <span id="correo_"></span>
          </div>
          <div class="col-md-4">
            <span class="fa fa-money" ></span><label>Total</label><br> 
            <span id="total_"></span>
          </div>
        </div>
        <div class="row" style="margin-bottom: 20px;"> 
          <div class="col-md-3">
            <span class="fa fa-map-pin" ></span><label>Estado</label><br>
             <span id="estado_"></span>
          </div>
          <div class="col-md-3">
            <span class="fa fa-map" ></span><label>Ciudad</label><br>
            <span id="ciudad_"></span>
          </div>
          <div class="col-md-6">
            <span class="fa fa-map-marker" ></span><label>Direccion</label><br>
            <span id="direccion_"></span>
          </div>
        </div>
        <div class="row" style="margin-bottom: 20px;">
          <div class="col-md-3"><span class="fa fa-phone" ></span><label>Telefono</label><br>
            <span id="telefono_"></span>
          </div>
          <div class="col-md-3"><span class="fa fa-calendar" ></span><label>Fecha</label><br>
            <span id="fecha_"></span>
          </div>
          
        </div>
          <table class="table" id="table-ventas">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Cantidad</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
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
            ajax:'/admin/ventas/all',
            iDisplayLength: 10
        });    

  });

  function Show(arg) {
    clean();
    $('#table-ventas tbody > tr').remove();
    $('#ShowModal').modal('show');
      $.ajax({
        type:'GET',
        url: '/admin/ventas/unidad/'+arg,
      beforeSend: function() {
          $('.overlay').show();
      },
      success: function(data) {
        
        showme(data[0])
        for (var i = 0; i < data[1].length; i++) {
          $("#table-ventas").find('tbody').append('<tr><td>'+data[1][i].nombre+'</td><td>'+data[1][i].marca+'</td><td>'+data[1][i].precio+'</td><td>'+data[1][i].cantidad+'</td>');
        }

      },
      complete: function() {
          $('.overlay').hide();
      }}) 
  }

function showme(data) {
  //nombre_  correo_ total_ estado_ ciudad_ direccion_  telefono_ fecha_ 

  $('#nombre_').text(data.nombre);
  $('#correo_').text(data.correo);
  $('#total_').text(data.total);
  $('#estado_').text(data.estado);
  $('#ciudad_').text(data.ciudad);
  $('#direccion_').text(data.domicilio);
  $('#telefono_').text(data.telefono);
  $('#fecha_').text(data.fecha);
}
function clean() {
  //nombre_  correo_ total_ estado_ ciudad_ direccion_  telefono_ fecha_ 

  $('#nombre_').text("");
  $('#correo_').text("");
  $('#total_').text("");
  $('#estado_').text("");
  $('#ciudad_').text("");
  $('#direccion_').text("");
  $('#telefono_').text("");
  $('#fecha_').text("");
}


</script>

@stop
