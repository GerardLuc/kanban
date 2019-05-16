@extends('layout')

@section('content')
<div  class="container" >



{{-- formulaire de création de vehicule OU edition si le vehicule existe (param url) --}}
    <form action="@if ( $vehicule->exists )
        /vehicule/edit/{{ $vehicule->id }}
    @else
        /vehicule/edit
    @endif" method="post" enctype="multipart/form-data">

    {{-- token de sécurité laravel --}}
    {{ csrf_field() }}


        <div class="form-group">
            <input type="text" id="imat" name="imat" class="form-control" placeholder="Imatriculation" value="{{ $vehicule->imat }}">
        </div>

        <div class="form-group">
            <input type="text" id="marque" name="marque" class="form-control" placeholder="Marque" value="{{ $vehicule->marque }}">
        </div>

        <div class="form-group">
            <input type="text" id="modele" name="modele" class="form-control" placeholder="Modele" value="{{ $vehicule->modele }}">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
            </div>
            <div class="custom-file">
                <input type="file" name="image" id="image" class="custom-file-input" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choisisez une Image</label>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="envoyer">
        </div>
    </form>
</div>
{{-- affichage des erreurs du form --}}
@if (isset($errors))
<!-- {{ var_dump($errors) }} -->
        @foreach ($errors->messages() as $error)
        
            <div>{{ $error[0] }}</div>
        @endforeach
@endif

@endsection