<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Statut extends Model
{

    // use SoftDeletes;

    protected $table = 'statut';

    public function vehicules(){

        return $this->hasMany('App\Vehicules', 'id_statut');
    }


    //
}
