<form action="#" method="post">

    {{-- token de sécurité laravel --}}
    {{ csrf_field() }}
    <div class="row">
        <div  class="col-sm">
            <div class="form-group">
                <input type="text" name="imat" id="imat" class="form-control" placeholder="imat" v-model="formImat">
            </div>
        </div>
        <div  class="col-sm">
            <div class="form-group" class="col-sm">
                <select class="form-control" name="statut" id="statut" v-model="formStatut">
                    @foreach (App\Statut::all() as $statut)
                <option  value="{{ $statut->id }}">{{ $statut->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div  class="col-sm">
            <div class="form-group" class="col-sm">
                <input type="text" name="modele" id="modele" class="form-control" v-model="formModele" placeholder="modele">
            </div>
        </div>
        <div  class="col-sm">
            <div class="form-group" class="col-sm">
                <input type="text" name="marque" id="marque" class="form-control" v-model="formMarque" placeholder="marque">
            </div>
        </div>
        <div  class="col-sm">
            <div class="form-group" class="col-sm">
                <input type="submit"  class="btn btn-primary" @click.prevent="postRecherche" value="Recherche">
            </div>
        </div>
    </div>

    
    
</form>