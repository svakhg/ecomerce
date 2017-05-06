<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EnviosController extends AdminBaseController
{
    public function __construct()
    {
        
        $this->setupLayout();
    }

    public function getIndex()
    {

        $this->layout->section = "Inicio";
        return $this->setContent('admin.envios.list', array(), "Envios");
    }

    public function getEnvios($value='')
    {
    	# code...
    }
}
