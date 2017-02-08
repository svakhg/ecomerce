<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//require_once '/../vendor/conekta/conekta-php/lib/Conekta.php';
use Conekta;
use Conekta_Charge;
use Cart;
use App\Slider;
use App\Ventas;
use DB;
class ConecktaController extends Controller
{


   public function getTest()
   {
   		$slider = Slider::all();
   		return view("Shop.conekta")->with('sliders',$slider);
   }


   	public function cargo(Request $request){


   		$card = $request['conektaTokenId'];
   		$total = 0;
      
      foreach (Cart::content() as $row) {
        $subtotal = 0;
        $subtotal = $row->qty * $row->price;
        $total = $total + $subtotal;
      }

      $venta  =  new Ventas();
      $venta->nombre = $request['name'];
      $venta->apellido = " no ";
      $venta->correo = $request['email'];
      $venta->domicilio = " colonia ".$request['colonia']." cp: ".$request['cp']." calle ".$request['stret'] ;
   		$venta->ciudad = $request['city'];
      $venta->estado = $request['state'];
      $venta->telefono = $request['phone'];
      $venta->total = $total;
      $venta->save();



      $productos = [];

      foreach (Cart::content() as $row) {
        $subtotal = 0;
        $subtotal = $row->qty * $row->price;
        $total = $total + $subtotal;
        $producto = [ 'id_ventas' => $venta->id,'id_producto' =>$row->id,'cantidad'=>$row->qty,'totalproducto' =>$subtotal];
        array_push($productos, $producto);
      }

        
      DB::table('VProductos')->insert($productos);

   		return "realisado";

   		Conekta::setApiKey("key_zsvbxUPRrLGREu8rTqN5aQ");
		try {
			$charge = Conekta_Charge::create(array(
			  'description'=> 'Stogies',
			  'reference_id'=> '9839-wolf_pack',
			  'amount'=> $total * 100,
			  'currency'=>'MXN',
			  'card'=> $card,
			   'details'=> array(
                'name'=> 'Arnulfo Quimare',
                'phone'=> '403-342-0642',
                'email'=> 'logan@x-men.org',
                'line_items'=> array(
                  array(
                    'name'=> 'Box of Cohiba S1s',
                    'description'=> 'Imported From Mex.',
                    'unit_price'=> $total * 100,
                    'quantity'=> 1,
                    'sku'=> 'cohb_s1',
                    'type'=> 'food'
                  )
                )
			  )
			));
		} catch (Conekta_Error $e) {
			echo $e->message_to_purchaser;
		}
		dd ($charge);     	
   }
}
