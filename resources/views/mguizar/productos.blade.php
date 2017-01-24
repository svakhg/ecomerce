<div class="col-md-12" id="productos">
    <h3 id="title">Nuestros Productos</h3>
    <h4 id="subtitle">Empresa chiapaneca de equipos especializados en la industria alimenticia</h4>
    <div class="row">
        <div class="col-md-4">

            <ul><h4>Categorias</h4>

                @for($i = 0; $i < count($categoria); $i++)
                     <li><a href="/materiales/{{$categoria[$i]->LINEA}}">{{$categoria[$i]->LINEA}} </a> </li>
                @endfor

            </ul>


        </div>

        <?php
            $item = 10;
            $conte = 0;
            $gen = 0;
            for ($i=0; $i < 3; $i++) { 
                echo "<div class='col-md-2'> <ul><h4>Marcas</h4>" ;
                while ( $conte < $item) {
                    echo "<li><a href='/material/".$marca[$conte]->MARCA."'>".$marca[$conte]->MARCA."</a></li>";
                    $conte++;
                }
                $item += 10; 
                echo "</ul></div>";
            } 
        ?>


    </div>

</div>
