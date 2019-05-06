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
        // return file_get_contents(resource_path().'/js/vehicules.json');

        $collection = collect(json_decode(file_get_contents(resource_path().'/js/vehicules.json')));
        $grouped = $collection->groupBy('statut');

        // var_dump($groupped);exit;

        if ( !isset($grouped['entree'])){
            $grouped['entree'] = [];
        }
        
        if (!isset($grouped['inspection'])){
            $grouped['inspection'] = [];

        } 
        
        if (!isset($grouped['réparation'])){
            $grouped['réparation'] = [];
            
        } 
        
        if (!isset($grouped['disponible'])){

            $grouped['disponible'] = [];
        } 
        
        if (!isset($grouped['livraison'])){
            
            $grouped['livraison'] = [];
        }

        return $grouped;
    }

    public function changeStatut(){

        $collection = json_decode(file_get_contents(resource_path().'/js/vehicules.json'));

        $vehiculeId = request('vehicule')['id'];

        // // var_dump($vehiculeId);exit;

        // $filtered = $collection->where('id', $vehiculeId);
        // // var_dump($filtered->first());exit;

        // $aled = $filtered->first();

        // $aled = request('vehicule');

        // // var_dump($aled);exit;

        // var_dump($collection);

        foreach( $collection as &$toto){
            if( $toto->id == $vehiculeId ){
                $toto = request('vehicule');

                // var_dump($toto); exit;
            }
        }

        // var_dump($collection);exit;
        
        file_put_contents(resource_path().'/js/vehicules.json', json_encode($collection));
    }
}
