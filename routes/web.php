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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
});

Route::post('construction' , 'TarificationController@fetch')->name('construction.fetch');

/////////////////////////////// Tarificateur
Route::get('/produits/index' , 'ProduitController@index')->name('index_produit');
Route::get('/produits/{produit}/{phase}' , 'ProduitController@selection')->name('type_produit');

Route::post('montant_mrh' , 'TarificationController@montant_mrh')->name('montant_mrh');

Route::post('type_formule_catnat' , 'TarificationController@type_formule_catnat')->name('type_formule_catnat');
Route::post('construction_catanat' , 'TarificationController@construction_catanat')->name('construction_catanat');
Route::get('index' , 'TarificationController@precidanttypeformul')->name('index_catnat');
Route::get('type_formule' , 'TarificationController@precidantconstruction')->name('type_formule');
Route::post('montant_catnat' , 'TarificationController@montant_catnat')->name('montant_catnat');

Route::post('choix_auto' , 'TarificationAutoController@choix_auto')->name('choix_auto');
Route::get('precedent_auto' , 'TarificationAutoController@precedent')->name('precedent_auto');
Route::post('montant_auto' , 'TarificationAutoController@montant_auto')->name('montant_auto');
Route::get('montant_auto' , 'TarificationController@montant_auto')->name('montant_auto');


///////////////////////////// Panier
Route::get('panier', 'TarificationController@panier')->name('pannier');
Route::get('panier_supp/{produit}', 'TarificationController@panier_supp')->name('pannier_supp');


Route::get('panier_', function () {
  return view('panier_save');
});


/////////////////////////// paiement
Route::get('paiement/{id}', 'PaiementController@paiement')->name('paiement');
Route::get('paiementSend', 'PaiementController@test')->name('test');


//////////////////////////////// Accueil
Route::get('/' , 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

/////////////////////////////// Devis produits
Route::get('/devis_auto', 'ProduitController@devis_auto')->name('devis_auto')->middleware('auth');
Route::post('/validation_devis_auto' , 'TarificationAutoController@validation_devis_auto')->name('validation_devis_auto')->middleware('auth');
Route::get('/devis_auto/{id}', 'TarificationAutoController@modification_devis_auto')->name('modification_devis_auto')->middleware('auth');

Route::get('/devis_mrh', 'ProduitController@devis_mrh')->name('devis_mrh')->middleware('auth');
Route::post('/validation_devis_mrh' , 'TarificationController@validation_devis_mrh')->name('validation_devis_mrh')->middleware('auth');
Route::get('/devis_mrh/{id}', 'TarificationController@modification_devis_mrh')->name('modification_devis_mrh')->middleware('auth');

Route::get('/devis_catnat', 'ProduitController@devis_catnat')->name('devis_catnat')->middleware('auth');
Route::post('/validation_devis_catnat' , 'TarificationController@validation_devis_catnat')->name('validation_devis_catnat');
Route::get('/devis_catnat/{id}', 'TarificationController@modification_devis_catnat')->name('modification_devis_catnat')->middleware('auth');

///////////////////////////// Utilisateurs
Auth::routes();

Route::get('signup', function () {
  return view('signup');
})->name('signup');

Route::get('signin', function () {
  return view('signin');
})->name('signin');

Route::get('inscription', function () {
  return view('inscription');
})->name('inscription');

Route::get('visuelisation', 'ProduitController@visuelisation')->name('visuelisation');

Route::get('profil','HomeController@profil')->name('profil');
