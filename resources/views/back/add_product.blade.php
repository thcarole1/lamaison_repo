@extends('layouts.default_admin')

@section('update_data')

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

<form action={{route('ajout_produit_post')}} method="post" enctype="multipart/form-data">

{{ csrf_field() }}

    <div class='update'>
        <div>
            <span>Titre</span>
            <input type="text" name='Title' placeholder='Entrer Titre' value={{old('Title')}}>
            <br/><br/>

            <span>Description</span>
            <br/>
            <textarea name="Description" id="test" cols="30" rows="10" placeholder='Entrer Description'>{{old('Description')}}</textarea>
            <br/><br/>

            <span>Prix</span>
            <input type="text" name="Price" placeholder='Entrer prix' value={{old('Price')}}>
            <br/><br/>

            <span>Catégorie</span>
            <select name='Categorie' >
                @if (old('Categorie') == "1")
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
                @if(old('Taille')==46)
                    <option value="" placeholder='Entrer taille'></option>
                    <option value="46" selected>46</option>
                    <option value="48">48</option>
                    <option value="50">50</option>
                    <option value="52">52</option>

                @elseif(old('Taille')==48)     
                    <option value="" placeholder='Entrer taille'></option>     
                    <option value="46">46</option>
                    <option value="48" selected>48</option>
                    <option value="50">50</option>
                    <option value="52">52</option>

                @elseif(old('Taille')==50)  
                    <option value="" placeholder='Entrer taille'></option>
                    <option value="46">46</option>
                    <option value="48">48</option>
                    <option value="50" selected>50</option>
                    <option value="52">52</option>

                @elseif(old('Taille')==52)  
                    <option value="" placeholder='Entrer taille'></option>
                    <option value="46">46</option>
                    <option value="48">48</option>
                    <option value="50">50</option>
                    <option value="52" selected>52</option>

                @else
                    <option value="" placeholder='Entrer taille' selected ></option>
                    <option value="46">46</option>
                    <option value="48">48</option>
                    <option value="50">50</option>
                    <option value="52">52</option>                   
                @endif
            </select>
            <br/><br/>

            <span>Image</span>
            <input type="file" name="Photo">

            <br><br>
            <input type="submit" value="Ajouter">
        </div>

        <div>
            <span>Statut</span>
            <br/>
                @if (old('Publication') == "publié")
                    <input type="radio" name="Publication" value="publié"  checked> Publié<br>
                    <input type="radio" name="Publication" value="brouillon"> Brouillon <br>   
                @else
                    <input type="radio" name="Publication" value="publié"> Publié<br>
                    <input type="radio" name="Publication" value="brouillon" checked> Brouillon <br>   
                @endif
            <br><br>


            <span>Code produit</span>
            <select name="Code">
                @if(old('Code') == "solde")
                    <option value="solde" selected>Soldes</option>
                    <option value="new" >New</option>
                @else 
                    <option value="solde">Soldes</option>
                    <option value="new" selected >New</option>
                @endif
            </select>
            <br/><br/>

            <br><br>
            <span>Référence produit</span>
            <input type="text"  name='Reference' placeholder='Entrer référence' value={{old('Reference')}}>

        </div>  

    </div> {{-- Fin div prinicpale --}}
</form>
@endsection