

@extends('layouts.default')

@section('display_all')

<div class='row'>   {{-- Début deuxième ligne --}} 
    <div class='row top'>
       {{ $products->links() }}
        <span> Nombre de produits : {{$total}}</span>
    </div>            

    <div class='row display'>{{-- Affichage de tous les produits de la base de données --}}
            @foreach ($products as $item) 
                <div class="card card-space" style="width: 18rem;">
                    <img src={{$item['url_image']}}  class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$item['Title']}}</h5>
                        <p class="card-text">Prix : {{$item['Price']}} euros</p>
                        <a href={{route('produit',$item['id'])}} class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            @endforeach
    </div>
</div>  {{-- Fin deuxième ligne --}}


@endsection