@extends('layout')

@section('content')

    <div class="container" id="app">
        <div class="row">
            @foreach( $statuts as $id => $nom )
                <div class="col">
                    <h3>{{ $nom }}</h3>
                    <draggable class="list-group" :list="vehiculesData.{{ $nom }}" group="people" @change="Change('{{ $id }}', $event)" >
                        <div class="list-group-item" v-for="(entree, index)  in vehiculesData.{{ $nom }}" :key="entree.id" >
                                <button type="button" class="btn btn-info" data-toggle="modal"  data-target="#exampleModal" v-on:click="getModal( entree.id )">@{{ entree.imat }}</button> {{ $nom }}, @{{ entree.marque }}, @{{ entree.modele }}
                            {{-- @{{ entree.id }} --}}
                        </div>
                    </draggable>
                </div>
            @endforeach
        </div>
    </div>
{{-- @change="post('entree', $event)" --}}
    

    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Imatriculation @{{ entree.imat }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            @{{ entree.imat }}, Statut: {{ $nom }}, @{{ entree.marque }}, @{{ entree.modele }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    @section('script')
    
        <script src="//cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>
    @endsection

@endsection
