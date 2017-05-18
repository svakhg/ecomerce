<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Personalcontroller extends AdminBaseController
{

	//table name:  ecomerce_personal
     public function __construct()
    {
        
        $this->setupLayout();
    }

    public function getIndex(){

        
        $this->layout->section = "Personal";
        return $this->setContent('admin.usuario.list', array(), "Personal");
    }


    public function NewUser(){

    }

    public function ShutDown(){
    	
    }

    
}
