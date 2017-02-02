<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Storage;
use File;
use App\Slider;
class SliderController extends AdminBaseController
{
    
    public function __construct()
    {
        
        $this->setupLayout();
    }

    public function getIndex(){

        
        $this->layout->section = "Slider";
        return $this->setContent('admin.slider.list', array(), "Sliders");
    }

    public function UploadImg(Request $request){
    	
    	$file = $request->file('imagen');
    	$name = $request['nombre'];
        $descripcion = $request['description'];
    	$nombre = $file->getClientOriginalName();
        
    	Storage::disk('public')->put($nombre,  File::get($file));
        $slider = new Slider();
        $slider->nombre = $name;
        $slider->descripcion = $descripcion;
        $slider->url = $nombre; 
        $slider->save();
    	return redirect()->back();
    }

    public function ChangeStatus($id){
        $slider = Slider::find($id);
        if($slider->status == 0){
            $slider->status = 1;
            $slider->save();
            return ['color' => 'green'];
        }else{
            $slider->status = 0;
            $slider->save();
            return ['color' => 'red'];
        }
        

    }

    public function deleteSlider($id){
        $slider = Slider::find($id);
       $slider->delete();

    }

    public function getSliders(){
        $sliders = Slider::all();
        $resultados = [];

        foreach ($sliders as $key) {
            $span = null;
            if ($key->status == 0) {
                $span = "<span class='label pull-right bg-yellow' ><a style='color:white;' class='fa fa-refresh' href='Javascript:status(".$key->id.")' ></a></span><span class='label pull-right bg-red delete' ><a  id='".$key->id."' style='color:white;' class='fa fa-remove' style='color:white;' href='Javascript:eliminar(".$key->id.")' ></a></span> <span id='eye".$key->id."' title='Desactivado' style='color:red;' class='fa fa-eye' ></span>";
            }else{
                $span = "<span class='label pull-right bg-yellow'><a style='color:white;' class='fa fa-refresh' href='Javascript:status(".$key->id.")' ></a></span><span class='label pull-right bg-red delete' ><a id='".$key->id."' style='color:white;' class='fa fa-remove' style='color:white;' href='Javascript:eliminar(".$key->id.")' ></a></span>  <span id='eye".$key->id."' title='Activado' style='color:green;' class='fa fa-eye' ></span>";
            }
            $resultado  = [
                "<img style='width: 300px;width: 300px;'  src='/../../storage/".$key->url."'>",
                $key->nombre,
                $key->descripcion,
                $span
            ];
            array_push($resultados, $resultado);
        }
    
        $datas = ["recordsTotal" => 30, "recordsFiltered" => 30, "data" =>$resultados];
        return $datas;
    }
}
