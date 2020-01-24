<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // la fonction index() renvoie tous les produits 'publiés' de la bdd à la vue front.accueil_boutique
    public function index()
    {
        $products=Product::where('Status','=','publié')->paginate(6);
        return view('front.accueil_boutique',['total'=>$products->total()]) -> with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validation des données
         $data=$this->validate($request,[
            'Title' => 'required',
            'Description' => 'required',
            'Price' => 'required',
            'Code'=> 'required',
            'Reference' => 'required',
            'Publication' => 'required',
            'Taille' => 'required',
            'Categorie' => 'required',
            'Photo' => 'required |image'
        ]); 

            //Traitement photo
            $file=$request->file('Photo');
            $extension=$file->extension();
            $path=$file->storeAs('Photos',$_FILES['Photo']['name']);

           //Création d'un nouveau produit
            $product= new Product;

            // enregistrer en base de données si les données sont valides
            $product->Title=$data['Title'];
            $product->Description=$data['Description'];
            $product->Price=$data['Price'];
            $product->Code=$data['Code'];
            $product->Status=$data['Publication'];
            $product->Reference=$data['Reference'];
            $product->Size=$data['Taille'];            
            $product->category_id=$data['Categorie'];
            $product->url_image=$path;
            $product->save();

            // rediriger vers une page, avec un message de succès (création d'un nouveau produit)
            return redirect('admin/dashboard')-> with(['message' => 'Votre produit a bien été créé']);
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

    // la fonction show_product($id) renvoie les informations d'un produit d'identifiant $id à la vue front.produit
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
            'Size' => $product->Size,
            'Code' => $product->Code,
            'Gender' => $product ->category_id
        ];
        return view('front.produit') -> with('table',$table);
    }

    // Cette fonction récupère tous les produits présents dans la base de données products et les renvoie vers la vue "accueil_boutique" pour affichage
    public function show_all_dashboard() 
    {        
        $products=Product::where('products.id','<>','null')
                            ->join('categories','products.category_id','=','categories.id')
                            ->select('products.*', 'categories.Title AS category_Title') 
                            ->orderBy('id', 'desc')                        
                            ->paginate(10);

        return view('back.dashboard',['total'=>$products->total()]) -> with('products',$products);
    }


    // La fonction show_soldes() renvoie les produits 'publiés' ET 'soldés' à la vue front.accueil_boutique
   public function show_soldes()
    {        
        $products=Product::where('Code','solde')
                            ->where('Status','publié')
                            ->orderBy('id', 'desc')
                            ->paginate(6);   
        return view('front.accueil_boutique',['total'=> $products->total()]) -> with('products',$products);   
    }

    // La fonction show_soldes() renvoie les produits 'publiés' ET  destinés aux hommes (i.e category_id == 1) à la vue front.accueil_boutique
    public function show_hommes()
    {        
        $products=Product::where('category_id',1)
                            ->where('Status','publié')
                            ->orderBy('id', 'desc')
                            ->paginate(6);     
        return view('front.accueil_boutique',['total'=> $products->total()]) -> with('products',$products);   
    }

        // La fonction show_soldes() renvoie les produits 'publiés' ET  destinés aux femmes (i.e category_id == 2) à la vue front.accueil_boutique
    public function show_femmes()
    {        
        $products=Product::where('category_id',2)
                            ->where('Status','publié')
                            ->orderBy('id', 'desc')
                            ->paginate(6);       
        return view('front.accueil_boutique',['total'=> $products->total()]) -> with('products',$products);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // La fonction edit($id) renvoie les infos du produit d'identifiant $id à la vue back.update
    public function edit($id)
    {
        $products=Product::find($id);
        return view('back.update') -> with('products',$products);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // La fonction update(Request $request, $id) vérifie la validité de la requête de mise à jour, 
     //met à jour la bdd si les données sont valides et renvoie un message de type OK vers la route "admin/dashboard" 
    public function update(Request $request, $id)
    {
         // valider les données
         $data=$this->validate($request,[
            'Title' => 'required',
            'Description' => 'required',
            'Price' => 'required',
            'Code'=> 'required',
            'Reference' => 'required',
            'Publication' => 'required',
            'Taille' => 'required',
            'Categorie' => 'required',
            'Photo' => 'image'
        ]);  

        if($_FILES['Photo']['name'] <> "") //En cas de mise à jour de l'image du produit
        {
            //Traitement photo
            $file=$request->file('Photo');
            $extension=$file->extension();        
            $path_cleaned=str_replace(" ", "_",$_FILES['Photo']['name']);
            $path=$file->storeAs('Photos',$path_cleaned);
        }

        // enregistrer en base de données si les données sont valides
        $product=Product::find($id);
        $product->Title=$data['Title'];
        $product->Description=$data['Description'];
        $product->Price=$data['Price'];
        $product->Code=$data['Code'];
        $product->Status=$data['Publication'];
        $product->Reference=$data['Reference'];
        $product->Size=$data['Taille'];            
        $product->category_id=$data['Categorie'];
        if($_FILES['Photo']['name'] <> "")
        {
            $product->url_image=url("upload/".$path);
        }        
        $product->save();

        // rediriger vers une page, avec un message de succès (Mise à jour d'un produit)
        return redirect('admin/dashboard')-> with(['message' => 'Votre produit a bien été mis à jour']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // La fonction destroy($id) supprime le produit d'identifiant $id de la base de données
    // et renvoie un message à l'utilisateur
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('admin/dashboard')-> with(['message_supp' => 'Votre produit a bien été supprimé']);
    }
}
