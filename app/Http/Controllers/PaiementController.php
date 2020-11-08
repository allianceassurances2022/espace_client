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

use Carbon\Carbon;

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
              "nom"               => auth()->user()->name,
              "prenom"            => auth()->user()->prenom,
              "dateNaissance"     => "04/07/1995",
              "lieuNaissance"     => auth()->user()->adresse,
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

                $date_naissance = Carbon::parse(auth()->user()->date_naissance)->format('d/m/Y');

                $date_souscription = Carbon::parse($devis->date_souscription)->format('d/m/Y');
                $date_effet        = Carbon::parse($devis->date_effet)->format('d/m/Y');
                $date_expiration   = Carbon::parse($devis->date_expiration)->format('d/m/Y');

                $var = [
    "nom"                     => auth()->user()->name,
    "prenom"                  => auth()->user()->prenom,
    "categorie"               => "2",
    "civitlite"               => "1",
    "dateNaissance"           => $date_naissance,
    "lieuNaissance"           => auth()->user()->wilaya,
    "nationalite"             => "Algérienne",
    "activite"                => "1",
    "proffession"             => "1",
    "assureAddresse"          => "Fort de l'eau",
    "assureWilayaId"          => "01",
    "assureVilleId"           => "0101",
    "regionId"                => "16",
    "agenceId"                => $devis->code_agence,
    "classId"                 => "11",
    "branchId"                => "1100",
    "souscriptionDate"        => $date_souscription,
    "effetDate"               => $date_effet,
    "expirationDate"          => $date_expiration,
    "periode"                 => 1,
    "periodeType"             => 2,
    "wilayaId"                => "16",
    "villeId"                 => "1605",
    "matricule"               => "123456",
    "constructionAnnee"       => 2014,
    "chassisNo"               => "12345678912345678",
    "chassisType"             => "0",
    "matriculeLieu"           => "16",
    "marque"                  => "531",
    "model"                   => "5454454",
    "genre"                   => "03",
    "usage"                   => "00",
    "puissance"               => "5454454",
    "typeCarburant"           => "1",
    "couleur"                 => "1",
    "nbrPersonne"             => 3,
    "cUtil"                   => 0,
    "pTac"                    => 0,
    "formule"                 => "1",
    "attestation"             => "123456swqdf",
    "capitaleAssure"          => 20000,
    "autoRadio"               => 0,
    "chiffreAffaire"          => 0,
    "tauxReduction"           => "0",
    "assistance"              => "0",
    "alarme"                  => 0,
    "turbo"                   => 0,
    "hautGamme"               => 1,
    "liquidInflamable"        => 0,
    "controleTechnique"       => 0,
    "conducteurCode"          => "1000000061454",
    "conducteurNom"           => "HAROUN MILAT",
    "conducteurDateNaissance" => "04/04/1985",
    "permisNo"                => "1231564",
    "permisCategorie"         => "2",
    "permisDate"              => "01/01/2014",
    "permisLieu"              => "Alger"

                ];

                $var=json_encode($var);

                $client = new \GuzzleHttp\Client();
                $url = "http://10.0.0.131:8443/api/polices/addPolice";

                $request = $client->post($url,[
                'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
                'body'    => $var
                ]);

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

}
