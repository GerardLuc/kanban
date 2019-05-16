
<form action="#" method="post">

    {{-- token de sécurité laravel --}}
    {{ csrf_field() }}
    <div class="row mr0 ml0">
        <div  class="col-sm">
            <div class="form-group">
                <input type="text" name="imat" id="imat" class="form-control" placeholder="imat" v-model="formImat">
            </div>
        </div>

        <div class="input-group mb-3 col-sm">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Statuts</label>
            </div>
            {{-- <select class="custom-select" name="statut" id="statut" placeholder="Choisissez un statut" v-model="formStatut">
                @foreach (App\Statut::all() as $statut)
                    <option  value="{{ $statut->id }}">{{ $statut->nom }}</option>
                @endforeach
            </select> --}}
        </div>


        <div  class="col-sm">
            <div class="form-group" >
                <input type="text" name="modele" id="modele" class="form-control" v-model="formModele" placeholder="modele">
            </div>
        </div>
        <div  class="col-sm">
            <div class="form-group" >
                <input type="text" name="marque" id="marque" class="form-control" v-model="formMarque" placeholder="marque">
            </div>
        </div>
        <div  class="col-sm">
            <div class="form-group" >
                <button class="btn btn-outline-success my-2 my-sm-0" @click.prevent="postRecherche" type="submit">Recherche</button>
            </div>
        </div>
    </div>

    
    
</form>