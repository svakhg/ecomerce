<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Mensajes;
class MensajesController extends AdminBaseController{



    public function __construct()
    {
        
        $this->setupLayout();
    }

    public function getIndex()
    {

        $this->layout->section = "Inicio";
        return $this->setContent('admin.inbox.list', array(), "Inbox");
    }

    public function getMensajes(){
        $busqueda = Input::get("search.value");
        $inicio = Input::get("start");
        $cantidad = Input::get("length");
        $filtro = Input::get("filtro");
        $paginas = intval($inicio / $cantidad);
        $residuo = $inicio % $cantidad;   
        
        if($residuo > 0)
            $paginas = $paginas + 1;
        if($inicio == 0)
            $paginas = 1;


        $ventas = null;
        if(!empty($busqueda)){
            $ventas  = Mensajes::where('correo', 'LIKE', '%'.$busqueda.'%')->get();
        }else{
            $ventas  = Mensajes::orderBy('fecha', 'ASC')->get();
        }

        $resultados = [];
        
        foreach ($ventas as $key) {
            $resultado = [
                $key->correo,
                $key->status,
                $key->fecha,
                "<span><a class='btn btn-info btn-flat fa fa-edit' href='Javascript:Read(".$key->id.")'></a></span><span><a  class='btn btn-info btn-danger fa fa-edit' href='Javascript:Delete(".$key->id.")'></a></span>"
                
            ];
            array_push($resultados, $resultado);
        }
        return ["recordsTotal" => $ventas->count(), "recordsFiltered" => $ventas->count(),"data" =>$resultados];
    }

}
