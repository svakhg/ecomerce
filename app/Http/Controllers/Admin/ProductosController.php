<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ProductosController extends Controller
{
    public function getAll()
    {
    	$productos = DB::table('catalogo')->get();
    }
}
