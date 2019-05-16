@extends('layout')

@section('content')


        {{-- include les searchbar --}}
        @include('searchbar')
        <div  class="row ml0 mr0">
            <div v-for="(nom, id) in Statuts" class="col-lg col-md-4 col-sm-6  col-xs-12 colonne"> 
            <h3>@{{ nom }}: <span>@{{ vehiculesData[nom] == undefined ? 0 : vehiculesData[nom].length }}</span></h3>

                    <div class="scroll">
                        {{-- draggable: balise de vue.draggable avec les parametres exclusifs du plugin + boucle for pour crawler chaque vehicule de la colone --}}
                        <draggable class="list-group" ghost-class="ghost"  v-bind="dragOptions" :list="vehiculesData[nom]" group="people" @change="changeStatut( id , $event)" >
    
                            <div class="list-group-item card" v-for="(entree, index)  in vehiculesData[nom]" :key="entree.id">    
                                <div class="card-body">
                                    <h3 class="btn btn-outline-info" data-toggle="modal"  data-target="#vehiculeModal" v-on:click="getModal( entree.id )">@{{ entree.imat }}</h3>
                                    <p class="card-text">@{{ nom }} </p>
                                    <p class="card-text">marque @{{ entree.marque }}, modèle @{{ entree.modele }}</p>
                                    
                                </div>  
                            </div>
                            
                        </draggable>
                    </div>

            </div>
        </div>

         <!-- Modale affichant les infos d'un vehicule -->
        <div class="modal fade" id="vehiculeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" >
                <div class="modal-content" >
                    <div class="modal-header">
                        
                        <h5 class="modal-title" id="exampleModalLabel">Imatriculation @{{ vehiculeModal.imat }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body card">

                        <img v-if="vehiculeModal.image" class="card-img-top" :src="vehiculeModal.link" alt="photo">
                        <div class="card-body">

                            <p class="card-text">@{{ Statuts[vehiculeModal.id_statut] }} </p>
                            <p class="card-text">marque @{{ vehiculeModal.marque }}, modèle @{{ vehiculeModal.modele }}</p>
                            
                        </div>
                        
                    </div>
                    <div class="modal-footer">

                        <button  type="button" class="btn btn-danger alertSupress" v-on:click="softDeleteVehicules( vehiculeModal.id )">supprimer</button>
                        <a :href="`/vehicule/edit/${vehiculeModal.id}`" class="btn btn-secondary">Editer</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

                    </div>
                </div>
            </div>
        </div>

    {{-- fin de la modal --}}


@endsection
       
@section('script')
    
    <script src="//cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>
    <script>
        var Statuts = @json($statuts);
    </script>
@endsection