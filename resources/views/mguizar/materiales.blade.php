
@extends('Plantilla.principal')
 @section('content')

<div class="container-fluid"  >


    @foreach($productos as $porduct)
        <div class="col-md-4" id="box-product" style="text-align:center;line-height:105%;">
            {{-- <i class="fa fa-map-marker fa-5x" ></i> --}}
            <img style="width:50%;" src="{{ asset('img/torreyy.png') }}" alt="" />
            <h5>{{$porduct->MARCA}} - {{$porduct->MODELO}}</h5>
            {{-- <h6 id="description">{{$porduct->DESCRIPCION}}</h6> --}}
            <button style="margin-bottom:5px;" type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
              Descripción
            </button>
            {{-- <div class="row align-items-center">
                <div class="col">
                    <p style="font-size:10px;" id="description">{{$porduct->DESCRIPCION}}</p>

                </div>

            </div> --}}

            {{-- <div class="row">
                <div class="col-sm-12">
                    <p style="font-size:10px; text-align:center" id="description">{{$porduct->DESCRIPCION}}</p>

                </div>

            </div> --}}

            <p style="line-height:105%;">$&nbsp;{{$porduct->precioventa1}}</p>
            {{-- <p><a class="addcart" href="/cart/add/{{$porduct->IDCODIGO}}" data-id="{{$porduct->IDCODIGO}}">Añadir a carrito</a></p> --}}
            <button id="addCarrito" type="button" class="btn btn-success"><a style="color:white !important;" class="addcart" href="/cart/add/{{$porduct->IDCODIGO}}" data-id="{{$porduct->IDCODIGO}}">Añadir a carrito</a></button>

        </div>
    @endforeach
</div>
@endsection
