<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Storage;

class LoadController extends Controller
{
    


	/** metodo post */
    public function loadimage(Request $reques)
    {
    	//dd($reques);
        $file = $reques->file('slide');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));
    	DB::table('sliderbar')->insert(['titulo' => $reques['titulo'], 'descripcion' => $reques['descripcion'],'ruta' => $nombre, 'fecha' => 'today' ]);

    	/*redireccinar a la baase de la ´pantalla de  sliders */
    }


    public function imageProducto($value='')
    {
    	# code...
    }
}
