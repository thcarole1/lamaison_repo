@extends('layouts.default_admin')

<!-- Section définissant la page dédiée aux adminstrateurs du site La Boutique -->
@section('title')
    <title>Boutique La Maison - Dashboard</title>
@endsection

<!-- Section affichant la liste de tous les produits de la base de données su site La Boutique-->
@section('display_products_list')

  <div class="pagination">
    {{ $products->links() }}
  </div>

<span>{{$total}} produits</span>

@if(session('message'))
    <div class="alert alert-info">
        <strong>
            {{session('message')}}
        </strong>
    </div>
@endif

@if(session('message_supp'))
    <div class="alert alert-info">
        <strong>
            {{session('message_supp')}}
        </strong>
    </div>
@endif

<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Catégorie</th>
      <th scope="col">Prix</th>
      <th scope="col">Statut</th>
      <th scope="col">Mettre à jour</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($products as $item) 
        <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['Title']}}</td>
            <td>{{$item['category_Title']}}</td>
            <td>{{$item['Price']}}</td>
            <td>{{$item['Status']}}</td>
            <td><a class='btn btn-warning' href={{route('update_get',$item['id'])}} title="Modify product"><i class="fas fa-pencil-alt "></i></a></td>
            <td><a class='btn btn-danger' href={{route('delete',$item['id'])}} title="Delete product"><i class="fas fa-trash-alt"></i></a></td>
        </tr>   
    @endforeach
  </tbody>
</table>
@endsection