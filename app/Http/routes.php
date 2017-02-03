<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




 //rutas de lagding page 
Route::get('/', 'Site\PageController@getInit');
Route::get('/material/{marca}', 'Site\PageController@getByMacar');
Route::any('/comprar', 'Site\PageController@getByCat');
Route::get('/test', 'Site\ConecktaController@getTest');
Route::get('/total', 'Site\CartController@getTotalProductos');
Route::post('/cargo', 'Site\ConecktaController@cargo');

Route::get('cart/show', [
	'as' => 'cart-show',
	'uses' => 'Site\CartController@show'
]);
Route::get('order-detail', [
	'as' => 'order-detail',
	'uses' => 'Site\CartController@orderDetail'
]);
Route::get('cart/add/{product}', [
	'as' => 'cart-add',
	'uses' => 'Site\CartController@add'
]);

Route::get('cart/update/{idproducto}/{quantity}', [
	'as' => 'cart-update',
	'uses' => 'Site\CartController@update'
]);

Route::get('/cart/delete/{product}',[
	'as' => 'cart-delete',
	'uses' => 'Site\CartController@delete'
]);

Route::get('/cart/clear',[
	'as' => 'cart-clear',
	'uses' => 'Site\CartController@clear'
]);


// Enviamos nuestro pedido a PayPal
Route::get('payment', array(
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));

// Después de realizar el pago Paypal redirecciona a esta ruta
Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));



Route::group(['prefix' => 'admin'], function() {
	//Productos 
	//Route::any('/productps/material','ProductosController@TablaMaterial');
	Route::any('/productos/stock/{id}', 'ProductosController@getStoke');
	Route::any('/productos/alls', 'ProductosController@getAlls');
	Route::any('/productos/unidad/{id}', 'ProductosController@getUnidad');
	Route::any('/productos/plus/agregar', 'ProductosController@subirUnidad');
	Route::any('/productos/upload/img/', 'ProductosController@loadImgUnidad');
	Route::any('/productos/plus', 'ProductosController@getMaterial');

	Route::controller('/productos', 'ProductosController');

	//Sliders
	Route::any('/sliders/load','SliderController@getSliders');
	Route::any('/sliders/status/{id}','SliderController@ChangeStatus');
	Route::any('/sliders/delete/{id}','SliderController@deleteSlider');
	Route::post('/sliders/upload','SliderController@UploadImg');
	Route::controller('/sliders','SliderController');


    Route::controller('/', 'InicioController');
    
});

