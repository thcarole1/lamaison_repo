<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blade', function(){
    return view('conteneur');
});

Route::get('accueil', 'ProductController@show_all')->name('accueil');
Route::get('produit/{id}', 'ProductController@show_product')->name('produit');
Route::get('soldes', 'ProductController@show_soldes')->name('soldes');
Route::get('hommes', 'ProductController@show_hommes')->name('hommes');
Route::get('femmes', 'ProductController@show_femmes')->name('femmes');




