<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) 
{
            //Array values
            $size=[];
            $sizeArrayValues = ['46','48','50','52'];
            $statusArrayValues = ['Publié','Brouillon'];
            $codeArrayValues = ['solde','new'];

            $nb=rand(0,3);

            for($i=0;$i<=$nb;$i++){
                $size[$i]=$sizeArrayValues[$i];
            }

            $val=implode($size);
            
        return [
            'Title' => $faker ->text($maxNbChars = 10),
            'Description'=> $faker->text($maxNbChars = 100),
            'Price'=> $faker->randomNumber(2),
            'Size'=> $sizeArrayValues[rand(0,3)],
            'url_image'=> url("https://picsum.photos/id/".rand(1,100)."/600/600.jpg"),
            'Status'=> $statusArrayValues[rand(0,1)],
            'Code'=> $codeArrayValues[rand(0,1)],
            'Reference'=> $faker->text($maxNbChars = 10),
            'published_at'=>now(),
            'category_id'=>rand(1,2)
        ];
});
