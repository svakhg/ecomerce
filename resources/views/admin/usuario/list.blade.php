
@section('css')
  <style>
    
  </style>
@stop

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Personal
        <small>PersonalAutorizado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Personal</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Personal autorizado</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <a class="btn btn-primary" href="Javascript:showmodal()">Nuevo personal</a>
              <table id="data-table-slider" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Numero de empleado </th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Permiso</th>
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
        <h4 class="modal-title">Registrar personal </h4>
      </div>
      <div class="modal-body">


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Personal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Numero de Personal</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Correo</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Contraseña</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <p class="help-block">Permiosos de de Personal </p>
                </div>

                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Spervisor 
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Logistica
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" >
                      Atencion A clientes
                    </label>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
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
/*
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
*/
  function showmodal() {
    $('#exampleModal').modal('show');
  }
  /*
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
  });*/
</script>

@stop
