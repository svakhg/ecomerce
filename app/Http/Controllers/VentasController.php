<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Ventas;
use DB;

class VentasController extends AdminBaseController
{

    public function __construct()
    {
        
        $this->setupLayout();
    }

    public function getIndex()
    {

        $this->layout->section = "Inicio";
        return $this->setContent('admin.ventas.list', array(), "Ventas");
    }


    public function getVentas(){
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
            $ventas  = Ventas::where('nombre', 'LIKE', '%'.$busqueda.'%')->get();
        }else{
            $ventas  = Ventas::orderBy('fecha', 'ASC')->get();
        }

        $resultados = [];
        
        foreach ($ventas as $key) {
            $resultado = [
                $key->nombre,
                $key->correo,
                $key->telefono,
                $key->total,
                $key->fecha,
                "<span><a class='btn btn-info btn-flat fa fa-edit' href='Javascript:Show(".$key->id.")'></a></span><span><a  class='btn btn-info btn-danger fa fa-edit' href='Javascript:Enviado(".$key->id.")'></a></span>"
                
            ];
            array_push($resultados, $resultado);
        }
        return ["recordsTotal" => $ventas->count(), "recordsFiltered" => $ventas->count(),"data" =>$resultados];
    }

    public function getUnidad($id){
        $data = DB::select('select * from productos_ecomerce INNER JOIN VProductos ON productos_ecomerce.id = VProductos.id_producto and VProductos.id_ventas  = :id ', ['id' => $id]);
        $venta =  Ventas::find($id);
        return [$venta,$data];
    }
	/**
	* Estee s el join a sacar por ventas
	SELECT * 
	FROM productos_ecomerce
	INNER JOIN VProductos ON productos_ecomerce.id = VProductos.id_producto
	AND VProductos.id_ventas =4
	LIMIT 0 , 30

	*/
}
