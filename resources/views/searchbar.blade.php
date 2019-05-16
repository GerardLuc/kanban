<div class="container">
    <form action="#" method="post">
        {{-- token de sécurité laravel --}}
        {{ csrf_field() }}
        <div class="row mr0 ml0">
            <div  class="col-sm">
                <div class="form-group">
                    <input type="text" name="imat" id="imat" class="form-control" placeholder="imat" v-model="formImat">
                </div>
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
</div>