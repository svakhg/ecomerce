<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Slider;
use App\Productos;
use Illuminate\Support\Facades\Input;
class PageController extends Controller
{

    

    public function getInit()
    {
        $slider = Slider::all();
        $productos  = Productos::paginate(10);
    	$categorias = DB::table('material')->select('LINEA')->distinct()->get();
    	$marca = DB::table('material')->select('MARCA')->distinct()->paginate(30);
    	return view('mguizar.index')->with('categoria',$categorias)->with('marca',$marca)->with('sliders',$slider)->with('productos',$productos);
    }

    public function getByMacar($marca)
    {
    	$productos =  DB::table('material')->select('IDCODIGO','MARCA','MODELO','DESCRIPCION','precioventa1')->where('MARCA', '=', $marca)->get();
    	return view('mguizar.materiales')->with('productos',$productos);
    }

    public function getByCat()
    {
        $slider = Slider::all();
        $categoria = Input::get('extencion');
        $productos = Productos::where('categoria',$categoria)->get();
       
    	return view('mguizar.materiales')->with('productos',$productos)->with('sliders',$slider);
    }
}
