<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vehiculeController extends Controller
{
    public function vehicule(){

        

        return view('vehicules');
    }

    public function jsonVehicule(){
        // var_dump(resource_path());
        return file_get_contents(resource_path().'/js/vehicules.json');
        
    }
}
