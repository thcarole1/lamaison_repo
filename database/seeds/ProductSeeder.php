<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Création de 2 enregistrements (homme et femme) dans la table 'categories'
        App\Category::create([
            'Title' => 'homme',
            'Description' => 'Produits destinés aux hommes',
        ]);

        App\Category::create([
            'Title' => 'femme',
            'Description' => 'Produits destinés aux femmes',
        ]);
        
        factory(App\Product::class, 8)->create();
    }
}
