<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">

    <title>Document</title>
</head>
<body>
    <div class="container" id="app">
        <div class="row">
            <div class="col">
                <h3>Entrée</h3>
                <draggable class="list-group" :list="vehiculesData.entree" group="people" @change="post('entree', $event)" data-statut="entree"
                >
                    <div class="list-group-item" v-for="(entree, index)  in vehiculesData.entree" :key="entree.id" >
                    @{{ entree.imat }}, @{{ entree.statut }}, @{{ entree.marque }}, @{{ entree.modele }}
                    </div>
                </draggable>
                </div>

                <div class="col">
                <h3>Inspection</h3>

                <draggable
                    class="list-group"
                    :list="vehiculesData.inspection"
                    group="people"
                    @change="post('inspection', $event)"
                    
                    data-statut="inspection"
                    
                >
                    <div class="list-group-item" v-for="(entree, index)  in vehiculesData.inspection" :key="entree.id">
                    @{{ entree.imat }}, @{{ entree.statut }}, @{{ entree.marque }}, @{{ entree.modele }}
                    </div>
                </draggable>
                </div>

                <div class="col">
                <h3>En reparation</h3>
                <draggable
                    class="list-group"
                    :list="vehiculesData.réparation"
                    group="people"
                    @change="post('réparation', $event)"
                    
                    data-statut="réparation"
                >
                    <div class="list-group-item" v-for="(entree, index)  in vehiculesData.réparation" :key="entree.id">
                    @{{ entree.imat }}, @{{ entree.statut }}, @{{ entree.marque }}, @{{ entree.modele }}
                    </div>
                </draggable>
                </div>
                <div class="col">
                <h3>Disponible</h3>
                <draggable
                    class="list-group"
                    :list="vehiculesData.disponible"
                    group="people"
                    @change="post('disponible', $event)"
                    
                    data-statut="disponible"
                >
                    <div class="list-group-item" v-for="(entree, index)  in vehiculesData.disponible" :key="entree.id">
                    @{{ entree.imat }}, @{{ entree.statut }}, @{{ entree.marque }}, @{{ entree.modele }}
                    </div>
                </draggable>
                </div>
                <div class="col">
                <h3>Livraison</h3>
                <draggable
                    class="list-group"
                    :list="vehiculesData.livraison"
                    group="people"
                    @change="post('livraison', $event)"
                    
                    data-statut="livraison"
                >
                    <div class="list-group-item" v-for="(entree, index)  in vehiculesData.livraison" :key="entree.id">
                    @{{ entree.imat }}, @{{ entree.statut }}, @{{ entree.marque }}, @{{ entree.modele }}
                    </div>
                </draggable>
            </div>
        </div>
        
  </div>

            
    </div>
    <script src="//cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>

    <script src="/js/app.js"></script>
</body>
</html>