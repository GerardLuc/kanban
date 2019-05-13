<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vehicules;
use App\Statut;
use DB;
use Validator;
use Redirect;
use Storage;

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
        
        foreach($statuts as $statut){
            if(!isset($vehicules[$statut->id])){
                $vehicules [$statut->id] = [];
            }
        }

        // var_dump($vehicules[1]);exit;

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

    public function ajaxModal(){
        $vehicule = Vehicules::find(request('id_vehicule'));

        // $statut = Statut::where('id', $vehicule->id_statut)->first();

        $statut = Statut::find($vehicule->id_statut);
        $vehicule->statut = $statut->nom;


        // var_dump($vehicule);exit;
        return $vehicule;
    }

    public function edit($id = null){

        $vehicule = Vehicules::where('id', $id)->firstOrNew([]);

        return view('crea', ['vehicule' => $vehicule]);
    }

    public function enregistrer($id=null)
     {

        /**
         * validation des données
         * données requises
         * email unique dans la table user
         *  
         */  

        $validate = [
            'imat' => 'required',
            'marque' => 'required',
            'modele' => 'required',
            

         ]; 

         if(!$id){
             $validate ['image'] = 'required';
         }

        $validatedData = Validator::make(request()->all(), $validate);

        if ($validatedData->fails())
        {

            /**
             * si la validation échoue,
             * @return la page précédente
             * display les messages d'erreur
             */
            // var_dump($validatedData->messages());exit;
            
            return back()->withErrors($validatedData->messages());
   
        }

        // ajout des données en base

        //  if(!$id){
        //     $vehicule = new Vehicules;
 
        //  } else {
        //      $vehicule = Vehicules::findOrFail($id);

        //  }

         $vehicule = Vehicules::where('id', $id)->firstOrNew([]);


         $vehicule->imat = request('imat');
         $vehicule->marque = request('marque');
         $vehicule->modele = request('modele');
         $vehicule->id_statut = Statut::STATUTDEBAZ;

        //  var_dump(request('image'));exit;
        //  var_dump(file_get_contents(request('image')));exit;

        //  var_dump(request('image')->getClientOriginalName());exit;

        if(request('image')){

        // var_dump(request('image'));exit;

            $path = '/public/images/'.request('image')->getClientOriginalName();

            // var_dump($path);exit;

            $machin = Storage::put($path, file_get_contents(request('image')), 'public');
            var_dump($machin);exit;
            $vehicule->image = $path;
        }

         
        //  var_dump($path);exit;

        

        //  var_dump('tata');exit;
           
        //  $user->image = request('image');


         $vehicule->save();

         // redirige vers la liste des utilisateurs

         return redirect('/vehicule');
     }

     public function image($id)
     {
        //  var_dump($id);exit;
        $vehicule = Vehicules::find($id);

        // var_dump($sbra = Storage::get($vehicule->image));exit;
    
        return response(Storage::get($vehicule->image), 200)
            ->header('Content-Type', 'image/png');
     }

    

}
