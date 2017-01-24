<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Cart;
class CartController extends Controller
{
 // 
    public function show()
    {
        //dd(Cart::content());
        
        return view("shop.shop")->with("cart",Cart::content());

    }

    public function add($produto)
    {
        // Por el momento no se le agrega la cantidad
        $users = DB::table('material')->where('IDCODIGO', '=', $produto)->first();
        //id-name-cantidad-precio-otra_cosa
        Cart::add($users->IDCODIGO,$users->NOMBRECORTO, 1, $users->precioventa1);

        return view("shop.shop")->with("cart",Cart::content());
    }

    public function update($idproducto,$quantity)
    {
        Cart::update($idproducto, $quantity);
        return redirect()->route('cart-show');
        //return view("shop.shop")->with("cart",Cart::content());
    }

    public function delete($produto)
    {
        Cart::remove($produto);
        return redirect()->route('cart-show');
    }

    public function clear()
    {
        Cart::destroy();
        return redirect()->route('cart-show');
    }

    public function getTotalProductos()
    {
        return Cart::count();
    }

    //AdSe6ZcBFZbiZTmpLTN4GdRSLPeL3-JNrH53dce66_uYRUEMLXdf_Fd4fk9x3wVo2MI7jC7cfM54xPQX

    //EBY3R3SHxFQ12eFTySfjRZY27ljVsHLv-DbRofHMWBzoxDNgZaWmr-7lmfKZQyGX5QPvk46GuQYdppB-

}
