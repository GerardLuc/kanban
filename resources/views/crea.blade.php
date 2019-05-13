@extends('layout')

@section('content')

{{-- formulaire de création de vehicule OU edition si le vehicule existe (param url) --}}
    <form action="@if ( $vehicule->exists )
        /vehicule/edit/{{ $vehicule->id }}
    @else
        /vehicule/edit
    @endif" method="post" enctype="multipart/form-data">

    {{-- token de sécurité laravel --}}
    {{ csrf_field() }}


        <div class="form-group">
            <label id="imat" name="imat">Imatriculation</label>
            <input type="text" id="imat" name="imat" class="form-control" value="{{ $vehicule->imat }}">
        </div>

        <div class="form-group">
            <label id="marque" name="marque">Marque</label>
            <input type="text" id="marque" name="marque" class="form-control" value="{{ $vehicule->marque }}">
        </div>

        <div class="form-group">
            <label id="modele" name="modele">Modele</label>
            <input type="text" id="modele" name="modele" class="form-control" value="{{ $vehicule->modele }}">
        </div>


        <div class="form-group">
            <label for="image">Photo</label>
            <input type="file" name="image" id="image">

        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="envoyer">
        </div>
    </form>

{{-- affichage des erreurs du form --}}
@if (isset($errors))
<!-- {{ var_dump($errors) }} -->
        @foreach ($errors->messages() as $error)
        
            <div>{{ $error[0] }}</div>
        @endforeach
@endif

@endsection