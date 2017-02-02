
@section('css')

@stop

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Productos
        <small>Productos fuera  ecomerce</small>
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
              <h3 class="box-title">Tablas de Productos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Precio</th>
                  <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                    foreach ($data as $key) {
                      echo "<tr>";
                      echo "<td>".$key['IDCODIGO']."</td>";
                      echo "<td>".$key['NOMBRECORTO']."</td>";
                      echo "<td>".$key['MARCA']."</td>";
                      echo "<td>".$key['MODELO']."</td>";
                      echo "<td>".$key['precioventa3']."</th>";
                      echo "<td><a class='label pull-right bg-green'  href=Javascript:accion('".$key['IDBARRAS']."'); ><span class='fa fa-cart-plus'></span></th>";
                      echo "</td>";
                    }
                  ?>
                </tbody>
                <?php echo "<a href='".$next_page_url."' class='btn btn-primary btn-sm btn-flat'>Sigiente</a>&nbsp;"; ?>
                <?php echo "<a href='".$prev_page_url."' class='btn btn-primary btn-sm btn-flat' >atras</a>&nbsp;";?>
                <input type="text" name="searching"><label>Buscar</label>
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
        <h4 class="modal-title">Elejeir Categoria &nbsp  </h4>
      </div>
      <div class="modal-body">
            
              <div class="box-body">
                <div class="form-group">
                  <div class="row">

                    <div class="col-md-6">
                      
                        <a href="Javascript:loadproduct(1)"><img style="width: 40px;height: 40px;" src="/../../../img/icono1.png">&nbsp Opcion 1</a>

                      <div class="radio">
                        <a href="Javascript:loadproduct(2)"><img style="width: 40px;height: 40px;" src="/../../../img/icono2.png">&nbsp Opcion 2</a>
                      </div>
                      <div class="radio ">
                        <a href="Javascript:loadproduct(3)"><img style="width: 40px;height: 40px;" src="/../../../img/icono3.png">&nbsp Opcion 3</a>
                      </div>
                      
                    </div>
                    <div class="col-md-6">
                      <div class="radio">
                        <a href="Javascript:loadproduct(4)"><img style="width: 40px;height: 40px;" src="/../../../img/icono4.png">Opcion 4</a>
                      </div>
                      <div class="radio">
                        <a href="Javascript:loadproduct(5)"><img style="width: 40px;height: 40px;" src="/../../../img/icono5.png">&nbsp Opcion 5</a>
                      </div>
                      <div class="radio ">
                        <a href="Javascript:loadproduct(6)"><img style="width: 40px;height: 40px;" src="/../../../img/icono6.png">&nbsp Opcion 6</a>
                      </div>
                      
                    </div>
                  </div>
                  <span id="opcioneleguida"></span>
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

@stop

@section('scripts')
<script src="{{ asset('subadmin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('subadmin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    var cargar = 0;
    var product = null;
    $('.overlay').hide();
    $("#example1").DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      searching: true,    
      iDisplayLength: 10
    });

  });

  function accion(argumento) {
    $('#exampleModal').modal('show');
    product = argumento;
  }
  function loadproduct(carga) {
    $('#opcioneleguida').text('cagaras a este prodcuto la categoria'+carga);
    cargar = carga;
  }
  $( "#yes" ).click(function() {
    
      $.ajax({
        type:'GET',
        url: '/admin/productos/plus/agregar/?categoria='+cargar+'&argumento=x',
        data: {prodcuto:product},
      beforeSend: function() {
          $('.overlay').show();
      },
      success: function(data) {
        console.log(data);
        swal(
          'Nuevo Producto cargado!',
          'Este producto  aparecera en la lista de prodcutos en linea!',
          'success'
        )          
          $('#exampleModal').modal('hide');
          cargar = 0;
          product = null;
           $('#opcioneleguida').text(' ');        
      },
      complete: function() {
          $('.overlay').hide();
          cargar = 0;
          product = null;
          $('#opcioneleguida').text(' ');
      }})    
    
  });  
 

</script>

@stop
