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
            <div class="row" >
                <div class="col">entrée</div>
                <div class="col">inspection</div>
                <div class="col">en réparation</div>
                <div class="col">disponible</div>
                <div class="col">livraison</div>
            </div>
            <div v-drag-and-drop:options="options" class="drag-wrapper row">
                <div class="col dropzone" >
                    <div v-for="(entree, index)  in vehiculesData.entree" class="draggable">
                        <div>@{{ entree.imat }}, @{{ entree.statut }}, @{{ entree.marque }}, @{{ entree.modele }}</div>
                    </div>
                </div>
                <div class="col dropzone">
                    <div v-for="(entree, index)  in vehiculesData.inspection" class="draggable">
                        <div>@{{ entree.imat }}, @{{ entree.statut }}, @{{ entree.marque }}, @{{ entree.modele }}</div>
                    </div>
                </div>
                <div class="col dropzone">
                    <div v-for="(entree, index)  in vehiculesData['en réparation']" class="draggable">
                        <div>@{{ entree.imat }}, @{{ entree.statut }}, @{{ entree.marque }}, @{{ entree.modele }}</div>
                    </div>
                </div>
                <div class="col dropzone">
                    <div v-for="(entree, index)  in vehiculesData.disponible" class="draggable">
                        <div>@{{ entree.imat }}, @{{ entree.statut }}, @{{ entree.marque }}, @{{ entree.modele }}</div>
                    </div>
                </div>
                <div class="col dropzone">
                    <div v-for="(entree, index)  in vehiculesData.livraison" class="draggable">
                        <div>@{{ entree.imat }}, @{{ entree.statut }}, @{{ entree.marque }}, @{{ entree.modele }}</div>
                    </div>
                </div>   
            </div> 
    </div>

    <script src="/js/app.js"></script>
</body>
</html>