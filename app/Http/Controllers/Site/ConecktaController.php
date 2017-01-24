<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

require_once '/../vendor/conekta/conekta-php/lib/Conekta.php';
use Conekta;
use Conekta_Charge;

class ConecktaController extends Controller
{
   public function getTest()
   {
   		return view("Shop.conekta");
   }


   public function cargo(Request $request)
   {

   	//dd($request);
   		Conekta::setApiKey("key_zsvbxUPRrLGREu8rTqN5aQ");
		try {
			$charge = Conekta_Charge::create(array(
			  'description'=> 'Stogies',
			  'reference_id'=> '9839-wolf_pack',
			  'amount'=> 20000,
			  'currency'=>'MXN',
			  'card'=> 'tok_test_visa_4242'
			  )
			);
		} catch (Conekta_Error $e) {
			echo $e->message_to_purchaser;
		}
		dd ($charge);     	
   }
}
