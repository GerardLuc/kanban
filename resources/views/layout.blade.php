<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/app.css">
        <title>Laravel</title>

    </head>
    <body>

            
            {{-- appelle la fonction app dans la vue --}}
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link btn btn-outline-info" href="/vehicule">Voir les vehicules</a></li>
                        <li class="nav-item active"><a class="nav-link btn btn-outline-info" href="/vehicule/edit">Creer un vehicule</a></li>
                    </ul>
                </div>
            </nav>
            <div id="app" >
                

                @yield('content')

            </div>
            @yield('script')
        
        <script src="/js/app.js"></script>
        
    </body>
</html>
