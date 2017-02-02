
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
                      echo "<td><a class='label pull-right bg-green'  href=JavaScript:accion('".$key['IDBARRAS']."'); ><span class='fa fa-cart-plus'></span></th>";
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
        <h4 class="modal-title">Elejeir Categoria</h4>
      </div>
      <div class="modal-body">
            
              <div class="box-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="radio">
                        <img style="width: 40px;height: 40px;" src="/../../../img/icono1.png">&nbsp&nbsp<label><input type="radio" name="optradio">&nbspOption 1</label>
                      </div>
                      <div class="radio">
                        <img style="width: 40px;height: 40px;" src="/../../../img/icono2.png">&nbsp&nbsp<label><input type="radio" name="optradio">&nbspOption 2</label>
                      </div>
                      <div class="radio ">
                        <img style="width: 40px;height: 40px;" src="/../../../img/icono3.png">&nbsp&nbsp<label><input type="radio" name="optradio">&nbspOption 3</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="radio">
                        <img style="width: 40px;height: 40px;" src="/../../../img/icono4.png">&nbsp&nbsp<label><input type="radio" name="optradio">&nbspOption 4</label>
                      </div>
                      <div class="radio">
                        <img style="width: 40px;height: 40px;" src="/../../../img/icono5.png">&nbsp&nbsp<label><input type="radio" name="optradio">&nbspOption 5</label>
                      </div>
                      <div class="radio ">
                        <img style="width: 40px;height: 40px;" src="/../../../img/icono6.png">&nbsp&nbsp<label><input type="radio" name="optradio">&nbspOption 6</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <a href="JavaScript:loadproduct()"></a>
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
  }
  function loadproduct() {
    var  x = //create 
  }
</script>

@stop
