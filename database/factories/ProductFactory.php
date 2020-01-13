<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) 
{
            //Array values
            $sizeArrayValues = ['46','48','50','52'];
            $statusArrayValues = ['Publié','Brouillon'];
            $codeArrayValues = ['solde','new'];
        return [
            
            'Title' => $faker ->text($maxNbChars = 10),
            'Description'=> $faker->text($maxNbChars = 100),
            'Price'=> $faker->randomNumber(2),
            'Size'=> $sizeArrayValues[rand(0,3)],
            'url_image'=> $faker->url,
            'Status'=> $statusArrayValues[rand(0,1)],
            'Code'=> $codeArrayValues[rand(0,1)],
            'Reference'=> $faker->text($maxNbChars = 10),
            'published_at'=>now()
        ];
});