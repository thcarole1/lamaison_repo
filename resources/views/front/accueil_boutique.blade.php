@extends('layouts.default')

<!-- Section définissant le titre de la page d'Accueil -->
@section('title')
<title>Boutique La Maison - Accueil</title>
@endsection

<!-- Section permettant d'afficher les produits publiés de la base de données -->
@section('display_all')
<div class='row'>   {{-- Début deuxième ligne --}} 
    <div class='row top pagination'>
            {{ $products->links() }}
    </div>            
    <span> Nombre de produits : {{$total}}</span>

    <!-- Affichage de tous les produits 'publiés' de la base de données -->
    <div class='row display'> 
            @foreach ($products as $item) 
                <div class="card card-space" style="width: 18rem;">
                    <img src="{{$item['url_image']}}"  class="card-img-top" alt="Image of {{$item['Title']}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$item['Title']}}</h5>
                        <p class="card-text">Prix : {{$item['Price']}} euros</p>
                        <a href={{route('produit',$item['id'])}} class="btn btn-primary" title="Go to product page">Voir le produit</a>
                    </div>
                </div>
            @endforeach
    </div>
</div>  <!-- Fin deuxième ligne -->

@endsection