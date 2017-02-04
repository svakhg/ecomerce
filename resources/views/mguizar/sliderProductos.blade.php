<div class="container-fluid">
    <h3 id="title">Algunos de Nuestros productos</h3>
    <h4 id="subtitle">Empresa chiapaneca de equipos especializados en la industria alimenticia</h4>
<section class="center slider"  style="z-index:2;">
  @foreach($productos as $key)
    <div>
      <?php if($key->url != ""){
        echo "<img src='/storage/".$key->url."'  style='width:300px;height:220px;'>";
        }else{
          echo "<img src='/img/no.png' >";
        } ?>
      
      <span>Nombre: {{$key->nombre}}  </span>
      <span>Marca:  {{$key->marca}}   </span><br>
      <span>Modelo: {{$key->modelo}}  </span>
      <span>Precio: {{$key->precio}} </span><br>
      <span>En Stock:  {{$key->stock}}</span><br>
      <a href="#">Ver mas</a>
    </div>
  @endforeach
</section>
</div>