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


Route::get('/produitp', function () {
    return view('produits.professionnel');
});

Route::get('/produitc', function () {
    return view('produits.catnat');
});

Route::get('/produita', function () {
    return view('produits.auto');
});
Route::get('/index', function () {
    return view('produits.index');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/signup', function () {
    return view('signup');
});
Route::get('/signin', function () {
    return view('signin');
});

//liste des produits
Route::get('produits/index', function () {
    return view('produits.index');
})->name('produit_index');

Route::get('produits/mrh', function () {
    return view('produits.mrh.index');
})->name('produit_mrh');

Route::get('produits/mrp', function () {
    return view('produits.professionnel.index');
})->name('produit_mrp');

Route::get('produits/catnat', function () {
    return view('produits.catnat');
})->name('produit_catnat');

//section AUTO.................................................................
	//AUTO INDEX.............................................................
Route::get('produits/auto/index', function () {
    return view('produits.auto.index');
})->name('produit_auto');
	//AUTO FORMULE laki......................................................
Route::get('produits/auto/laki', function () {
    return view('produits.auto.formule_laki');
})->name('produit_auto_laki');
	//AUTO FORMULE auto......................................................
Route::get('produits/auto/part', function () {
    return view('produits.auto.formule_part');
})->name('produit_auto_part');

//section CATNAT.................................................................
	//CATNAT INDEX.............................................................
Route::get('produits/catnat/index', function () {
    return view('produits.catnat.index');
})->name('produit_catnat');
	//CATNAT FORMULE HABITATION................................................
Route::get('produits/catnat/habitation', function () {
    return view('produits.catnat.formule_habitation');
})->name('produit_catnat_habitation');
	//CATNAT FORMULE INDUSTRIELLE...............................................
Route::get('produits/catnat/industrielle', function () {
    return view('produits.catnat.formule_industrielle');
})->name('produit_catnat_habitation');
	//CATNAT FORMULE INDUSTRIELLE...............................................
Route::get('produits/catnat/commerce', function () {
    return view('produits.catnat.formule_commerce');
})->name('produit_catnat_commerce');

//section MRH.................................................................
    //MRH INDEX.............................................................
Route::get('/produit/mrh/index', function () {
    return view('produits.mrh.index');
});

//section MRP.................................................................
    //MRH INDEX.............................................................
Route::get('/produit/mrp/index', function () {
    return view('produits.professionnel.index');
});
Route::get('/produit/mrp/garanties', function () {
    return view('produits.professionnel.garanties');
});
//payment route manager

//autentification

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
