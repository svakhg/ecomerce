<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Personalcontroller extends AdminBaseController
{
     public function __construct()
    {
        
        $this->setupLayout();
    }

    public function getIndex(){

        
        $this->layout->section = "Personal";
        return $this->setContent('admin.usuario.list', array(), "Personal");
    }


    
}
