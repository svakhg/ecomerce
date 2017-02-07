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

   		//return $total;
   		$nombre = $request['name'];
   		//57049.26


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
