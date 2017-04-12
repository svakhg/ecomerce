
@extends('Plantilla.principal')
 @section('content')


     <br><br><br>





         {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 transition-width thumbnail col-woverflow" style="height:350px;background-color:;">
             <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 thumb col-wpading" style="height:350px;background-color:blue;">

                             <img src="img/torrey.png" class="img-responsive img-fit" alt="">


             </div>
             <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="height:350px;">
                 <div class="row" style="background-color:white">
                     <div class="col-xs-12 col-sm-12 col-md-12" style="">
                         <h3>Bascula</h3>
                     </div>


                     <div class="col-xs-8 col-sm-8 col-md-8" style="">
                         <b>BTR-80-22-305C</b><br/><small>Modelo</small>
                     </div>
                     <div class="col-xs-4 col-sm-4 col-md-4" style="">
                         <b>TORREY</b><br/><small>Marca</small>
                     </div>


                     <div class="col-xs-8 col-sm-8 col-md-8" style="">
                         <h4>$15,000.00</h4>

                     </div>
                     <div class="col-xs-4 col-sm-4 col-md-4">
                         <b>4</b><br/><small>Stock</small>
                     </div>


                     <div class="col-xs-12 col-sm-12 col-md-12" style="" >
                         <p style="text-align:justify">Descripcion Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                              ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                              in reprehenderit in voluptate velit esse cil lorem</p>

                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12" style="" >
                         <br>
                         <button id="addCarrito" type="button" class="btn btn-success"><a style="color:white !important;" class="addcart" href="" data-id="">Añadir a carrito</a></button>
                         <br><br>
                     </div>

                 </div>

             </div>

         </div> --}}

@foreach($productos as $porduct)
{{-- Inicio Product-Grid --}}
    <div class="col-xs-12 col-sm-6 col-md-6 transition-width" style="height:380px;background-color:;padding:15px">
        <div class="thumbnail" style="height:100%;width:100%">

                <div class="col-xs-5 col-sm-5 col-md-5 col-wpading" style="height:100%;background-color:orange">
                    <img src="img/torrey.png" class="img-responsive img-fit" alt="">

                </div>
                <div class="col-xs-7 col-sm-7 col-md-7" style="height:100%;background-color:">
                    <div class="row" style="background-color:white">
                        <div class="col-xs-12 col-sm-12 col-md-12" style="">
                            <h3>{{$porduct->nombre}}</h3>
                        </div>


                        <div class="col-xs-8 col-sm-8 col-md-8" style="">
                            <b>{{$porduct->modelo}}</b><br/><small>Modelo</small>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4" style="">
                            <b>{{$porduct->marca}}</b><br/><small>Marca</small>
                        </div>


                        <div class="col-xs-8 col-sm-8 col-md-8" style="">
                            <h4>${{$porduct->precio}}</h4>

                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <b>{{$porduct->stock}}</b><br/><small>Stock</small>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12" style="" >
                            <p style="text-align:justify">Descripcion Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                 ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                 in reprehenderit in voluptate velit esse cil lorem</p>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" style="" >
                            <br>
                            <button id="addCarrito" type="button" class="btn btn-success"><a style="color:white !important;" class="addcart" href="/cart/add/{{$porduct->id}}" data-id="{{$porduct->id}}">Añadir a carrito</a></button>
                            <br><br>
                        </div>

                    </div>

                </div>


        </div>


    </div>
{{-- END Produnct-Grid     --}}
@endforeach










@endsection
