@extends('Plantilla.principal')
@section('content')



<form action="/cargo" method="POST" id="card-form">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <span class="card-errors"></span>
  <div class="form-row">
    <label>
      <span>Nombre completo</span>
      <input type="text" size="20" data-conekta="card[name]" name="name"  value="alan lopez" />
    </label>
  </div>
  <div class="form-row">
    <label>
      <span>Email</span>
      <input type="email" size="20"  name="email" value="alan@highbits.com" />
    </label>
  </div>  
  <div class="form-row">
    <label>
      <span>Número de tarjeta de crédito</span>
      <input type="text" size="20" data-conekta="card[number]" name="numbre" />
    </label>
  </div>
  <div class="form-row">
    <label>
      <span>CVC</span>
      <input type="text" size="4" data-conekta="card[cvc]" name="cvc" value="123" />
    </label>
  </div>
  <div class="form-row">
    <label>
      <span>Fecha de expiración (MM/AAAA)</span>
      <input type="text" size="2" data-conekta="card[exp_month]" name="exp_month" value="02" />
    </label>
    <span>/</span>
    <input type="text" size="4" data-conekta="card[exp_year]" name="exp_year" value="2018" />
  </div>
<!-- Información recomendada para sistema antifraude -->
  <div class="form-row">
    <label>
      <span>Calle</span>
      <input type="text" size="25" data-conekta="card[address][street1]" name="stret" value="enrique segobiano" />
    </label>
  </div>
  <div class="form-row">
    <label>
      <span>Phone</span>
      <input type="text" size="25"  name="phone" value="604442725" />
    </label>
  </div>  
<div class="form-row">
    <label>
      <span>Colonia</span>
      <input type="text" size="25" data-conekta="card[address][street2]"  name="colonia" value="potinaspack" />
    </label>
  </div>
<div class="form-row">
    <label>
      <span>Ciudad</span>
      <input type="text" size="25" data-conekta="card[address][city]" name="city" value="tuxtla gutierrez" />
    </label>
  </div>
<div class="form-row">
    <label>
      <span>Estado</span>
      <input type="text" size="25" data-conekta="card[address][state]" name="state"  value="chiapas" />
    </label>
  </div>
<div class="form-row">
    <label>
      <span>CP</span>
      <input type="text" size="5" data-conekta="card[address][zip]" name="cp" value="70380" />
    </label>
  </div>
<div class="form-row">
    <label>
      <span>País</span>
      <input type="text" size="25" data-conekta="card[address][country]" name="country" value="mexico" />
    </label>
  </div>
  <button type="submit">¡Pagar ahora!</button>
</form>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.5.0/js/conekta.js"></script>


<script type="text/javascript">
 
 // Conekta Public Key
  //Conekta.setPublishableKey('key_O2X9bJMMHLvBJxm7okyg7XA'); //v3.2
  Conekta.setPublicKey('key_O2X9bJMMHLvBJxm7okyg7XA'); //v5+
 
 // ...


$(function () {

/* Validation form*/



  $("#card-form").submit(function(event) {
    var $form = $(this);
    alert("ok");
    // Previene hacer submit más de una vez
    $form.find("button").prop("disabled", true);
    //Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
   Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler); //v5+
   
    // Previene que la información de la forma sea enviada al servidor
    return false;
  });

  var conektaSuccessResponseHandler = function(token) {
    var $form = $("#card-form");

    /* Inserta el token_id en la forma para que se envíe al servidor */
    $form.append($("<input type='hidden' name='conektaTokenId'>").val(token.id));
    alert("aregado");
    /* and submit */
    $form.get(0).submit();
  };


  var conektaErrorResponseHandler = function(response) {
    var $form = $("#card-form");
    
    /* Muestra los errores en la forma */
    $form.find(".card-errors").text(response.message_to_purchaser);
    $form.find("button").prop("disabled", false);
  };

});


</script>




@stop