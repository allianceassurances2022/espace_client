<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteAPIProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/check_user', 'APIs\LoginAPI@CheckUser');
Route::post('/addparrain', 'APIs\InscriptionAPI@addparrain');


Route::post('/calculemrh', 'APIs\TarificationAPI@calculeMRH');
Route::post('/calculecatnat', 'APIs\TarificationAPI@calculeCatnat');
Route::post('/calculeauto', 'APIs\TarificationAPI@calculeAuto');
Route::post('/create_sinistre', 'APIs\SinistreAPI@createSinistre');
Route::get('/get_sinistre', 'APIs\SinistreAPI@getAllDossierSinistre');
Route::post('/get_email', 'APIs\SinistreAPI@getEmail');

Route::get('/get_points', 'APIs\EdenValidationPointAPI@updatePoints');
Route::get('/get_points_converted', 'APIs\EdenValidationPointAPI@getPoints');

Route::get('/get_wilaya', 'APIs\WilayaAPI@getWilayas');
Route::post('/get_commune', 'APIs\CommuneAPI@getCommunesByCodeWilaya');

Route::post('/get_parrainage', 'APIs\EdenAPI@getParrainage');
