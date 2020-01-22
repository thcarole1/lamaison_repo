<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">      

        {{-- Bootstrap injection  CSS--}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        {{-- Fin Bootstrap injection CSS--}}

        <link rel="stylesheet" href="{{asset('css/lamaison.css')}}"/>
        
        <title>Boutique La Maison - Accueil</title>
    </head>

    <body>
        <div class='container'>{{-- Div classe container --}}
            <div class='row'>   {{-- Début première ligne --}}
                <div>
                    <h1><strong>Boutique</strong> La maison</h1>
                </div>

                {{-- Navigation entre les différentes catégories : Accueil, Soldes, Homme et Femme --}}
                <nav class="nav">
                    <a class="nav-link active" href={{route('accueil')}}>ACCUEIL</a>
                    <a class="nav-link" href={{route('soldes')}}>SOLDES</a>
                    <a class="nav-link" href={{route('hommes')}}>HOMMES</a>
                    <a class="nav-link" href={{route('femmes')}}>FEMMES</a>
                </nav> 
            </div>              {{-- Fin première ligne --}}

           @yield('display_all')
           @yield('display_product')   

        </div>      {{-- Fin Div classe container --}}

        {{-- Bootstrap injection JS --}}
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        {{-- Fin Bootstrap injection JS --}}
    </body>
</html>