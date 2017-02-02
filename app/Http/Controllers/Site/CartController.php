<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Cart;
use App\Productos;
use App\Slider;
class CartController extends Controller
{
 // 
    public function show()
    {
        //dd(Cart::content());
        $slider = Slider::all();
        return view("shop.shop")->with("cart",Cart::content())->with('sliders',$slider);

    }

    public function add($produto)
    {
        // Por el momento no se le agrega la cantidad
        $users = Productos::find($produto);
        //id-name-cantidad-precio-otra_cosa
        $slider = Slider::all();
        Cart::add($users->id,$users->nombre, 1, $users->precio);

        return view("shop.shop")->with("cart",Cart::content())->with('sliders',$slider);
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
