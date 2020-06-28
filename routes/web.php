<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/produits/index' , 'ProduitController@index')->name('index_produit');
Route::get('/produits/{produit}/{phase}' , 'ProduitController@selection')->name('type_produit');


Route::get('type_formule_catnat' , 'TarificationController@type_formule_catnat')->name('type_formule_catnat');
Route::get('construction_catanat' , 'TarificationController@construction_catanat')->name('construction_catanat');

Route::post('montant_catnat' , 'TarificationController@montant_catnat')->name('montant_catnat');
Route::post('montant_mrh' , 'TarificationController@montant_mrh')->name('montant_mrh');
Route::post('construction' , 'TarificationController@fetch')->name('construction.fetch');

Route::post('montant_catnat' , 'TarificationController@montant_catnat')->name('montant_catnat');

Route::get('pannier', function () {
    return view('payment');
})->name('pannier');

Route::get('signup', function () {
    return view('signup');
})->name('signup');

Route::get('signin', function () {
    return view('signin');
})->name('signin');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
