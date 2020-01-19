<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    public function show()
    {        
        return view('layouts.default');
    }

    public function show_product($id)
    {        
        $product = Product::findOrFail($id);

        $table=[
            'id' => $product->id,
            'url_image' => $product->url_image,
            'Description' => $product->Description,
            'Price' => $product->Price,
            'Title' => $product->Title,
            'Reference' => $product->Reference,
            'Size' => $product->Size
        ];
        return view('front.produit') -> with('table',$table);
    }

    public function show_all() // Cette fonction récupère tous les produits présents dans la base de données products et les renvoie vers la vue "accueil_boutique" pour affichage
    {        
        $products=Product::where('id','<>','null')->paginate(6);
        return view('front.accueil_boutique',['total'=>$products->total()]) -> with('products',$products);
    }

   public function show_soldes()
    {        
        $products=Product::where('Code','solde')->paginate(6);   
        return view('front.accueil_boutique',['total'=> $products->total()]) -> with('products',$products);   
    }

    public function show_hommes()
    {        
        $products=Product::where('category_id',1)->paginate(6);     
        return view('front.accueil_boutique',['total'=> $products->total()]) -> with('products',$products);   
    }

    public function show_femmes()
    {        
        $products=Product::where('category_id',2)->paginate(6);       
        return view('front.accueil_boutique',['total'=> $products->total()]) -> with('products',$products);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
