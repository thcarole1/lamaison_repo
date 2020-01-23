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

                <div class=navigation>

                    {{-- Navigation entre les différentes catégories : Accueil, Soldes, Homme et Femme --}}
                    <nav class="nav">
                        <a class="nav-link active" href={{route('accueil')}}>ACCUEIL</a>
                        <a class="nav-link" href={{route('soldes')}}>SOLDES</a>
                        <a class="nav-link" href={{route('hommes')}}>HOMMES</a>
                        <a class="nav-link" href={{route('femmes')}}>FEMMES</a>                    
                    </nav> 
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto navigation">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('LOGOUT') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    </ul>
                </div>
            </div>              {{-- Fin première ligne --}}

           @yield('display_all')
           @yield('display_product')
           @yield('content')

        </div>      {{-- Fin Div classe container --}}

        {{-- Bootstrap injection JS --}}
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        {{-- Fin Bootstrap injection JS --}}
    </body>
</html>