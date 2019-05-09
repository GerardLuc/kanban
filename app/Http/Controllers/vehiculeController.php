<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vehicules;
use App\Statut;
use DB;
use Validator;
use Redirect;

class vehiculeController extends Controller
{
    public function vehicule(){

        return view('vehicules');
    }

    public function ajaxVehicule(){
        $collection= Vehicules::all();

        $vehicules = $collection->groupBy('id_statut');

        $tab_vehicules = [];

        $statuts = Statut::all();
        

        foreach($vehicules as $key => $vehicule){

            $statut = $statuts->where('id', $key)->first();

            // var_dump($statut);exit;

            $tab_vehicules [$statut['nom']] = $vehicule;
        }

        // var_dump($tab_vehicules);exit;

        return $tab_vehicules;
    }

    public function getVehicule(){

        $statuts = Statut::all();

        $table_statut = [];

        foreach($statuts as $statut){
            // id->nom
            // var_dump($statut->id);exit;

            $table_statut [$statut->id] = $statut->nom;
        }

        // var_dump($table_statut);exit;

        return view('vehicules', ['statuts' => $table_statut]);

    }

    public function changeStatut(){

        // var_dump(request('vehicule'));exit;

        $vehicule = Vehicules::find(request('vehicule')['id']);

        $vehicule->id_statut = request('vehicule')['id_statut'];

        // var_dump($vehicule);exit;

        $vehicule->save();
    }
}
