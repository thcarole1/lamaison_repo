@extends('layouts.default')

<!-- Section définissant le titre de la page produit -->
@section('title')
    <title>Boutique La Maison - Produit {{$table['Title']}}</title>
@endsection

<!-- Section permettant d'afficher les caractéristiques du produit sélectionné par l'utilisateur -->
@section('display_product')
    <div class='row'>   <!-- Début deuxième ligne -->

    <!-- Mise en place du fil d'Ariane -->
        <div class='path'>                    
            <span>boutique ></span>
            @if($table['Code'] == 'solde')
                <span>soldes > </span>
            @endif

            @if($table['Gender'] == 1)
                <span> Homme </span>
            @endif

            @if($table['Gender'] == 2)
                <span> Femme </span>
            @endif
        </div>

        <div class='product'>

            <div class="photos"><br><br><br><br><br>
                    <div class="photo_vignette conteneur">Image 1</div>
                    <div class="photo_vignette conteneur">Image 2</div>
                    <div class="photo_vignette conteneur">Image 3</div>
            </div>

            <div class="picture">
                <div class='row display'>
                        <img src="{{$table['url_image']}}" class="card-img-top" alt="Image of {{$table['Title']}}">
                        <div class="card-body"></div>
                </div>
            </div>

            <div class='reference size price title'>
                    <span>{{$table['Title']}}</span> <br><br>
                    <span><strong>Ref : </strong>{{$table['Reference']}}</span> <br><br>
                    <span><strong>Prix : </strong>{{$table['Price']}} euros</span><br><br>

                    <select class="mdb-select md-form">
                        <option value="" disabled selected>Taille</option>
                        <option value="1">{{$table['Size']}}</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="3">Option 4</option>
                    </select>
            </div>
        </div>

        <div>
            <p><strong>Description : <br></strong>{{$table['Description']}}</p>
        </div>
    </div> <!-- Fin deuxième ligne -->
@endsection