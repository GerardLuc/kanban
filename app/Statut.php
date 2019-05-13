<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class Statut extends Model
{

    // use SoftDeletes;

    protected $table = 'statut';

    // constante pour instancier le statut de base d'un vehicule lors de la création dudit vehicule

    const STATUTDEBAZ = 1;

    public function vehicules(){

        // joint vers la table vehicules

        return $this->hasMany('App\Vehicules', 'id_statut');
    }


    //
}
