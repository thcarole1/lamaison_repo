@extends('layouts.default_admin')

@section('display_products_list')

{{ $products->links() }}

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
            <td><button><a href={{route('update_get',$item['id'])}}>Màj</a></button></td>
            <td><button><a href={{route('delete',$item['id'])}}>Supp</a></button></td>
        </tr>   
    @endforeach
  </tbody>
</table>

@endsection