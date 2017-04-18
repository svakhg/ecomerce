<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Material;
use App\VWMaterial_;
use App\Productos;
use DB;
use Storage;
use File;
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
        $codigo = Input::get("categoria");
        $pro = Input::get('prodcuto');
        
        //$material = Material::where('IDCODIGO',$pro)->get();
        $material = DB::table('material')->where('IDBARRAS', $pro)->first();
        
        $producto = new Productos();
        $producto->nombre = $material->NOMBRECORTO;
        $producto->marca = $material->MARCA;
        $producto->modelo =$material->MODELO;
        $producto->precio = $material->precioventa3;
        $producto->descripcion = $material->DESCRIPCION;
        $producto->status = 0;
        $producto->stock = 0;
        $producto->categoria = $codigo;
        $producto->save();

        return $producto;
    }

    public function getUnidad(){
        $producto = producto::find(Input::get('producto'));
        return ['name' => $producto->nombre,'marca' => $producto->marca, 'modelo' => $producto->modelo , 'precio'=>$producto->precio ,'stoke' =>$producto->stock];
    }

    public function cargarimagen(Request $request){
        $id = $request['identificador'];
        $producto = Productos::find($id);
        $file = $request->file('img');
        $nombre = $file->getClientOriginalName();
        Storage::disk('public')->put($nombre,  File::get($file));
        $producto->url = $nombre;
        $producto->save();
        return redirect()->back();
    }

    // cambiar status
    public function StatusUnidad(){

    }

    public function getStoke($id){
        $produc = Productos::find($id);
        $produc->stock = Input::get('sotock_modificade');
        $produc->save();
        return ['producto' => $id , 'error' => 0 , 'menssage' => 'Stock Modificado'];
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


        $prodcutos = null;
        if(!empty($busqueda)){
            $prodcutos  = Productos::where('nombre', 'LIKE', '%'.$busqueda.'%')->get();
        }else{
            $prodcutos  = Productos::orderBy('categoria', 'ASC')->get();
        }

        $resultados = [];
        
        foreach ($prodcutos as $key) {
            $imagen = ' ';
            if($key->url != ""){
                $imagen = '<a href="Javascript:mostrarImg('.$key->id.');" ><img style="width: 40px;height: 40px;" src="/../storage/'.$key->url.' "></a>';
            }else{
                $imagen = '<img style="width: 40px;height: 40px;" src="/../img/no.png">';
            }
            $resultado = [
                $key->nombre,
                $key->marca,
                $key->modelo,
                $key->precio,
                $key->stock,
                '<img style="width: 40px;height: 40px;" src="/../img/icono'.$key->categoria.'.png">',
                $imagen,
                "<span><a class='btn btn-info btn-flat fa fa-edit' href='Javascript:changeStatus(".$key->id.")'></a></span><span><a  class='btn btn-info btn-danger fa fa-edit' href='Javascript:openModalStock(".$key->id.",".$key->stock.")'></a></span><span><a class='btn btn-info btn-danger fa fa-camera-retro' href='Javascript:changeStatus(".$key->id.")'></a></span>"
                
            ];
            array_push($resultados, $resultado);
        }

        return ["recordsTotal" => $prodcutos->count(), "recordsFiltered" => $prodcutos->count(),"data" =>$resultados];

    }

    public function subirUnidad3(){
        $codigo = Input::get("categoria");
        $prodcuto = Input::get('prodcuto');
        return $codigo." espacio ".$prodcuto;
    }  


    public function ImagenLoad($id)
    {
        $producto = Productos::find($id);
        return "/storage/".$producto->url;
    }

}







