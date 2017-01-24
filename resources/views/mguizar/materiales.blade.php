
@extends('Plantilla.principal')
 @section('content')

<div class="col-md-12"  style="text-align:center;line-height:105%;">


    @foreach($productos as $porduct)
        <div class="col-md-4">
            {{-- <i class="fa fa-map-marker fa-5x" ></i> --}}
            <img src="{{ asset('img/torreyy.png') }}" alt="" />
            <h5>{{$porduct->MARCA}} - {{$porduct->MODELO}}</h5>
            <p style="font-size:10px;" id="description">{{$porduct->DESCRIPCION}}</p>
            <p style="line-height:105%;">$&nbsp;{{$porduct->precioventa1}}</p>
            {{-- <p><a class="addcart" href="/cart/add/{{$porduct->IDCODIGO}}" data-id="{{$porduct->IDCODIGO}}">Añadir a carrito</a></p> --}}
            <button id="addCarrito" type="button" class="btn btn-success"><a style="color:white !important;" class="addcart" href="/cart/add/{{$porduct->IDCODIGO}}" data-id="{{$porduct->IDCODIGO}}">Añadir a carrito</a></button>

        </div>
    @endforeach
</div>
@endsection
