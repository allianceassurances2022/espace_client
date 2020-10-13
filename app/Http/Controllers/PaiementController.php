<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wilaya;
use App\commune;
use App\zcatnat;
use App\Agences;

use App\Rsq_Immobilier;
use App\devis;

use auth;

class PaiementController extends Controller
{
    public function paiement ($id){

  		$mrh         = Rsq_Immobilier::where('id',$id)->first();
  		$code_devis  = $mrh->code_devis;
  		$id          = $mrh->id;
  		$devis       = devis::where('id',$code_devis)->first();
  		$prime_total = $devis->prime_total;
  		$catnat      = '';
  		$auto        = '';


          return view('paiement',compact('mrh','auto','catnat','prime_total','id'));

          }

          public function test (){

            $var = [
              "regionId"          => "16",
              "agenceId"          => "00000",
              "classId"           => "12",
              "branchId"          => "1226",
              "souscriptionDate"  => "04/10/2020",
              "effetDate"         => "30/09/2020",
              "expirationDate"    => "03/10/2021",
              "periode"           => 1,
              "periodeType"       => 2,
              "wilayaId"          => "01",
              "villeId"           => "0101",
              "address"           => "ADRAR",
              "batimentType"      => "1",
              "batimentCategorie" => "1",
              "surface"           => "0",
              "nombrePieces"      => "3",
              "etage"             => "0",
              "terasse"           => 0,
              "formule"           => "8",
              "capitaleAssure"    => 500000
            ];

            $var=json_encode($var);

            $client = new \GuzzleHttp\Client();
            $url = "http://10.0.0.131:8443/api/polices/addPolice";

            $request = $client->post($url,[
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'body'    => $var
            ]);

            $response = json_decode($request->getBody(), true);

            dd($response);

          }

}
