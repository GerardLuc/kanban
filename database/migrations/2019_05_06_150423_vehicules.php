<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vehicules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vehicules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imat');
            $table->string('marque');
            $table->string('modele');
            $table->integer('id_statut');
            $table->timestamps();
        });

        DB::table('vehicules')->insert(array(
            ["imat"=>"23REF32","marque"=>"marque","modele"=>"modele", "id_statut"=>"1"],["imat"=>"94ER43","marque"=>"marque","modele"=>"modele", "id_statut"=>"2"],["imat"=>"84RGG51","marque"=>"marque","modele"=>"modele", "id_statut"=>"3"],["imat"=>"84ERG35","marque"=>"marque","modele"=>"modele", "id_statut"=>"4"],["imat"=>"94ER43","marque"=>"marque","modele"=>"modele", "id_statut"=>"1"],["imat"=>"84RGG51","marque"=>"marque","modele"=>"modele", "id_statut"=>"4"],["imat"=>"84ERG35","marque"=>"marque","modele"=>"modele", "id_statut"=>"5"],["imat"=>"94ER43","marque"=>"marque","modele"=>"modele", "id_statut"=>"2"],["imat"=>"84RGG51","marque"=>"marque","modele"=>"modele", "id_statut"=>"3"],["imat"=>"84ERG35","marque"=>"marque","modele"=>"modele", "id_statut"=>"3"],
            ["imat"=>"21REG01","marque"=>"marque","modele"=>"modele", "id_statut"=>"5"]
        

        ));

        Schema::create('statut', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->integer('ordre');
        });

        DB::table('statut')->insert(array(
            ["nom"=>"entree", "ordre"=>"1"],
            ["nom"=>"inspection", "ordre"=>"2"],
            ["nom"=>"reparation", "ordre"=>"3"],
            ["nom"=>"disponible", "ordre"=>"4"],
            ["nom"=>"livraison", "ordre"=>"5"],

        ));
    }   

            
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
        
    }
}
