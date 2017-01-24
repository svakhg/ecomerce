@extends('Admin.admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-6">
        
            <div class="form-group">
                <label>Codigo Barra</label>
                <input class="form-control">
                <p class="help-block">descricon.</p>
            </div>

            <div class="form-group">
                <label>Descricion</label>
                <input class="form-control">
                <p class="help-block">descricon.</p>
            </div>


            <div class="form-group">
                <label>Precio Venta</label>
                <input class="form-control">
                <p class="help-block">descricon.</p>
            </div>                            


            <div class="form-group">
                <label>Text Input with Placeholder</label>
                <input class="form-control" placeholder="Enter text">
            </div>

            <div class="form-group">
                <label>Subir imagenes </label>
                <p class="help-block">descricon.</p>
            </div>

            <div class="form-group">
                <label>Agregar Imagen</label>
                <input type="file">
            </div>
            <div class="form-group">
                <a href="#" class="btn btn-primary">Subir</a>
            </div>
        
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label>Imagenes del Porducto </label>
            <p class="help-block">descricon.</p>
        </div>        
        <ul>
            <li>img 1</li>
            <li>img 2</li>
            <li>img 3</li>
        </ul>

        <a href="#">Back</a>
    </div>
</div>
@endsection
