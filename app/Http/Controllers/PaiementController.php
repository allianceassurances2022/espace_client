<?php

namespace App\Http\Controllers;

use App\Assure;
use App\Categorie_permis;
use App\formule;
use Carbon\Carbon;


use App\wilaya;
use App\Agences;

use App\Rsq_Immobilier;
use App\Rsq_Vehicule;
use App\devis;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Uuid;

class PaiementController extends Controller
{
    public function paiement_mrh($id)
    {
        $mrh         = Rsq_Immobilier::where('code_devis', $id)->first();
        $code_devis  = $mrh->code_devis;
        $id          = $mrh->id;
        $devis       = devis::where('id', $code_devis)->first();
        $prime_total = $devis->prime_total;
        $catnat      = '';
        $auto        = '';
		
		

        return view('paiement', compact('mrh', 'auto', 'catnat', 'prime_total', 'id', 'devis'));
    }

    public function save_mrh($id)
    {
        $devis  = devis::find($id);
        $risque = Rsq_Immobilier::where('code_devis', $id)->first();
        $assure = Assure::where('id_devis', $devis->id)->first();
        $agence = Agences::find($devis->code_agence);
        $terasse = $risque->terrasse;
        $type_habitation = $risque->type_habitation;
        $qualite_juridique = $risque->qualite_juridique;

        if ($terasse == "oui") {
            $terasse = 1;
        } elseif ($terasse == "non") {
            $terasse = 0;
        }

        if ($type_habitation == "individuelle") {
            $type_habitation = 1;
        } elseif ($type_habitation == "collective") {
            $type_habitation = 2;
        }

        if ($qualite_juridique == "proprietaire") {
            $qualite_juridique = 1;
        } elseif ($qualite_juridique == "locataire") {
            $qualite_juridique = 2;
        }



        $var = [
            "region"             => $agence->dr,
            "agence"             => $agence->id,
            "class_id"           => "12",
            "branch_id"          => "1225",
            "date_souscription"  => Carbon::parse($devis->date_souscription)->format('d/m/Y'),
            "date_effet"         => Carbon::parse($devis->date_effet)->format('d/m/Y'),
            "date_expiration"    => Carbon::parse($devis->date_expiration)->format('d/m/Y'),

            "categorie"          => "1",
            "civitlite"          => $assure->sexe,
            "nom"                => $assure->nom,
            "prenom"             => $assure->prenom,
            "date_naissance"     => Carbon::parse($assure->date_naissance)->format('d/m/Y'),
            "lieu_naissance"     => $assure->lieu_naissance,
            "nationalite"        => "Algérienne",
            "activite"           => $assure->code_activite,
            "proffession"        => $assure->profession,
            "addresse_assure"    => $assure->adresse,
            "pay_assure_id"      => "1",
            "wilaya_assure_id"   => $assure->code_wilaya,
            "ville_assure_id"    => $assure->code_commune,

            "wilaya_id"          => $risque->code_wilaya,
            "ville_id"           => $risque->code_commune,
            "adresse"            => $risque->adresse,
            "type_batiment"      => $type_habitation,
            "categorie_batiment" => $qualite_juridique,
            "surface_batiment"   => $risque->superficie,
            "chambre_batiment"   => $risque->nombre_piece,
            "etage_batiment"     => $risque->etage,
            "formule"            => "3",
            "capitale_assure"    => $risque->montant_forfaitaire,
            "terrasse"           => $terasse,
        ];

        //return view('satim/redirect', compact('devis'));
        return redirect()->route('enregistrement_satim', compact('devis'));
    }

    public function paiement_catnat($id)
    {
        $catnat      = Rsq_Immobilier::where('code_devis', $id)->first();
        $code_devis  = $catnat->code_devis;
        $id          = $catnat->id;
        $devis       = devis::where('id', $code_devis)->first();
        $prime_total = $devis->prime_total;
        $mrh         = '';
        $auto        = '';

        return view('paiement', compact('mrh', 'auto', 'catnat', 'prime_total', 'id', 'devis'));
    }

    public function save_catnat($id)
    {
        $catnat      = Rsq_Immobilier::where('id', $id)->first();

        $mrh         = '';
        $auto        = '';

        $devis  = devis::find($id);
        $prime_total = $devis->prime_total;
        $risque = Rsq_Immobilier::where('code_devis', $id)->first();
        $assure = Assure::where('id_devis', $devis->id)->first();
        $agence = Agences::find($devis->code_agence);

        $formule = formule::where('abreviation', $risque->offre)->first();

        $appartient = $risque->appartient;
        $reg_para = $risque->reg_para;
        $local_assure = $risque->local_assure;
        $registre_com = $risque->registe_com;
        $insc_registe_com = $risque->insc_registe_com;
        $permis = $risque->permis;
        $proprietaire = $risque->proprietaire;


        if ($appartient == "oui") {
            $appartient = 1;
        } else {
            $appartient = 0;
        }

        if ($reg_para == "oui") {
            $reg_para = 1;
        } elseif ($reg_para == "non") {
            $reg_para = 0;
        } elseif ($reg_para == "ne sais pas") {
            $reg_para = 2;
        } else {
            $reg_para = 0;
        }

        if ($local_assure == "oui") {
            $local_assure = 1;
        } elseif ($local_assure == "non") {
            $local_assure = 0;
        } elseif ($local_assure == "ne sais pas") {
            $local_assure = 2;
        } else {
            $local_assure = 0;
        }

        if ($registre_com == "oui") {
            $registre_com = 1;
        } else {
            $registre_com = 0;
        }

        if ($insc_registe_com == "oui") {
            $insc_registe_com = 1;
        } else {
            $insc_registe_com = 0;
        }

        if ($permis == "oui") {
            $permis = 1;
        } else {
            $permis = 0;
        }

        if ($proprietaire == "oui") {
            $proprietaire = 1;
        } else {
            $proprietaire = 0;
        }

        if ($risque->code_formule == 1) {
            $capitale_assure = $risque->valeur_assure;
        } else {
            $capitale_assure = $risque->valeur_contenu + $risque->valeur_contenant;
        }

        $var = [
            "region"                        => $agence->dr,
            "agence"                        => $agence->id,
            "class_id"                      => "12",
            "branch_id"                     => "1290",
            "date_souscription"             => Carbon::parse($devis->date_souscription)->format('d/m/Y'),
            "date_effet"                    => Carbon::parse($devis->date_effet)->format('d/m/Y'),
            "date_expiration"               => Carbon::parse($devis->date_expiration)->format('d/m/Y'),

            "categorie"                     => "1",
            "civitlite"                     => $assure->sexe,
            "nom"                           => $assure->nom,
            "prenom"                        => $assure->prenom,
            "date_naissance"                => Carbon::parse($assure->date_naissance)->format('d/m/Y'),
            "lieu_naissance"                => $assure->lieu_naissance,
            "nationalite"                   => "Algérienne",
            "activite"                      => $assure->code_activite,
            "proffession"                   => $assure->profession,
            "addresse_assure"               => $assure->adresse,
            "pay_assure_id"                 => "",
            "wilaya_assure_id"              => $assure->code_wilaya,
            "ville_assure_id"               => $assure->code_commune,

            "wilaya_id"                     => $risque->code_wilaya,
            "ville_id"                      => $risque->code_commune,
            "adresse"                       => $risque->adresse,
            "type_batiment"                 => $risque->code_type_habitation,
            "surface_batiment"              => $risque->superficie,
            "chambre_batiment"              => $risque->nombre_piece,
            "etage_batiment"                => $risque->etage,
            "zone"                          => $risque->code_zone,
            "formule_catnat"                => $risque->code_formule,
            "capitale_assure"               => $capitale_assure,
            "annee_construction"            => $risque->annee_construction,
            "equipement"                    => $risque->valeur_equipement,
            "marchandise"                   => $risque->valeur_marchandise,
            "contenant"                     => $risque->valeur_contenant,
            "activite2"                     => $risque->code_activite,
            "proprietaire"                  => $proprietaire,
            "regles_parasismiques"          => $reg_para,
            "insc_registre_commerce"        => $insc_registe_com,
            "registre_commerce"             => $registre_com,
            "local_assure"                  => $local_assure,
            "construction_vous_appartient"  => $appartient,
            "permis_construire"             => $permis,

        ];

        $assure = Assure::where('id_devis', $id)->first();

        //return view('satim/redirect', compact('devis'));
        return redirect()->route('enregistrement_satim', compact('devis'));
    }

    public function paiement_auto($id)
    {
        $auto         = Rsq_Vehicule::where('code_devis', $id)->first();
        $code_devis  = $auto->code_devis;
        $id          = $auto->id;
        $devis       = devis::where('id', $code_devis)->first();
        $prime_total = $devis->prime_total;
        $catnat      = '';
        $mrh         = '';

        return view('paiement', compact('mrh', 'auto', 'catnat', 'prime_total', 'id', 'devis'));
    }

    public function save_auto($id)
    {
        $auto        = Rsq_Vehicule::where('id', $id)->first();
        $devis       = devis::where('id', $id)->first();
        $prime_total = $devis->prime_total;
        $catnat      = '';
        $mrh         = '';

        $devis             = devis::find($id);
        $risque            = Rsq_Vehicule::where('code_devis', $devis->id)->first();
        $assure            = Assure::where('id_devis', $devis->id)->first();

        $agence            = Agences::find($devis->code_agence);
        $prime_total       = $devis->prime_total;

        $date_souscription = Carbon::parse($devis->date_souscription)->format('d/m/Y');
        $date_effet        = Carbon::parse($devis->date_effet)->format('d/m/Y');
        $date_expiration   = Carbon::parse($devis->date_expiration)->format('d/m/Y');

        $date_permis       = Carbon::parse($risque->date_permis)->format('d/m/Y');
        $matricule_lieu    = wilaya::where('nlib_wilaya', $risque->immatricule_a)->first()->code_wilaya;
        $permis_lieu       = wilaya::where('nlib_wilaya', $risque->wilaya_obtention)->first()->code_wilaya;

        $cat_permis        = Categorie_permis::where('libelle', $risque->categorie)->first()->code;

        $offre             = formule::where('libelle', $risque->offre)->first();
        // dd($risque->offre);
        $formule           = $risque->code_formule;

        //Detail formule
        switch ($formule) {
            case ($formule == 'Tous Risques'):
                $formule = '1';
                break;
            case ($formule == 'D.C Valeur Vénale'):
                $formule = '2';
                break;
        }


        $var = [
            "region"                  => $agence->dr,
            "agence"                  => $agence->id,
            "class_id"                => $offre->class_id,
            "branch_id"               => $offre->branch_id,
            "date_souscription"       => $date_souscription,
            "date_effet"              => $date_effet,
            "date_expiration"         => $date_expiration,

            "categorie"               => "1",
            "civitlite"               => $assure->sexe,
            "nom"                     => $assure->nom,
            "prenom"                  => $assure->prenom,
            "date_naissance"          => Carbon::parse($assure->date_naissance)->format('d/m/Y'),
            "lieu_naissance"          => $assure->lieu_naissance,
            "nationalite"             => "Algérienne",
            "activite"                => $assure->code_activite,
            "proffession"             => $assure->profession,
            "addresse_assure"         => $assure->adresse,
            "pay_assure_id"           => "",
            "wilaya_assure_id"        => $assure->code_wilaya,
            "ville_assure_id"         => $assure->code_commune,

            "matricule"               => $risque->matricule,
            "annee_construction2"     => $risque->annee_mise_circulation,
            "num_chassis"             => $risque->num_chassis,
            "type_chassis"            => $risque->type,
            "lieu_matricule"          => $matricule_lieu,
            "marque"                  => $risque->marque,
            "modele"                  => $risque->modele,
            "genre"                   => "00",
            "usage"                   => $risque->usage,
            "puissance"               => $risque->puissance,
            "energie"                 => "1",
            "couleur"                 => $risque->couleur,
            "nbr_personne"            => $risque->personne_transporte,
            "cutil"                   => 0,
            "ptac"                    => 0,
            "formule_auto"            => $formule,
            "attestation"             => "",
            "capitale_assure"         => $risque->valeur_vehicule,
            "auto_radio"              => 0,
            "chiffre_affaire"         => 0,
            "taux_reduction"          => "0",
            "assistance"              => $risque->assistance,
            "alarme"                  => 0,
            "turbo"                   => 0,
            "haut_gamme"              => 0,
            "liquid_inflamable"       => 0,
            "controle_technique"      => 0,
            "code_conducteur"         => "",
            "nom_conducteur"          => "rachid",
            "prenom_conducteur"       => "rachid",
            "date_nais_conducteur"    => $risque->date_conducteur,
            "num_permis"              => $risque->permis_num,
            "categorie_permis"        => $cat_permis,
            "date_permis"             => $date_permis,
            "lieu_permis"             => $permis_lieu
        ];


        $assure = Assure::where('id_devis', $id)->first();

        return redirect()->route('enregistrement_satim', compact('devis'));
        //return view('satim/redirect', compact('devis'));


    }


    public function satim_confirmation($id)
    {

        $devis = devis::where('id', $id)->first();

        if ($devis->type_assurance == "Automobile") {
            $risque = Rsq_Vehicule::where('code_devis', $devis->id)->first();
        } else if ($devis->type_assurance == "Multirisques Habitation" || $devis->type_assurance == "Catastrophe Naturelle") {
            $risque = Rsq_Immobilier::where('code_devis', $devis->id)->first();
        }

        $offre  = formule::where('libelle', $risque->offre)->first();


        $num = $devis->code_agence;

        $user = auth::user();
        $value_cat = session('data_catnat');
        $value_mrh = session('data_mrh');
        $value_auto = session('data_auto');
        $cat = '';
        $auto = '';
        $mrh = '';
        $total = 0;

        if ($value_cat) {
            $nom = 'Catastrophe Naturelle';
            $montant = $value_cat['prime_total'];
            $total = $total + $montant;
            // $datec = $value_cat['datec'];

            $cat = [
                'nom' => $nom,
                // 'datec' => $datec,
                'montant' => $montant
            ];
        }

        if ($value_mrh) {

            $nom = 'Multirisques Habitation';
            $montant = $value_mrh['prime_total'];
            $total = $total + $montant;
            //$datec = $value_mrh['datec'];

            $mrh = [
                'nom' => $nom,
                // 'datec' => $datec,
                'montant' => $montant
            ];
        }

        if ($value_auto) {

            $nom = 'Automobile';
            $montant = $value_auto['prime_total'];
            $total = $total + $montant;
            $datec = $value_auto['datec'];

            $auto = [
                'nom' => $nom,
                'datec' => $datec,
                'montant' => $montant
            ];
        }

        $sum_devis = devis::where('id_user', $user->id)
            ->where('type_devis', "1")
            ->count();

        $sum_contr = devis::where('id_user', $user->id)
            ->where('type_devis', "2")
            ->count();

        $sum_contr_branche = devis::where('type_devis', "2")
            ->where('code_agence', $devis->code_agence)
            ->where('type_assurance', $devis->type_assurance)
            ->count();


        $year = substr(date('Y'), 2, 2);

        $branch = $offre->branch_id;

        $count = $sum_contr_branche + 1;

        $formatted_count = substr(str_repeat(0, 4) . $count, -4);



        $devis->update([
            'type_devis'      => 2,
            'reference_police' =>  $num . ' ' . $year . ' ' . $branch . ' ' . $formatted_count,
        ]);


       // return view('home', compact('user', 'mrh', 'auto', 'cat', 'total',  'sum_contr', 'sum_devis'));
    }

    public function paiement_success(Request $request)
    {
		$orderId = $request->orderId;
		$order = Order::where('orderId', $orderId)->first();

		$url = 'https://test.satim.dz/payment/rest/confirmOrder.do?language=fr&orderId='.$orderId.'&password=satim120&userName=SAT2108150225';
		$response = Http::contentType("application/json")->send('GET', $url)->json();
		
		$message = $response['params']['respCode_desc'];
		$order->update([
            'ErrorCode'      => $response['params']['respCode'],
            'respCode_desc' =>  $response['params']['respCode_desc'],
        ]);

        $this->satim_confirmation($order->devis_id);
		
		$devis = devis::where('id', $order->devis_id)->first();
		
		$respCode_desc = $response['params']['respCode_desc'];
		$orderNumber= $response['OrderNumber'];
		$approvalCode= $response['approvalCode'];
		$date = date('Y-m-d H:i:s');
		$montant = $response['Amount'];
		$mode = "CIB";
		
	//	dd($devis);
		return view('satim/success',compact('message','devis','respCode_desc','orderNumber','orderId','approvalCode','date','montant','mode'));
    }

    public function paiement_failed(Request $request)
    {
		$orderId = $request->orderId;
		$order = Order::where('orderId', $orderId)->first();
		$message = "";
		$url = 'https://test.satim.dz/payment/rest/confirmOrder.do?language=fr&orderId='.$orderId.'&password=satim120&userName=SAT2108150225';
		$response = Http::contentType("application/json")->send('GET', $url)->json();

		if($response['OrderStatus'] == "3")
		{
			$message = "Votre transaction a été rejetée/ Your transaction was rejected/ تم رفض معاملتك";
		}else { 
			if(!empty($response['params'])){
			$message = $response['params']['respCode_desc'];
			$order->update([
            'ErrorCode'      => $response['params']['respCode'],
            'respCode_desc' =>  $response['params']['respCode_desc'],
        ]);
		
		}else{
			$message = $response['actionCodeDescription'];
			$order->update([
            'ErrorCode'      => $response['ErrorCode'],
            'respCode_desc' =>  $response['actionCodeDescription'],
        ]);

		}
		}
		
		return view('satim/failed',compact('message'));
    }

    public function enregistrement_satim(Request $request)
    {
        $devis_id = $request->devis;
		
        $devis = devis::where('id', $devis_id)->first();

        $myuuid = Uuid::uuid4();
        $order = $myuuid->toString();
        $arr2 = explode("-", $order);
        $orderNumber = $arr2[0];
        //$montant = str_replace(".", "", $devis->prime_total);
		if (str_contains($devis->prime_total, '.')) {
		$montants = explode(".", $devis->prime_total);
		if(strlen($montants[1]) == 1){
			$montant = str_replace(".", "", $devis->prime_total);
			$montant = $montant . '0';
		}else{
			$montant = str_replace(".", "", $devis->prime_total);
		}
		}else{
			$montant = $devis->prime_total.'00';
		}

        $url = 'https://test.satim.dz/payment/rest/register.do?currency=012&amount=' . $montant . '&language=fr&orderNumber=' . $orderNumber . '&userName=SAT2108150225&password=satim120&returnUrl=https://epaiement.allianceassurances.com.dz/public/paiement_success&failUrl=https://epaiement.allianceassurances.com.dz/public/paiement_failed&jsonParams={"force_terminal_id":"E010900222","udf1":"' . $devis_id . '"}';
        $response = Http::contentType("application/json")->send('GET', $url)->json();

        //  $tab = json_decode($response, JSON_OBJECT_AS_ARRAY);

        $redirect = $response['formUrl'];
        $orderId = $response['orderId'];

        $resultat = Order::create([
            'devis_id' => $devis_id,
            'montant'  => $montant,
            'orderNumber'  => $orderNumber,
            'orderId'  => $response['orderId'], ]);

        //dd($resultat);
        return Redirect::to($redirect);

    }


     public function confirmation_paiement($id)
    { //dd($id);
        return view('satim/confirmation_order', ['id' => $id]);
    }
	
	 public function getEmailAgence($code_agence)
    {
        $agence = Agences::where('Name', $code_agence )->get()->toArray();
        if ($agence != null) {
            // $email=$agence[0]['Mail'];
            $email = 'delmedjadji@allianceassurances.com.dz';
            if (($email != null) && ($email != ''))
                $this->envoiMail($email);
        }
    }

    public function getEmailUser($id_user)
    {
        $user = User::where('id', $id_user )->get()->toArray();
        if ($user != null) {
             //$email=$user[0]['email'];
            $email = 'nbelkacemi@allianceassurances.com.dz';
            if (($email != null) && ($email != ''))
                $this->envoiMail($email);
        }
    }


    public function envoiMail($email)
    {
        if (($email !== '') && ($email !== null)) {

            $destinataire = $email;
            // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            $objet = 'Opération de paiement'; // Objet du message
            $message = 'Un paiement est effectué.  \n' ;
            $headers = 'From: Alliance' . "\r\n" .
                'Reply-To: webmaster@allianceassurances.com.dz' . "\r\n" .
                'X-Mailer: PHP/';

            $success = mail($destinataire, $objet, $message, $headers);

            if (!$success) {
                $errorMessage = error_get_last();
                echo $errorMessage;
                // echo "Votre message n'a pas pu être envoyé";



            }
        }
    }
}
