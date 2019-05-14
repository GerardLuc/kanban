<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// affichage de la liste des vehicules
Route::get('/vehicule', 'vehiculeController@getVehicule');
Route::post('/vehicule', 'vehiculeController@ajaxVehicule');

// changement ajax du statut
Route::get('/ajaxVehicule', 'vehiculeController@ajaxVehicule');
Route::post('/ajaxVehicule', 'vehiculeController@changeStatut');

// affichage de la modal en ajax
Route::get('/ajaxModal', 'vehiculeController@ajaxModal');


// creation/edition d'un vehicule (+ image)
Route::get('/vehicule/edit/{id?}', "vehiculeController@edit");
Route::post('/vehicule/edit/{id?}', "vehiculeController@enregistrer");

Route::get("vehicule/image/{id}", "vehiculeController@image");

Route::post('vehicule/delete', "VehiculeController@delete");
