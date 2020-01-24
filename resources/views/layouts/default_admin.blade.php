<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

         <!-- Bootstrap injection  CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <!-- Injection  CSS spécifique à LaBoutique-->
        <link rel="stylesheet" href="{{asset('css/lamaison.css')}}"/>
        
        <!-- Section affichant le titre en fonction de la page visitée-->
        @yield('title')
    </head>

    <body>
        <div class='container'>  <!-- Div classe container-->
            <div class='row'>    <!-- Début première ligne-->
                <div>
                    <h1><strong>Boutique</strong> La maison</h1>
                </div>

                <div class="nav">
                 <!-- Navigation entre les différentes catégories : Accueil, Dashboard, et ajout d'un produit -->
                    <nav class="nav">
                        <a class="nav-link active" href={{route('accueil')}} title="Go to Welcome page"> Retour à l'accueil</a>
                        <a class="nav-link" href={{route('dashboard')}} title ="Go to Dashboard page">DASHBOARD</a>
                        <a class="nav-link" href={{route('ajout_produit_get')}} title ="Go to page to add new product">AJOUTER UN PRODUIT</a>
                    </nav> 
                
                <!-- Authentication Links -->
                    <ul class="navbar-nav ml-auto navigation">
                        <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre title="Current user logged in">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();" title="Log out of session">
                                            {{ __('LOGOUT') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                        </li>
                    </ul>
                </div>
            </div>              <!-- Fin première ligne --> 

                <!-- Appel à la section affichant la liste de TOUS les produits issus de la base de données --> 
                @yield('display_products_list')                
                <!-- Appel à la section permettant de mettre à jour un produit --> 
                @yield('update_data')
                <!-- Appel à la section permettant de créer un produit --> 
                @yield('create_data')
                <!-- @yield('contenu') -->

        </div>      <!-- Fin Div classe container -->

      <!-- Bootstrap injection JavaScript -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/cb60812a1d.js" crossorigin="anonymous"></script>
    </body>
</html>