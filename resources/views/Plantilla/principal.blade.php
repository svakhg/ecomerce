<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Marin-guizar</title>

        <!-- Font Awesome  -->
       <script src="https://use.fontawesome.com/4faa018609.js"></script>

       <!-- Bootstrap CDN -->
       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

       <!-- jquery CDN  -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

       <!-- My script -->
       <script src="js/script.js" charset="utf-8"></script>

       <!-- My styles -->
       <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

       {{-- Slick slider --}}
       <!-- Slider Slick-->
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>

        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <style type="text/css">
          html, body {
            margin: 0;
            padding: 0;
          }
          * {
            box-sizing: border-box;
          }
          .slider {
            width: 85%;
            margin: 100px auto;
          }
          .slick-slide {
            margin: 0px 20px;
          }
          .slick-slide img {
            width: 100%;
          }
          .slick-prev:before,
          .slick-next:before {
            color: black;
          }
          </style>


    </head>

    <body>
        <header>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><img class='nav-logo' src="{{ asset('img/logonav.png') }}" alt="" /></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <!-- <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul> -->
                        <form class="navbar-form navbar-left">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Buscar" >
                            </div>
                            <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden=""></i></button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a id="nav-right-session" href="/cart/show/"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
    Carrito <span id="car-total">0</span></a></li>
                            {{-- <li class="dropdown">
                                <a id="nav-right-session" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Iniciar Sesion <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li> --}}
                            {{-- <li><a id="nav-right-session" href="#">Registrarse</a></li> --}}
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>

        {{-- <div class=" " id='sections' style="background-image:url('{{ asset('img/background.png') }}');height:550px; background-repeat:no-repeat;background-position:center;-webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;"> --}}
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
              for ($i=0; $i < count($sliders) ; $i++) {
                 if($i==0)
                  echo "<li data-target='#carousel-example-generic' data-slide-to='".$i."' class='active'></li>";
                echo "<li data-target='#carousel-example-generic' data-slide-to='".$i."' ></li>";
              }
            ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        @foreach($sliders as $key)
            @if($key->id == 16)
              <div class="item active">
                <img src="/storage/{{$key->url}}" alt="...">
                <div class="carousel-caption">

                </div>
              </div>
            @else
          <div class="item">
            <img src="/storage/{{$key->url}}" alt="...">
            <div class="carousel-caption">

            </div>
          </div>
          @endif
          @endforeach

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
     <!--

        <div class="container-fluid" style="margin-top:10px;margin-bottom:10px;">

            <div class="row">
                <div class="col-md-4">
                    <span id="ssection-sub" >Realiza tu compra a credito!</span>

                </div>
                <div class="col-md-2">
                    <img class="visa-logo" src="{{ asset('img/visa.png') }}" alt="" />
                </div>
                <div class="col-md-1">
                    <img class="american-logo" src="{{ asset('img/americanexpress.png') }}" alt="" />
                </div>
                <div class="col-md-1">
                    <img class="mastercard-logo" src="{{ asset('img/mastercard.png') }}" alt="" />
                </div>
                <div class="col-md-2">
                    <img class="oxxo-logo" src="{{ asset('img/oxxo.png') }}" alt="" />
                </div>
            </div>
-->


            @yield('content')


        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



    </body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"> </script>
     <script src="{{ asset('js/eventos.js') }}"></script>


     <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(document).on('ready', function() {
  $(".regular").slick({
    dots: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3
  });
  $(".center").slick({
    dots: true,
    infinite: true,
    centerMode: true,
    slidesToShow: 3,
    slidesToScroll: 3
  });
  $(".variable").slick({
    dots: true,
    infinite: true,
    variableWidth: true
  });
});
</script>

</html>
