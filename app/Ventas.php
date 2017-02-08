<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = "ecomerce_ventas";
    public $timestamps = false;
    //VProductos <- se alia con esta tabla
}
