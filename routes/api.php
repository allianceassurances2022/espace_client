<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/calculemrh', 'Services\TarificationService@calculeMRH');
Route::post('/calculecatnat', 'Services\TarificationService@calculeCatnat');
Route::post('/calculeauto', 'Services\TarificationService@calculeAuto');
Route::post('/create_sinistre', 'Services\SinistreService@createSinistre');
Route::get('/get_sinistre', 'Services\SinistreService@getAllDossierSinistre');
Route::post('/get_email', 'Services\SinistreService@getEmail');
Route::post('/check_user', 'Services\LoginService@CheckUser');

Route::get('/get_wilaya', 'Services\DataService@getWilayas');

Route::post('/get_parrainage', 'Services\EdenService@getParrainage');
Route::get('/get_parrainage', 'Services\EdenService@getParrainage');
