@extends('layout')

@section('content')


        {{-- include les searchbar --}}
        @include('searchbar')

        <a href="/vehicule/edit" role="button" class="btn btn-primary">créer un vehicule</a>

        <div class="row">
            {{-- crawl de tous les vehicules dans l'objet $statuts --}}
            @foreach( $statuts as $id => $nom )
                <div class="col">
                    <h3>{{ $nom }}</h3>
                    {{-- draggable: balise de vue.draggable avec les parametres exclusifs du plugin + boucle for pour crawler chaque vehicule de la colone --}}
                    <draggable class="list-group" :list="vehiculesData.{{ $nom }}" group="people" @change="Change('{{ $id }}', $event)" >
                        <div class="list-group-item" v-for="(entree, index)  in vehiculesData.{{ $nom }}" :key="entree.id" >
                                <button type="button" class="btn btn-info" data-toggle="modal"  data-target="#vehiculeModal" v-on:click="getModal( entree.id )" >@{{ entree.imat }}</button> {{ $nom }}, @{{ entree.marque }}, @{{ entree.modele }}
                        <button  type="button" class="btn btn-danger" name="toto" v-on:click="softDelete( entree.id )">supprimer</button>
                        </div>
                    </draggable>
                </div>
            @endforeach
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
                    <div class="modal-body">
                        @{{ vehiculeModal.imat }}, Statut: @{{ vehiculeModal.statut }}, @{{ vehiculeModal.marque }}, @{{ vehiculeModal.modele }}
                 
                        <img v-if="vehiculeModal.image" :src="vehiculeModal.link" alt="photo">
            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    {{-- fin de la modal --}}
       
    @section('script')
    
        <script src="//cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>
    @endsection

@endsection
