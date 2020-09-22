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
              "code"             => "1231265",
              "rgnId"            => "16023",
              "civitlite"        => "1",
              "nom"              => "Belabebs",
              "prenom"           => "Mohamed Abdelillah",
              "nationalite"      => "Algérienne",
              "tel_mobile"       => "07961074144",
              "email"            => "mo.belabbzes6@live.com",
              "address"          => "Bordj el Kiffan",
              "dateSouscription" => "10/08/2020",
              "dateEffet"        => "20/08/2020",
              "dateExpiration"   => "19/08/2021",
              "modePayment"      => "4",
              "remarque"         => "remarque",
              "description"      => "description",
              "netApayer"        => "10200"
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
