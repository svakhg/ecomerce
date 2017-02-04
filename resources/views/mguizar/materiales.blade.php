
@extends('Plantilla.principal')
 @section('content')

<div class="container-fluid"  >


    @foreach($productos as $porduct)
        <div class="col-md-4" id="box-product" style="text-align:center;line-height:105%;">
              <?php if($porduct->url != ""){
                echo "<img src='/storage/".$porduct->url."'  style='width:50%; height: 190px;'>";
                }else{
                  echo "<img src='/img/no.png' style='width:50%;height: 190px;' >";
                } ?>
            
            <h4>Producto: {{$porduct->nombre}}</h4>
            <h4>Modelo: {{$porduct->modelo}}</h4>
            <h4>Marca: {{$porduct->marca}}</h4>
            <span>En stock: {{$porduct->stock}}</span>

            {{-- <div class="row align-items-center">
                <div class="col">
                    <p style="font-size:10px;" id="description">Informacion</p>

                </div>

            </div> --}}

            {{-- <div class="row">
                <div class="col-sm-12">
                    <p style="font-size:10px; text-align:center" id="description">Mas Informacion</p>

                </div>

            </div> --}}

            <p style="line-height:105%;">Precio:&nbsp$&nbsp;{{$porduct->precio}}</p>
            {{-- <p><a class="addcart" href="/cart/add/{{$porduct->id}}" data-id="{{$porduct->id}}">Añadir a carrito</a></p> --}}
            <button id="addCarrito" type="button" class="btn btn-success"><a style="color:white !important;" class="addcart" href="/cart/add/{{$porduct->id}}" data-id="{{$porduct->id}}">Añadir a carrito</a></button>

        </div>
    @endforeach
</div>
@endsection
