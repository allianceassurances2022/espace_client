<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wilaya;
use App\commune;
use App\zcatnat;
use App\Agences;

use App\Rsq_Immobilier;
use App\Rsq_Vehicule;
use App\devis;

use auth;

class PaiementController extends Controller
{
    public function paiement_mrh ($id){

  		$mrh         = Rsq_Immobilier::where('id',$id)->first();
  		$code_devis  = $mrh->code_devis;
  		$id          = $mrh->id;
  		$devis       = devis::where('id',$code_devis)->first();
  		$prime_total = $devis->prime_total;
  		$catnat      = '';
  		$auto        = '';

      return view('paiement',compact('mrh','auto','catnat','prime_total','id','devis'));

      }

          public function save_mrh ($id){

            $devis = devis::find($id);

            $var = [
              "categorie"         => "1",
              "civitlite"         => "1",
              "nom"               => "Belabbes",
              "prenom"            => "Mohamed Abdelillah",
              "dateNaissance"     => "04/07/1995",
              "lieuNaissance"     => "Rahouia",
              "nationalite"       => "Algérienne",
              "activite"          => "1",
              "proffession"       => "1",
              "assureAddresse"    => "Fort de l'eau",
              "assureWilayaId"    => "01",
              "assureVilleId"     => "0101",
              "regionId"          => "16",
              "agenceId"          => "00000",
              "classId"           => "12",
              "branchId"          => "1225",
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

            // $response = json_decode($request->getBody(), true);
            $response = json_decode($request->getBody(), true);

            if($response['status']){

              $devis->update([
          			'type_devis'      => 2,
          			'reference_police' => $response['data']["reference"],
          		]);
          		$dev=$devis;

            }

            return redirect()->route('home');

          }

          public function paiement_catnat ($id){

        		$catnat      = Rsq_Immobilier::where('id',$id)->first();
        		$code_devis  = $catnat->code_devis;
        		$id          = $catnat->id;
        		$devis       = devis::where('id',$code_devis)->first();
        		$prime_total = $devis->prime_total;
        		$mrh         = '';
        		$auto        = '';

            return view('paiement',compact('mrh','auto','catnat','prime_total','id','devis'));

            }

            public function save_catnat ($id){

              $devis = devis::find($id);

              $var = [
    "nom"               => "Belabbes",
    "prenom"            => "Mohamed Abdelillah",
    "categorie"         => "1",
    "civitlite"         => "1",
    "dateNaissance"     => "04/07/1995",
    "lieuNaissance"     => "Rahouia",
    "nationalite"       => "Algérienne",
    "activite"          => "1",
    "proffession"       => "1",
    "assureAddresse"    => "Fort de l'eau",
    "assureWilayaId"    => "01",
    "assureVilleId"     => "0101",
    "regionId"          => "16",
    "agenceId"          => "00000",
    "classId"           => "12",
    "branchId"          => "1290",
    "souscriptionDate"  => "04/10/2020",
    "effetDate"         => "30/09/2020",
    "expirationDate"    => "03/10/2021",
    "periode"           => 1,
    "periodeType"       => 2,
    "wilayaId"          => "01",
    "villeId"           => "0101",
    "address"           => "ADRAR",
    "zone"              => "5",
    "formule"           => "3",
    "batimentType"      => "1",
    "batimentCategorie" => "1",
    "surface"           => "0",
    "nombrePieces"      => "3",
    "etage"             => "0",
    "anneeConstruction" => 2015,
    "proprietaire"      => 1,
    "activiteRisque"    => "1",
    "capitaleAssure"    => 500000,
    "valeurEquipement"  => 200000,
    "valeurMarchandise" => 300000,
    "valeurContenant"   => 500000,
    "regPara"           => 1,
    "inscRegisteCom"    => 1,
    "registeCom"        => 1,
    "appartient"        => 1

              ];

              $var=json_encode($var);

              $client = new \GuzzleHttp\Client();
              $url = "http://10.0.0.131:8443/api/polices/addPolice";

              $request = $client->post($url,[
              'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
              'body'    => $var
              ]);

              // $response = json_decode($request->getBody(), true);
              $response = json_decode($request->getBody(), true);

              if($response['status']){

                $devis->update([
            			'type_devis'      => 2,
            			'reference_police' => $response['data']["reference"],
            		]);
            		$dev=$devis;

              }

              return redirect()->route('home');

            }

            public function paiement_auto ($id){

          		$auto         = Rsq_Vehicule::where('id',$id)->first();
          		$code_devis  = $auto->code_devis;
          		$id          = $auto->id;
          		$devis       = devis::where('id',$code_devis)->first();
          		$prime_total = $devis->prime_total;
          		$catnat      = '';
          		$mrh         = '';

              return view('paiement',compact('mrh','auto','catnat','prime_total','id','devis'));

              }

              public function save_auto ($id){

                $devis = devis::find($id);

                // $var = [
                //
                // ];
                //
                // $var=json_encode($var);
                //
                // $client = new \GuzzleHttp\Client();
                // $url = "http://10.0.0.131:8443/api/polices/addPolice";
                //
                // $request = $client->post($url,[
                // 'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
                // 'body'    => $var
                // ]);
                //
                // // $response = json_decode($request->getBody(), true);
                // $response = json_decode($request->getBody(), true);
                //
                // if($response['status']){
                //
                //   $devis->update([
              	// 		'type_devis'      => 2,
              	// 		'reference_police' => $response['data']["reference"],
              	// 	]);
              	// 	$dev=$devis;
                //
                // }
                $devis->update([
                'type_devis'      => 2,
              	'reference_police' => "00000 00 0000 0000",
                ]);

                return redirect()->route('home');

              }

}
