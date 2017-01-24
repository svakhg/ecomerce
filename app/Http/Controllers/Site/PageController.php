<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class PageController extends Controller
{


    public function getInit()
    {
    	$categorias = DB::table('material')->select('LINEA')->distinct()->get();
    	$marca = DB::table('material')->select('MARCA')->distinct()->paginate(30);
    	return view('mguizar.index')->with('categoria',$categorias)->with('marca',$marca);
    }

    public function getByMacar($marca)
    {
    	$productos =  DB::table('material')->select('IDCODIGO','MARCA','MODELO','DESCRIPCION','precioventa1')->where('MARCA', '=', $marca)->get();
    	return view('mguizar.materiales')->with('productos',$productos);
    }

    public function getByCat($categoria)
    {
    	$productos =  DB::table('material')->select('IDCODIGO','MARCA','MODELO','DESCRIPCION','precioventa1')->where('LINEA', '=', $categoria)->get();
    	return view('mguizar.materiales')->with('productos',$productos);
    }
}
