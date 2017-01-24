@extends('Admin.admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
    <br><br><br><br><br>
        <form method="post" action="/cargo-slider" accept-charset="UTF-8" enctype="multipart/form-data">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label>Titulo de la Slider</label>
                <input class="form-control" name="titulo">
                <p class="help-block">Agrega un titulo a el slider.</p>
            </div>

            <div class="form-group">
                <label>Descricion del Slider</label>
                <input class="form-control" name="descripcion">
                <p class="help-block">Las descriciones son importantes.</p>
            </div>                         

            <div class="form-group">
                <label>Agregar Imagen</label>
                <input type="file" name="slide">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Subir Slider">
                
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br> 
        </form>          
        
    </div>

    <div class="col-lg-3">
        <br><br><br><br><br>
        <a href="#">Back</a>
    </div>
</div>
@endsection
