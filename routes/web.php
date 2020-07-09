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
Route::get('/my', function () {
    return view('my');
});


Route::get('/produits/index' , 'ProduitController@index')->name('index_produit');
Route::get('/produits/{produit}/{phase}' , 'ProduitController@selection')->name('type_produit');


Route::post('type_formule_catnat' , 'TarificationController@type_formule_catnat')->name('type_formule_catnat');

//Route::get('construction_catanat' , 'TarificationController@construction_catanat')->name('construction_catanat');
Route::post('construction_catanat' , 'TarificationController@construction_catanat')->name('construction_catanat');


Route::post('montant_catnat' , 'TarificationController@montant_catnat')->name('montant_catnat');
Route::post('montant_mrh' , 'TarificationController@montant_mrh')->name('montant_mrh');
Route::post('construction' , 'TarificationController@fetch')->name('construction.fetch');

Route::post('choix_auto' , 'TarificationController@choix_auto')->name('choix_auto');
Route::post('montant_auto' , 'TarificationController@montant_auto')->name('montant_auto');


Route::get('montant_auto' , 'TarificationController@montant_auto')->name('montant_auto');

Route::get('pannier', 'TarificationController@panier')->name('pannier');
Route::get('pannier_supp/{produit}', 'TarificationController@panier_supp')->name('pannier_supp');
Route::get('paiement', 'TarificationController@paiement')->name('paiement');
Route::get('signup', function () {
    return view('signup');
})->name('signup');

Route::get('signin', function () {
    return view('signin');
})->name('signin');

// Route::get('devismrh', function () {
//     return view('produits.mrh.devis_mrh');
// })->name('devismrh');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/devis_mrh', 'ProduitController@devis_mrh')->name('devis_mrh');

Route::get('visuelisation', 'ProduitController@visuelisation')->name('visuelisation');
