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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin_test', function(){
    return view('back.add_product');
});

//**********   Routes publiques ************************
//Route présentant tous les produits disponibles
Route::get('/', 'ProductController@index')->name('accueil');

//Route présentant 1 produit sélectionné
Route::get('produit/{id}', 'ProductController@show_product')->name('produit');

//Route présentant tous les produits soldés
Route::get('soldes', 'ProductController@show_soldes')->name('soldes');

//Route présentant tous les produits destinés aux hommes
Route::get('hommes', 'ProductController@show_hommes')->name('hommes');

//Route présentant tous les produits destinéees aux femmes
Route::get('femmes', 'ProductController@show_femmes')->name('femmes');


//**********  Routes ADMIN  *********************************
//Route admin présentant le dashboard administrateur
Route::get('admin/dashboard/{message?}','ProductController@show_all_dashboard')->name('dashboard');

//Routes permettant de mettre à jour 1 produit
Route::get('admin/update/{id}', 'ProductController@edit')->name('update_get');
Route::post('admin/update/{id}','ProductController@update')->name('update_post');

//Route permettant de supprimer 1 produit
Route::get('admin/delete/{id}','ProductController@destroy')->name('delete');

//Routes permettant de créer 1 produit
Route::get('admin/ajout_produit', 'ProductController@create')->name('ajout_produit_get');
Route::post('admin/ajout_produit/{id?}', 'ProductController@store')->name('ajout_produit_post');
// Route::get('/admin', 'ProductController@show_all')->name('admin');





