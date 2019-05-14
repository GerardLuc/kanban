<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Statut extends Model
{


    protected $table = 'statut';

    // constante pour instancier le statut de base d'un vehicule lors de la création dudit vehicule

    const defaultStatut = 1;

    public function vehicules(){

        // joint vers la table vehicules

        return $this->hasMany('App\Vehicules', 'id_statut');
    }


    //
}
