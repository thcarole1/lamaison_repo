@extends('layouts.default_admin')

<!-- Section définissant le titre de la page de mise à jour du produit sélectionné par l'admin -->
@section('title')
    <title>Boutique La Maison - Mise à jour de {{$products->Title}}</title>
@endsection

<!-- Section définissant la page de mise à jour produit-->
@section('update_data')

<!-- Gestion des messages d'erreur lors de la mise à jour produit -->
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>
            Oups. Nous n'avons pas pu enregistrer votre demande pour la raison suivante :
        </strong>

        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action={{route('update_post',$products->id)}} method="post" enctype="multipart/form-data">

{{ csrf_field() }}

    <div class='update'>
        <div>
            <span>Titre</span>
            <input type="text" name='Title' value={{$products->Title}}>
            <br/><br/>

            <span>Description</span>
            <br/>
            <textarea name="Description" id="test" cols="30" rows="10">{{$products->Description}}</textarea>
            <br/><br/>

            <span>Prix</span>
            <input type="text" name="Price" value={{$products->Price}}>
            <br/><br/>

            <span>Catégorie</span>
            <select name='Categorie' >
                @if($products->category_id == 1)
                    <option value="1" selected>Homme</option>
                    <option value="2">Femme</option>
                @else            
                    <option value="1" >Homme</option>
                    <option value="2" selected>Femme</option>
                @endif
            </select>
            <br/><br/>

            <span>Taille</span>
            <select name='Taille'>
                @switch($products->Size)
                    @case('46')
                    <option value="46" selected>46</option>
                    <option value="48">48</option>
                    <option value="50">50</option>
                    <option value="52">52</option>
                    @break

                    @case('48')
                    <option value="46">46</option>
                    <option value="48" selected>48</option>
                    <option value="50">50</option>
                    <option value="52">52</option>
                    @break  

                    @case('50')
                    <option value="46">46</option>
                    <option value="48">48</option>
                    <option value="50" selected>50</option>
                    <option value="52">52</option>
                    @break

                    @case('52')
                    <option value="46">46</option>
                    <option value="48">48</option>
                    <option value="50">50</option>
                    <option value="52" selected>52</option>
                    @break
                @endswitch
            </select>
            <br/><br/>

            <span>Image</span>
       
            <input type="file" name="Photo" value={{$products->url_image}}> <br><br>
            <img src={{$products->url_image}}  alt="Image of {{$products->Title}}">
                  
            <br><br>
            <input type="submit" value="Mettre à jour">
        </div>

        <div>
            <span>Statut</span>
            <br/>

            @if($products->Status == 'publié')            
                <input type="radio" name="Publication" value="publié"  checked> Publié<br>
                <input type="radio" name="Publication" value="brouillon"> Brouillon <br>   
            @else
                <input type="radio" name="Publication" value="publié"> Publié<br>
                <input type="radio" name="Publication" value="brouillon" checked> Brouillon <br>   
            @endif

            <br><br>
            <span>Code produit</span>

            @if($products->Code == 'solde')
                        <select name="Code">
                            <option value="solde" selected>Soldes</option>
                            <option value="new" >New</option>
                        </select>
            @else
                        <select name="Code">
                            <option value="solde">Soldes</option>
                            <option value="new" selected>New</option>
                        </select>
            @endif

            <br/><br/>

            <br><br>
            <span>Référence produit</span>
            <input type="text"  name='Reference' value={{$products->Reference}}>

        </div>  
    </div> <!-- Fin div prinicpale -->
</form>

@endsection