<?php

namespace App\Http\Controllers;

use App\Assistance;
use App\Assure;
use App\Categorie_permis;
use App\formule;
use App\Puissance;
use Carbon\Carbon;
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
            $risque = Rsq_Immobilier::where('code_devis', $id)->first();


            $terasse = $risque->terrasse;


            if ($terasse == "oui"){
                $terasse = 1;
            }elseif($terasse == "non") {
                $terasse = 0;
            }



          //  dd($risque);
            $var = [
                "categorie"         => "1",
                "civitlite"         => auth()->user()->sexe,
                "nom"               => auth()->user()->name,
                "prenom"            => auth()->user()->prenom,
                "date_naissance"     => Carbon::parse(auth()->user()->date_naissance)->format('d/m/Y'),
                "lieu_naissance"     => auth()->user()->adresse,
                "nationalite"       => "Algérienne",
                "activite"          => "1",
                "proffession"       => auth()->user()->profession,
                "assureAddresse"    => auth()->user()->adresse,
                "assureWilayaId"    => auth()->user()->wilaya,
                "assureVilleId"     => auth()->user()->commune,
                "region"          => auth()->user()->wilaya,
                "agence"          => $devis->code_agence,
                "class_id"           => "12",
                "branch_id"          => "1225",
                "date_souscription"  => Carbon::parse($devis->date_souscription)->format('d/m/Y') ,
                "date_effet"         => Carbon::parse($devis->date_effet)->format('d/m/Y'),
                "date_expiration"    => Carbon::parse($devis->date_expiration)->format('d/m/Y'),
                "periode"           => 1,
                "periodeType"       => 2,
                "wilayaId"          => $risque->code_wilaya,
                "villeId"           => $risque->code_commune,
                "address"           => $risque->adresse,
                "batimentType"      => "1",
                "batimentCategorie" => "1",
                "surface"           => $risque->superficie,
                "nombrePieces"      => "3",
                "etage"             => $risque->etage,
                "terasse"           => $terasse,
                "formule"           => "3",
                "capitaleAssure"    => $risque->montant_forfaitaire
            ];

       //     dd($var);
//dd($risque->code_commune);

              /*
            $var = [
              "categorie"           => "1",
              "civitlite"           => "10",
              "nom"                 => auth()->user()->name,
              "prenom"              => auth()->user()->prenom,
              "date_naissance"      => Carbon::parse(auth()->user()->date_naissance)->format('d/m/Y'),
              "lieu_naissance"      => auth()->user()->adresse,
              "nationalite"         => "Algérienne",
              "activite"            => "1",
              "proffession"         => "1",
              "addresse_assure"    => "Fort de l'eau",
              "wilaya_assure_id"    => "01",
              "ville_assure_id"     => "0101",
              "region"              => "16",
              "agence"              => "00000",
              "class_id"            => "12",
              "branch_id"           => "1225",
              "date_souscription"   => Carbon::parse($devis->date_souscription)->format('d/m/Y') ,
              "date_effet"          => Carbon::parse($devis->date_effet)->format('d/m/Y'),
              "date_expiration"     => Carbon::parse($devis->date_expiration)->format('d/m/Y'),
              "wilaya_id"           => $risque->code_wilaya,
              "ville_id"            =>  "0101",
              "address"             => "ADRAR",
              "type_batiment"       => $risque->type_habitation,
              "categorie_batiment"  => "1",
              "surface_batiment"    => $risque->superficie,
              "chambre_batiment"    => $risque->nombre_piece,
              "etage_batiment"      => $risque->etage,
              "terasse"             => $risque->terrasse,
              "capitale_assure"     => 500000
            ];


            $var =[

                "region"=> "16",
                "agence" => "00000",
                "class_id" => "11",
                "branch_id" => "1100",
                "date_effet" => "01/12/2020",
                "date_expiration" => "1/12/2021 ",
                "date_souscription" => "01/12/2020 11:00:55",
                "nom" => "hariti",
                "prenom" => "sarah",
                "date_naissance" => "01/12/2020 11:00:55"

            ];
*/
      //      dd($var);
            $var=json_encode($var);

            $client = new \GuzzleHttp\Client();
            //$url = "http://10.0.0.131:8443/api/polices/addPolice";
            $url = "http://10.0.0.131:8888/api/create_police/";

            $request = $client->post($url,[
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'auth' => ['djilali', 'API.create_police'],
            'body'    => $var
            ]);

            // $response = json_decode($request->getBody(), true);
            $response = json_decode($request->getBody(), true);

dd( $response);
            if($response['status']){

              $devis->update([
          			'type_devis'      => 2,
          			'reference_police' => $response['data']['Code de référence'],
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
              $risque = Rsq_Immobilier::where('code_devis', $id)->first();


              $formule = formule::where('abreviation', $risque->offre)->first();


                $var = [
                    "region"                => auth()->user()->wilaya,
                    "agence"                => $devis->code_agence,
                    "class_id"              => $formule->class_id,
                    "branch_id"             => $formule->branch_id,
                    "date_effet"            => Carbon::parse($devis->date_effet)->format('d/m/Y'),
                    "date_expiration"       => Carbon::parse($devis->date_expiration)->format('d/m/Y'),
                    "date_souscription"     => Carbon::parse($devis->date_souscription)->format('d/m/Y'),
                    "categorie"             => "1",
                    "civitlite"             => auth()->user()->sexe,
                    "nom"                   => auth()->user()->name,
                    "prenom"                => auth()->user()->prenom,
                    "date_naissance"        => Carbon::parse(auth()->user()->date_naissance)->format('d/m/Y'),
                    "lieu_naissance"        => "bejaia",
                    "nationalite"           => "algerienne",
                    "activite"              => auth()->user()->activite,
                    "proffession"           => auth()->user()->profession,
                    "addresse_assure"       => auth()->user()->adresse,
                    "pay_assure_id"         => "16",
                    "wilaya_assure_id"      => auth()->user()->wilaya,
                    "ville_assure_id"       => auth()->user()->commune,
                    "zone"                  => $risque->code_zone,
                    "formule_catnat"        => $risque->code_formule ,
                    "annee_construction"    => $risque->annee_construction ,
                    "proprietaire"          => 0 ,
                    "activite2"             => 1 ,
                    "equipement"            => $risque->valeur_equipement ,
                    "marchandise"           => $risque->valeur_marchandise ,
                    "contenant"             => $risque->valeur_contenant,
                    "regles_parasismiques"        => 0,
                    "insc_registre_commerce"      => 1 ,
                    "registre_commerce"           => 0 ,
                    "local_assure"                =>  1,
                    "regles_parasismiques"            =>  1,
                    "construction_vous_appartient"    => 0 ,
                    "permis_construire"               =>  1,


                ];

             //   dd($var);
/*
              $var = [
                    "nom"               => auth()->user()->name,
                    "prenom"            => auth()->user()->prenom,
                    "categorie"         => "1",
                    "civitlite"         => "1",
                    "dateNaissance"     => Carbon::parse(auth()->user()->date_naissance)->format('d/m/Y'),
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
                    "souscriptionDate"  => Carbon::parse($devis->date_souscription)->format('d/m/Y'),
                    "effetDate"         => Carbon::parse($devis->date_effet)->format('d/m/Y'),
                    "expirationDate"    => Carbon::parse($devis->date_expiration)->format('d/m/Y'),
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
*/
/*
                $var = [
                    "nom"               => auth()->user()->name,
                    "prenom"            => auth()->user()->prenom,
                    "categorie"         => "1",
                    "civitlite"         => "1",
                    "date_naissance"     => Carbon::parse(auth()->user()->date_naissance)->format('d/m/Y'),
                    "lieu_naissance"     => "Rahouia",
                    "nationalite"       => "Algérienne",
                    "activite"          => "1",
                    "proffession"       => "1",
                    "addresse_assure "    => "Fort de l'eau",
                    "pay_assure_id"     => "Algérie",
                    "wilaya_assure_id"    => "01",
                    "ville_assure_id"     => "0101",
                    "region"          => "16",
                    "agence"          => "00000",
                    "class_id"           => "12",
                    "branch_id"          => "1290",
                    "date_souscription"  => Carbon::parse($devis->date_souscription)->format('d/m/Y'),
                    "date_effet"         => Carbon::parse($devis->date_effet)->format('d/m/Y'),
                    "date_expiration"    => Carbon::parse($devis->date_expiration)->format('d/m/Y'),
                    "periode"           => 1,
                    "periodeType"       => 2,
                    "wilayaId"          => "01",
                    "villeId"           => "0101",
                    "address"           => "ADRAR",
                    "zone"              => "5",
                    "formule_catna"           => "3",
                    "batimentType"      => "1",
                    "batimentCategorie" => "1",
                    "surface"           => "0",
                    "nombrePieces"      => "3",
                    "etage"             => "0",
                    "annee_construction" => 2015,
                    "proprietaire"      => 1,
                    "activiteRisque"    => "1",
                    "capitaleAssure"    => 500000,
                    "valeurEquipement"  => 200000,
                    "valeurMarchandise" => 300000,
                    "valeurContenant"   => 500000,
                    "regPara"           => 1,
                    "inscRegisteCom"    => 1,
                    "registeCom"        => 1,
                    "equipement"        => 1 ,
                    "marchandise"       => 1 ,
                    "contenant"         => 1 ,
                    "regles_parasismiques" => 0,
                    "insc_registre_commerce" => 1 ,
                    "registre_commerce" => 0 ,
                    "local_assure" =>  1,
                    "regles_parasismiques" =>  1,
                    "construction_vous_appartient" => 0 ,
                    "permis_construire" =>  1,


                ];
*/



                //dd($var);

              $var=json_encode($var);

              $client = new \GuzzleHttp\Client();
                $url = "http://10.0.0.131:8888/api/create_police/";

              $request = $client->post($url,[
              'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
                  'auth' => ['djilali', 'API.create_police'],
              'body'    => $var
              ]);
              // $response = json_decode($request->getBody(), true);
              $response = json_decode($request->getBody(), true);
                dd( $response);
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

                  $auto         = Rsq_Vehicule::where('id',$id)->first();
                 // $code_devis  = $auto->code_devis;
                 // dd($id);
              //    $id          = $auto->id;

                  $devis       = devis::where('id',$id)->first();
                  $prime_total = $devis->prime_total;
                  $catnat      = '';
                  $mrh         = '';

                $devis = devis::find($id);
                $risque = Rsq_Vehicule::where('code_devis',$devis->id)->first();
                //dd($risque);

                $date_naissance = Carbon::parse(auth()->user()->date_naissance)->format('d/m/Y');
                $date_souscription = Carbon::parse($devis->date_souscription)->format('d/m/Y');
                $date_effet        = Carbon::parse($devis->date_effet)->format('d/m/Y');
                $date_expiration   = Carbon::parse($devis->date_expiration)->format('d/m/Y');
                $date_permis   = Carbon::parse($risque->date_permis)->format('d/m/Y');

                $matricule_lieu = Wilaya::where('nlib_wilaya', $risque->immatricule_a)->first();
                $permis_lieu = Wilaya::where('nlib_wilaya', $risque->wilaya_obtention)->first();

                $puissance = Puissance::where('libelle',$risque->puissance )->first();

                $cat_permis = Categorie_permis::where('libelle',$risque->categorie )->first();
              //  $assistance = Assistance::where('libelle',$risque->assistance)->first();

                  $formule = formule::where('libelle',$risque->offre )->first();
                //  dd($formule);

                $var = [
                        "nom"                     => auth()->user()->name,
                        "prenom"                  => auth()->user()->prenom,
                        "categorie"               => 1,
                        "civitlite"               => auth()->user()->sexe,
                        "date_naissance"          => $date_naissance,
                        "lieuNaissance"           => auth()->user()->wilaya,
                        "nationalite"             => "Algérienne",
                        "activite"                => auth()->user()->activite,
                        "proffession"             => auth()->user()->profession,
                        "assureAddresse"          => auth()->user()->adresse,
                        "assureWilayaId"          => auth()->user()->wilaya,
                        "assureVilleId"           => auth()->user()->commune,
                        "region"                  => auth()->user()->wilaya,
                        "agence"                  => $devis->code_agence,
                        "class_id"                => $formule->class_id,
                        "branch_id"               => $formule->branch_id,
                        "date_souscription"       => $date_souscription,
                        "date_effet"              => $date_effet,
                        "date_expiration"         => $date_expiration,
                        "periode"                 => 1,
                        "periodeType"             => 2,
                        "wilayaId"                => auth()->user()->wilaya,
                        "villeId"                 => auth()->user()->commune,
                        "matricule"               => $risque->matricule,
                        "constructionAnnee"       => $risque->annee_mise_circulation,
                        "chassisNo"               => $risque->num_chassis,
                        "chassisType"             => $risque->type,
                        "matriculeLieu"           => $matricule_lieu->code_wilaya,
                        "marque"                  => $risque->marque,
                        "model"                   => $risque->modele,
                        "genre"                   => $risque->genre,
                        "usage"                   => $risque->usage,
                        "puissance"               => $puissance->code,
                        "typeCarburant"           => "1",
                        "couleur"                 => "02",
                        "nbrPersonne"             => $risque->personne_transporte,
                        "cUtil"                   => 0,
                        "pTac"                    => 0,
                        "formule"                 => $formule->libelle,
                        "attestation"             => "null",
                        "capitaleAssure"          => $risque->valeur_vehicule,
                        "autoRadio"               => 0,
                        "chiffreAffaire"          => 0,
                        "tauxReduction"           => "0",
                        "assistance"              => $risque->assistance,
                        "alarme"                  => 0,
                        "turbo"                   => 0,
                        "hautGamme"               => 0,
                        "liquidInflamable"        => 0,
                        "controleTechnique"       => 0,
                        "conducteurCode"          => "null",
                        "conducteurNom"           => auth()->user()->name,
                        "conducteurDateNaissance" => $date_naissance,
                        "permisNo"                => $risque->permis_num,
                        "permisCategorie"         => $cat_permis->code,
                        "permisDate"              => $date_permis,
                        "permisLieu"              => $permis_lieu->code_wilaya

                ];

              //  dd($var);

                $var=json_encode($var);

                $client = new \GuzzleHttp\Client();
               // $url = "http://10.0.0.131:8443/api/polices/addPolice";
                $url = "http://10.0.0.131:8888/api/create_police/";


                  $request = $client->post($url,[
                      'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
                      'auth' => ['djilali', 'API.create_police'],
                      'body'    => $var
                  ]);

                $response = json_decode($request->getBody(), true);
               //   dd($response);

                  $assure = Assure::where('id_devis', $id)->first();
                  //dd($assure);
                if($response['status']){

                  $devis->update([
              			'type_devis'      => 2,
              			'reference_police' => $response['data']["Code de référence"],
              		]);

                    $assure->update([
                        'code_assure' => $response['data']["Code assure"],
                    ]);
              		$dev=$devis;



                    return view('paiement',compact('mrh','auto','catnat','prime_total','id','devis'));

                }else{
                    dd($response);
                }


               // return redirect()->route('home');

              }

}
