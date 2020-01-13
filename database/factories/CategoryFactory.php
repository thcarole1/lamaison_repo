<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [      
        'Title' => $faker ->text($maxNbChars = 10),
        'Description'=> $faker->text($maxNbChars = 100),
    ];
});
