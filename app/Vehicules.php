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

        /**
     * Scope a query to only include some imats.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeRecherche($query)
    {
        if( request('imat') != ''){
            $query->where('imat', 'like' , '%'.request('imat').'%');
        }
        if( request('id_statut') != ''){
            $query->where('id_statut', request('id_statut'));
        }
        if( request('modele') != ''){            
            $query->where('modele', 'like' ,'%'.request('modele').'%');
    }
        if( request('marque') != ''){
            $query->where('marque', 'like' ,'%'.request('marque').'%');
        }
        return $query;
    }
}