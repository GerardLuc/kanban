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


    /**
     * recupere les vehicules via ajax et return $tab_vehicules
     */
    public function ajaxGetVehicule(){
        // var_dump(request('modele'));exit;

        // get all vehicules dans une collection
        $collection= Vehicules::recherche()->get();

        // groupage des vehicules par id_statut
        $vehicules = $collection->groupBy('id_statut');

        if(!isset($tab_vehicules)){
            // get all statuts
            $statuts = Statut::all();
            
            // creation d'une colonne vide si un groupe ne contient pas de vehicules
            foreach($statuts as $statut){
                if(!isset($vehicules[$statut->id])){
                    $vehicules [$statut->id] = [];
                }
            }

            // appelle le nom du statut par vehicule

            foreach($vehicules as $key => $vehicule){

                $statut = $statuts->where('id', $key)->first();

                $tab_vehicules [$statut['nom']] = $vehicule;
            }
        }


        return $tab_vehicules;
    }


    /**
     * get all from statut sans param et retourne la vue avec les statuts en param
     */

    public function getVehicule(){

        $statuts = Statut::all();

        $table_statut = [];

        foreach($statuts as $statut){
            // id->nom
            $table_statut [$statut->id] = $statut->nom;
        }

        return view('vehicules', ['statuts' => $table_statut]);

    }

    
    /**
     * change l'id_statut en BDD
     */
    public function changeStatut(){

        $vehicule = Vehicules::find(request('vehicule')['id']);

        $vehicule->id_statut = request('vehicule')['id_statut'];

        $vehicule->save();
    }

    /**
     * affiche le contenu de vehicule et le nom du statut et retourne la vehicule pour la modale
     */
    public function ajaxGetModal(){
        $vehicule = Vehicules::find(request('id_vehicule'));

        // $statut = Statut::where('id', $vehicule->id_statut)->first();

        $statut = Statut::find($vehicule->id_statut);
        $vehicule->statut = $statut->nom;

        return $vehicule;
    }

    public function editVehicule($id = null){

        $vehicule = Vehicules::where('id', $id)->firstOrNew([]);

        return view('crea', ['vehicule' => $vehicule]);
    }

    /**
         * validation des données
         * données requises
         * email unique dans la table vehicules
         *  
         */  
    public function save($id=null)
     {
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
            
            return back()->withErrors($validatedData->messages());
   
        }

        // ajout des données en base

         $vehicule = Vehicules::where('id', $id)->firstOrNew([]);


         $vehicule->imat = request('imat');
         $vehicule->marque = request('marque');
         $vehicule->modele = request('modele');
         $vehicule->id_statut = Statut::defaultStatut;

        if(request('image')){

            $path = '/public/images/'.request('image')->getClientOriginalName();

            $machin = Storage::put($path, file_get_contents(request('image')), 'public');
            $vehicule->image = $path;
        }

         $vehicule->save();

         // redirige vers la liste des utilisateurs

         return redirect('/vehicule');
     }


     /**
      * ajout de l'image en BDD, retourne un code 200 si reussi
      */
     public function imageVehicule($id)
     {
        $vehicule = Vehicules::find($id);

        return response(Storage::get($vehicule->image), 200)
            ->header('Content-Type', 'image/png');
     }

     public function softDeleteVehicule(){
        
        $id_vehicule = request('id_vehicule');

        $vehicule = Vehicules::find($id_vehicule);
        $vehicule->delete();

        return 'true';
    }
    

}