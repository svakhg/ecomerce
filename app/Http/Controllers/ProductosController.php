<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Material;
use App\VWMaterial_;
use DB;
class ProductosController extends AdminBaseController
{


    
    public function __construct()
    {
        
        $this->setupLayout();
    }

    public function getIndex()
    {

        $this->layout->section = "Inicio";
        return $this->setContent('admin.producto.list', array(), "Productos");
    }


    /*public function outEcomerce(){
        $this->layout->section = "Inicio";
        return $this->setContent('admin.producto.productos_fuera', array(), "Productos Outs");    	
    }*/


    /// se va a la vieja confiable 
    public function TablaMaterial(){
        set_time_limit(60);
        //$columna_ordenamiento = $columnas[Input::get("order.0.column")];
        $direccion_ordenamiento =  Input::get("order.0.dir");
        $busqueda = Input::get("search.value");
        $inicio = Input::get("start");
        $cantidad = Input::get("length");
        $filtro = Input::get("filtro");
        $paginas = intval($inicio / $cantidad);
        $residuo = $inicio % $cantidad;    
        $clientes = NULL;    
        if($residuo > 0)
            $paginas = $paginas + 1;
        if($inicio == 0)
            $paginas = 1;        
        
        $clientes  = Material::orderBy('MARCA', 'ASC')->paginate($cantidad)->limit($cantidad)->get();
        
        $clientes_aux = clone $clientes;

        $resultados =  [];
        foreach ($clientes_aux as $llave) {
            dd($llave->id);
            $resultado  = [
                $llave->NOMBRECORTO,
                $llave->MARCA,
                $llave->MODELO,
                $llave->precioventa3,
                "<a class='label pull-right bg-green   href='javascript:AGREGAR(".$llave->IDCODIGO.");' ><span class='fa fa-cart-plus'></span></a>"
            ];
            array_push($resultados, $resultado);
        }
        $returns = ["recordsTotal" => $clientes->total(), "recordsFiltered" => $clientes->total(), "data" =>$resultados];  
        return $returns;
    }


    //traspaso de material
    // esta es la vieja confiable 
    public function getMaterial(){
        //$materiales = VWMaterial_::paginate(20);
        $materiales = Material::paginate(20);
        //return $materiales;
        $this->layout->section = "Inicio";
        return $this->setContent('admin.producto.productos_fuera', $materiales->toArray(), "Productos Outs");
    }

    ///a gregar a la tabla de ventas
    public function subirUnidad(){
        
        $codigo = Input::get("codigo");
        $material = Material::find($codigo);
        $producto = new Prodcuto();
        $producto->nombre = $material->NOMBRECORTO;
        $prodcuto->marca = $material->MARCA;
        $prodcuto->modelo =$material->MODELO;
        $prodcuto->precio = $material->precioventa3;
        $prodcuto->descripcion = "";
        $$prodcuto->status = 0;
        $prodcuto->stock = 0;
        $prodcuto->save();

        return $producto;
    }

    public function getUnidad(){
        $producto = Prodcuto::find(Input::get('prodcuto'));
        return ['name' => $producto->nombre,'marca' => $prodcuto->marca, 'modelo' => $prodcuto->modelo , 'precio'=>$prodcuto->precio ,'stoke' =>$prodcuto->stock];
    }

    public function loadImgUnidad(){
        
    }

    // cambiar status
    public function StatusUnidad(){

    }

    public function getAlls(){
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


        $productos = null;
        if(!empty($busqueda)){

        }else{
            $prodcutos  = Material::orderBy('marca', 'ASC')->paginate($paginas);
        }

        $resultados = [];
        foreach ($prodcutos as $key) {
            $resultado = [
                $key->nombre,
                $key->marca,
                $key->modelo,
                $key->precio,
                $key->stock,
                "<span><a href='Javascript:changeStatus(".$key->id.")'>status</a></span>
                <span><a href='Javascript:changeStoke(".$key->id.")'>stoke</a></span>"
            ];
            array_push($resultados, $resultado);
        }

        return ["recordsTotal" => $prodcutos->count(), "recordsFiltered" => $prodcutos->count(),"data" =>$resultados];

    }

}