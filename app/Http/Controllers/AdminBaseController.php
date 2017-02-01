<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminBaseController extends BaseController
{


    protected $layout = "admin.layout.default";
    protected $user;

    protected function setupLayout()
    {
        $this->layout = view($this->layout, array
        (
            "section" => "Home",
            "countMessages" => 0,
        ));
        return $this->layout;
    }


    public function setContent($view, $data = [], $section = "Home")
    {
        $this->layout->section = $section;
        return $this->layout->nest('child', $view, $data);
    }    
}
