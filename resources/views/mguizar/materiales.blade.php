
@extends('Plantilla.principal')
 @section('content')

<div class="container-fluid"  >
    <br><br><br>

    {{-- <div class="col-md-3">
      <div class="thumbnail" style="padding: 0">
        <div style="padding:4px">
          <img alt="300x200" style="width: 100%" src="img/testimg1.jpg">
        </div>

        <div class="modal-footer" style="text-align: left">

          <div class="row">
              <h3>Producto</h3>
              <p class="pro-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i.</p>
            <div class="col-md-4"><b>4</b><br/><small>Stock</small></div>
            <div class="col-md-4"><b>$400</b><br/><small>Precio</small></div>
            <div class="col-md-4"><b>Torrey</b><br/><small>Marca</small></div>
            <div class="col-md-12">
                <button id="addCarrito" type="button" class="btn btn-success"><a style="color:white !important;" class="addcart"  data-id="">Añadir a carrito</a></button>


            </div>
          </div>
        </div>
      </div>
    </div> --}}

    @foreach($productos as $porduct)

        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
          <div class="thumbnail" style="padding: 0">
            <div style="padding:4px">
              <img alt="300x200" style="width: 100%" src="img/testimg1.jpg">
            </div>

            <div class="modal-footer" style="text-align: left">

              <div class="row">
                  <h4 style="margin:7px">{{$porduct->nombre}}</h4>
                  <p class="pro-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i.</p>
                <div class="col-xs-6 col-sm-6 col-md-6"><b>{{$porduct->marca}}</b><br/><small>Marca</small></div>
                <div class="col-xs-6 col-sm-6 col-md-6"><b>{{$porduct->modelo}}</b><br/><small>Modelo</small></div>


                    <div class="col-xs-6 col-sm-6 col-md-6"><b>{{$porduct->stock}}</b><br/><small>Stock</small></div>
                    <div class="col-xs-6 col-sm-6 col-md-6"><b>{{$porduct->precio}}</b></b><br/><small>Precio</small></div>



                <div class="col-md-12">
                    <br><br>
                    <button id="addCarrito" type="button" class="btn btn-success"><a style="color:white !important;" class="addcart" href="/cart/add/{{$porduct->id}}" data-id="{{$porduct->id}}">Añadir a carrito</a></button>


                </div>
              </div>
            </div>
          </div>
        </div>





    @endforeach
</div>
@endsection
