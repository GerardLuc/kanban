<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicules extends Model
{
    // use SoftDeletes;

    //

    protected $table = 'vehicules';

    public function statut(){

        // joint vers la table statut

        return $this->belongsTo('App\Statut', 'id_statut');
    }



}
