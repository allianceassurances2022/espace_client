<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CreationCompteEden;
use App\User;

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


//Route::get('404' , 'TarificationController@fetch')->name('construction.fetch');

Route::get('/clear-cache', function () {
  $exitCode = Artisan::call('config:clear');
  $exitCode = Artisan::call('cache:clear');
  $exitCode = Artisan::call('config:cache');
});

Route::post('construction', 'TarificationController@fetch')->name('construction.fetch');

/////////////////////////// renouvellement///
Route::get('renouvellement/auto', 'HomeController@renouvellement_auto')->name('renouvellement.auto');
Route::get('renouvellement/mrh', 'HomeController@renouvellement_mrh')->name('renouvellement.mrh');
Route::get('renouvellement/catnat', 'HomeController@renouvellement_catnat')->name('renouvellement.catnat');
Route::get('renouvellement/mrp', 'HomeController@renouvellement_mrp')->name('renouvellement.mrp');

Route::get('renouvellement/mrh/devis', 'RenouvellementController@renouvellement_mrh')->name('devis_renouvlement_mrh');
Route::post('/validation_devis_renouvellement_mrh', 'RenouvellementController@validation_devis_mrh')->name('validation_devis_renouvellement_mrh')->middleware('auth');

Route::get('renouvellement/auto/devis', 'RenouvellementController@renouvellement_auto')->name('devis_renouvlement_auto');
Route::post('/validation_devis_renouvellement_auto', 'RenouvellementController@validation_devis_auto')->name('validation_devis_renouvellement_auto')->middleware('auth');

Route::get('renouvellement/catnat/devis', 'RenouvellementController@renouvellement_catnat')->name('devis_renouvlement_catnat');
Route::post('/validation_devis_renouvellement_catnat', 'RenouvellementController@validation_devis_catnat')->name('validation_devis_renouvellement_catnat')->middleware('auth');

/////////////////////////////// Tarificateur
Route::get('/produits/index', 'ProduitController@index')->name('index_produit');
Route::get('/produits/{produit}/{phase}', 'ProduitController@selection')->name('type_produit');
Route::post('montant_mrh', 'TarificationController@montant_mrh')->name('montant_mrh');

Route::post('type_formule_catnat', 'TarificationController@type_formule_catnat')->name('type_formule_catnat');
Route::post('construction_catanat', 'TarificationController@construction_catanat')->name('construction_catanat');
Route::get('index', 'TarificationController@precidanttypeformul')->name('index_catnat');
Route::get('type_formule', 'TarificationController@precidantconstruction')->name('type_formule');
Route::post('montant_catnat', 'TarificationController@montant_catnat')->name('montant_catnat');

Route::post('choix_auto', 'TarificationAutoController@choix_auto')->name('choix_auto');
Route::get('precedent_auto', 'TarificationAutoController@precedent')->name('precedent_auto');
Route::post('montant_auto', 'TarificationAutoController@montant_auto')->name('montant_auto');
Route::get('montant_auto', 'TarificationController@montant_auto')->name('montant_auto');

///////////////////////////// Panier
Route::get('panier', 'TarificationController@panier')->name('pannier');
Route::get('panier_supp/{produit}', 'TarificationController@panier_supp')->name('pannier_supp');

Route::get('panier_', function () {
  return view('panier_save');
});

/////////////////////////// paiement
Route::get('paiement_mrh/{id}', 'PaiementController@paiement_mrh')->name('paiement_mrh');
Route::get('paiement_catnat/{id}', 'PaiementController@paiement_catnat')->name('paiement_catnat');
Route::get('paiement_auto/{id}', 'PaiementController@paiement_auto')->name('paiement_auto');
Route::get('paiement_send_mrh/{id}', 'PaiementController@save_mrh')->name('save_mrh');
Route::get('paiement_send_catnat/{id}', 'PaiementController@save_catnat')->name('save_catnat');
Route::get('paiement_send_auto/{id}', 'PaiementController@save_auto')->name('save_auto');
Route::get('satim_confirmation', 'PaiementController@satim_confirmation')->name('satim_confirmation');
Route::get('paiement_success', 'PaiementController@paiement_success')->name('paiement_success');
Route::get('paiement_failed', 'PaiementController@paiement_failed')->name('paiement_failed');
Route::get('confirmation_paiement', 'PaiementController@confirmation_paiement')->name('confirmation_paiement');
Route::get('enregistrement_satim', 'PaiementController@enregistrement_satim')->name('enregistrement_satim');
Route::get('confirmation_enregistrement_satim', 'PaiementController@confirmation_enregistrement_satim')->name('confirmation_enregistrement_satim');

Route::get('enregistrement_satim', 'PaiementController@enregistrement_satim')->name('enregistrement_satim');
// Route::get('paiementauto', 'PaiementController@test2')->name('test2');

//////////////////////////////// Accueil
Route::get('/', 'HomeController@index')->name('home');
Route::post('/devis', 'HomeController@index_table_devis')->name('devis.table');
Route::post('/contrat', 'HomeController@index_table_contrat')->name('contrat.table');
Route::post('/sinistre', 'HomeController@index_table_sinistre')->name('sinistre.table');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/delete_devis/{id}', 'TarificationController@delete_devis')->name('delete_devis');


/////////////////////////////// Devis produits
Route::get('/devis_auto', 'ProduitController@devis_auto')->name('devis_auto')->middleware('auth');
Route::post('/validation_devis_auto', 'TarificationAutoController@validation_devis_auto')->name('validation_devis_auto')->middleware('auth');
Route::get('/devis_auto/{id}', 'TarificationAutoController@modification_devis_auto')->name('modification_devis_auto')->middleware('auth');

Route::get('/devis_mrh', 'ProduitController@devis_mrh')->name('devis_mrh')->middleware('auth');
Route::post('/validation_devis_mrh', 'TarificationController@validation_devis_mrh')->name('validation_devis_mrh')->middleware('auth');
Route::get('/devis_mrh/{id}', 'TarificationController@modification_devis_mrh')->name('modification_devis_mrh')->middleware('auth');

Route::get('/devis_catnat', 'ProduitController@devis_catnat')->name('devis_catnat')->middleware('auth');
Route::post('/validation_devis_catnat', 'TarificationController@validation_devis_catnat')->name('validation_devis_catnat');
Route::get('/devis_catnat/{id}', 'TarificationController@modification_devis_catnat')->name('modification_devis_catnat')->middleware('auth');

/////////////////////////////// Sinistre
Route::get('/sinistre', 'SinistreController@index')->name('new_sinistre');
Route::get('/sinistre_logged', 'SinistreController@logged')->name('new_sinistre_logged');
Route::post('/declare_sinistre', 'SinistreController@declare_sinistre')->name('declare_sinistre');
//Route::get('/sinistre', 'SinistreController@index_sinistre')->name('new_sinistre');
Route::get('/ajaxtest', 'SinistreController@index')->name('ajaxtest');
Route::post('/getData', 'SinistreController@getData')->name('ajaxdata');
Route::get('/getPlice', 'SinistreController@getPolice')->name('getPolice');
Route::post('/getSinistres', 'SinistreController@getSinistres')->name('getSinistres');


Route::get('/Eden/djilali', function () {
  // $mail = 'delmedjadji@allianceassurances.com.dz';


  $users = new User();
  //$data= collect(["email" => "delmedjadji@allianceassurances.com.dz"]);
  $users->email = 'it-dev@allianceassurances.com.dz';
  Notification::send($users, new CreationCompteEden('djilali'));
});

//Route::get('/devis_catnat/{id}', 'TarificationController@delete_devis')->name('delete_devis')->middleware('auth');

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

Route::get('profil', 'UserController@profil')->name('profil');
Route::get('edit_profil', 'UserController@edit_profil')->name('edit_profil');
Route::post('update_profil', 'UserController@update_profil')->name('update_profil');

Route::get('file_validation', function () {
  return view('file_validation');
})->name('file_validation');

Route::get('pdf_mrh', function () {
  return view('pdf.mrh');
})->name('pdf_mrh');

Route::get('djilali', function () {
  return view('pdf.auto');
})->name('djilali');

Route::get('page_pdf/{id}', 'TarificationController@generate_pdf')->name('page_pdf');
Route::get('download_pdf/{id}', 'TarificationController@download_pdf')->name('download_pdf');
Route::get('page_pdf_auto/{id}', 'TarificationAutoController@generate_pdf')->name('page_pdf_auto');
Route::get('download_pdf_auto/{id}', 'TarificationAutoController@download_pdf')->name('download_pdf_auto');

Route::get('contrat_mrh/{id}', 'TarificationController@contrat_mrh')->name('contrat_mrh');
Route::get('contrat_catnat/{id}', 'TarificationController@contrat_catnat')->name('contrat_catnat');
Route::get('contrat_auto/{id}', 'TarificationAutoController@contrat_auto')->name('contrat_auto');
Route::get('attestation/{id}', 'TarificationAutoController@attestation')->name('attestation');

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/calculemrh', 'TarificationService@calculeMRH')->name('calculemrh');

///////////////////////////// Eden

Route::get('/eden_page', 'EdenController@index')->name('eden_page');


Auth::routes();
