
@section('css')
  <style>
    
  </style>
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
        <li class="active">Sliders</li>
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
              <a class="btn btn-primary" href="Javascript:showmodal()">agreagr</a>
              <table id="data-table-slider" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Marca</th>
                  <th>Modelo</th>
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
        $('#data-table-slider').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "/admin/sliders/load",            
            iDisplayLength: 10
        });    

  });



  $("#uploadimage").submit(function( event ) {
    
    if($("#imgInp").val() != '' ){
      
      return;
    }
    event.preventDefault();
  });

  function eliminar(identificador) {    
    swal({
      title: 'Estas seguro de Elimanar esta imagen  ?',
      text: "Una vez elimado no podras restaurar la imagen",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar!'
    }).then(function () {
      $.get("/admin/sliders/delete/"+identificador, function(data){
        swal(
          'Eliminado!',
          'La imagen se eliminado.',
          'success'
        )
        $('#'+identificador).parents("tr").remove();;
      });    
    })

  }

function status(identificador) {
  
    $.get("/admin/sliders/status/"+identificador, function(data){
        swal('Good job!','You clicked the button!','success')
        $('#eye'+identificador).css("color", data.color);
    });      
}

  function showmodal() {
    $('#exampleModal').modal('show');
  }
  function readURL(input) {

      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#blah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
  $("#imgInp").change(function(){
      readURL(this);
  });
</script>

@stop
