@extends('layout')

@section('content')

    <div class="container" id="app">
        <div class="row">
            @foreach( $statuts as $id => $nom )
                <div class="col">
                    <h3>{{ $nom }}</h3>
                    <draggable class="list-group" :list="vehiculesData.{{ $nom }}" group="people" @change="post('{{ $id }}', $event)" >
                        <div class="list-group-item" v-for="(entree, index)  in vehiculesData.{{ $nom }}" :key="entree.id" >
                                @{{ entree.imat }}, @{{ entree.id_statut }}, @{{ entree.marque }}, @{{ entree.modele }}
                        </div>
                    </draggable>
                </div>
            @endforeach
        </div>

    </div>

    @section('script')
    
        <script src="//cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>
    @endsection

@endsection
