
@section('css')

@stop

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Productos
        <small>compra en linea</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Productos</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Produtos de Ecomerce</h3>

            </div>
            <!-- /.box-header -->
            <a href="/admin/productos/plus" class="btn btn-primary btn-sm btn-flat">Agregar productos</a><br>
            <div class="box-body">
              
              <table id="data-table-prodcutos" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Precio</th>
                  <th>Stock</th>
                  <th>Categoria</th>
                  <th>Imagen</th>
                  <th>accion</th>
                </tr>
                </thead>
                <tbody>
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
  </div>
</div>

<div id="exampleModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cargar Stock &nbsp  </h4>
      </div>
      <div class="modal-body">
            
              <div class="box-body">
                <div class="form-group">
                  <label>Numero de Stock</label>&nbsp<input type="text" id="stock_nuevo">
                </div>
              </div>
              <!-- /.box-body -->
              
      </div>
      <div class="modal-footer">
        <button class="btn  pull-left bg-green" id="yes">Cargar
                    <div class="overlay">
                      <i class="fa fa-refresh fa-spin"></i>
                    </div>        
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="exampleModal2" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cargar Stock &nbsp  </h4>
      </div>
      <div class="modal-body">
            
              <div class="box-body">
              <form id="sendimg" method="POST" action="/admin/productos/upload/img/" enctype="multipart/form-data">
              <input type="hidden" id="identificador" name="identificador">  
                <div class="form-group"> 
                </div>
                <div class="form-group">
                    <label>Imagen</label>
                    <input type="file" name="img">  
                </div>
              

              </div>
              <!-- /.box-body -->
              
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn  pull-left bg-green" >       
      
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modalImgen" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Imagen de producto &nbsp  </h4>
      </div>
      <div class="modal-body">
                          <div class="overlay2">
                      <i class="fa fa-refresh fa-spin"></i>
                    </div>  
           <div class="box-body">
             <img id="cargarImagenModal" src="/img/no.png">
           </div>
              
      </div>
      <div class="modal-footer">   
      
        
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
     




    $('#data-table-prodcutos').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: "/admin/productos/alls",
      iDisplayLength: 10
    });


  });


  function openModalStock(id,stock) {

    $('#exampleModal').modal('show'); 
    $('#stock_nuevo').val(stock);
    $('.overlay').hide();
    $('.overlay2').hide();

     $( "#yes" ).click(function() {
          var identicica = $('#stock_nuevo').val();
            $.ajax({
              type:'GET',
              url: '/admin/productos/stock/'+id+'/?sotock_modificade='+identicica,
            beforeSend: function() {
                $('.overlay').show();
            },
            success: function(data) {
              console.log(data);
              $('#data-table-prodcutos').DataTable().ajax.reload(null, false);
              swal(
                'Unidad Cargada a Stock',
                'Este producto aparecera con un stock de'+identicica,
                'success'
              )          
                $('#exampleModal').modal('hide');
                
            },
            complete: function() {
                $('.overlay').hide();

            }})    
          
        });
  }
function mostrarImg(argument) {
  $("#cargarImagenModal").attr('src', '/img/no.png');
  $('#modalImgen').modal('show');
  $.ajax({
    type:'GET',
    url: '/admin/productos/img/'+argument,
    beforeSend: function() {
      $('.overlay2').show();
    },
    success: function(data) {
      console.log(data);
      $("#cargarImagenModal").attr('src', data);
    },
    complete: function() {
      $('.overlay2').hide();
    }}) 
}

   function changeStatus(argument) {
      $('#exampleModal2').modal('show');
      $('#identificador').val(argument);










      /*
    $( "#sendimg" ).submit(function( event ) {
          alert("ok");
            $.ajax({
              type:'POST',
              url: '/admin/productos/upload/img/',
              data:new FormData(this),
            success: function(data) {
              console.log(data);
                alert("oki");
            }
        })


      event.preventDefault();
    });*/
   }
 


</script>

@stop
