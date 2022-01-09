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
Route::post('/get_email', 'APIs\SinistreAPI@getEmail');
Route::get('/get_create_points', 'APIs\EdenCreatePointsToConvertAPI@getCreatePointsToConvert');
Route::get('/get_points_converted', 'APIs\EdenPointsConverted@getPoints');

Route::post('/addparrain', 'APIs\InscriptionAPI@addparrain');
Route::get('/get_parrainage', 'APIs\EdenAPI@getParrainage');
Route::get('/get_points', 'APIs\EdenValidationPointAPI@updatePoints');


Route::post('/calculemrh', 'APIs\TarificationAPI@calculeMRH')->name('api_calcul_mrh');
Route::post('/calculecatnat', 'APIs\TarificationAPI@calculeCatnat')->name('api_calcul_catnat');
Route::post('/calculeauto', 'APIs\TarificationAPI@calculeAuto')->name('api_calcul_auto');

Route::post('/create_sinistre', 'APIs\SinistreAPI@createSinistre');
Route::get('/get_sinistre', 'APIs\SinistreAPI@getAllDossierSinistre')->name('api_get_alldossiersinistre');
Route::get('/all_sinistre', 'APIs\SinistreAPI@AllDossierSinistre');
Route::get('/all_vehicule', 'APIs\SinistreAPI@AllVehicules');
Route::get('/getSinistreById', 'APIs\SinistreAPI@getSinistreById');
Route::get('/getVehiculeById', 'APIs\SinistreAPI@getVehiculeById');
Route::get('/validateSinistre', 'APIs\SinistreAPI@validateSinistre');




Route::get('/get_wilaya', 'APIs\WilayaAPI@getWilayas');
Route::get('/get_agence', 'APIs\GetAgencesAPI@getAgences');
Route::get('/get_agence_json', 'APIs\GetAgencesAPI@getAgencesJson');
Route::get('/get_commune', 'APIs\CommuneAPI@getCommunesByCodeWilaya');
Route::post('/get_nearest_agence', 'APIs\GetNearestAgencesAPI@getNearestAgences');

Route::get('/get_police', 'APIs\GetPoliceAPI@getPoliceByUser');
Route::get('/get_user_police', 'APIs\GetUserByPoliceAPI@getUserByPolice');

Route::get('/get_slider_img', 'APIs\SliderAPI@getSliderImg');
Route::get('/get_slider_img_detail', 'APIs\SliderAPI@getSliderImgDetail');
