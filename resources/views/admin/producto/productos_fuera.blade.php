
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
                      echo "<td><a class='label pull-right bg-green'  href='JavaScript:accion(".$key['IDBARRAS']."); '><span class='fa fa-cart-plus'></span></th>";
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
    alert(argumento);
  }
</script>

@stop
