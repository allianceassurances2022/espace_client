<?php

namespace App\Http\Controllers;

use App\Couleur;
use App\dure;
use App\Puissance;
use App\UsageAuto;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\wilaya;
use App\commune;
use App\Categorie_permis;

use App\Rsq_Vehicule;
use App\devis;
use App\Agences;
use App\Prime;
use App\marque;

use App\Assure;
use App\Profession;
use App\Civilite;
use App\Assistance;

use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Http;

class TarificationAutoController extends Controller
{

	public function choix_auto(Request $request)
	{

		$auto = $request->all();

		if ($request->valeur_auto < 800000) {
			Alert::warning('Avertissement', 'la valeur du véhicule ne doit pas etre inferieure a 800 000 DA');
			return redirect()->route('type_produit', ['auto', 'index']);
		}

		$data_session = $auto;

		$request->session()->put('data_auto', $data_session);

		$auto = array_merge($auto, ["dure" => "1", "formule" => "1", "assistance" => "Liberté", "usage" => "0", "taxe" => "non"]);

		$devis = 0;

		$dure = dure::all();

		if ($request->type_assurance == "AUTO_P") {
			return view('produits.auto.formule_part', compact('auto', 'devis', 'dure'));
		} elseif ($request->type_assurance == "OTO_L") {
			return view('produits.auto.formule_laki', compact('auto', 'devis'));
		}
	}

	public function precedent(Request $request)
	{

		$auto = $request->all();
		$auto  = session('data_auto');

		$wilaya = Wilaya::all();
		$puissances = puissance::all();

		return view('produits.auto.index', compact('wilaya', 'auto', 'puissances'));
	}

	public function montant_auto(Request $request)
	{

		$auto = $request->all();
		$tab_json = array();

		$tab_json['usage'] = $request->usage;
		$tab_json['puissance'] = $request->puissance;
		$tab_json['valeur_auto'] = $request->valeur_auto;
		$tab_json['date_conducteur'] = $request->date_conducteur;
		$tab_json['date_permis'] = $request->date_permis;
		$tab_json['annee_auto'] = $request->annee_auto;
		$tab_json['type_assurance'] = $request->type_assurance;
		$tab_json['dure'] = $request->dure;
		$tab_json['taxe'] = $request->taxe;
		$tab_json['date_taxe'] = $request->date_taxe;
		$tab_json['formule'] = $request->formule;
		$tab_json['assistance'] = $request->assistance;
		$tab_json['Wilaya_selected'] = $request->Wilaya_selected;


		$data = json_encode($tab_json);
//dd($data);
		$url = "https://epaiement.allianceassurances.com.dz/public/api/calculeauto";
		$response = Http::contentType("application/json")->send('POST', $url, ['body' => $data])->json();

		//dd($response);

		$date_permis = $response['date_permis'];
		$wilaya = $response['Wilaya'];
		$annee_auto = $response['annee_auto'];
		$puissance = $response['puissance'];
		$usage = $response['usage'];
		$dure = $response['dure'];
		$formule = $response['formule'];
		$assistance = $response['assistance_nom'];
		$devis = $response['devis'];
		$daten = $response['daten'];
		$taxe = $response['taxe'];
		$date_taxe = $response['date_taxe'];
		$wilaya_selected = $response['Wilaya_selected'];
		$offre = $response['type_assurance'];
		$valeur = $response['valeur_auto'];
		$prime_nette = $response['prime_nette'];
		$CP = $response['cout_police'];
		$TD = $response['timbre_dimension'];
		$TVA = $response['tva'];
		$TG = $response['timbre_gradue'];
		$FGA = $response['fga'];
		$TP = $response['taxe_pollution'];
		$BDG = $response['bris_de_glace'];
		$VOL = $response['vol'];
		$DASC = $response['dasc'];
		$DCVV = $response['dcvv'];
		$RC = $response['rc'];
		$DR = $response['defense_recours'];
		$Ass = $response['assistance'];

		$datec = date('d/m/y');


		$data_session = [
			'date_conducteur'  => $daten,
			'date_permis'      => $date_permis,
			'Wilaya'           => $wilaya,
			'annee_auto'       => $annee_auto,
			'puissance'        => $puissance,
			'usage'            => $usage,
			'valeur'           => $valeur,
			'offre'            => $offre,
			'dure'             => $dure,
			'formule'          => $formule,
			'assistance_nom'   => $assistance,
			'prime_total'      => $devis,
			'datec'            => $datec,
			'taxe'             => $taxe,
			'date_taxe'        => $date_taxe,
			'Wilaya_selected'  => $wilaya_selected,
			'type_assurance'   => $offre,
			'valeur_auto'      => $valeur,
			'prime_nette'      => $prime_nette,
			'cout_police'      => $CP,
			'timbre_dimension' => $TD,
			'tva'              => $TVA,
			'timbre_gradue'    => $TG,
			'fga'              => $FGA,
			'taxe_pollution'   => $TP,
			'bris_de_glace'    => $BDG,
			'vol'              => $VOL,
			'dasc'             => $DASC,
			'dcvv'             => $DCVV,
			'rc'               => $RC,
			'defense_recours'  => $DR,
			'assistance'       => $Ass,
		];


		$request->session()->put('data_auto', $data_session);

		if ($offre == "OTO_L") {
			return view('produits.auto.formule_laki', compact('auto', 'devis'));
		} else if ($offre == "AUTO_P") {
			return view('produits.auto.formule_part', compact('auto', 'devis'));
		}
	}

	public function validation_devis_auto(Request $request)
	{

		$date = $request->date_eff;

		$request->session()->put('date_eff', $request->date_eff);
		$request->session()->put('date_exp', $request->date_exp);
		$request->session()->put('matricule', $request->matricule);
		$request->session()->put('num_chassis', $request->num_chassis);
		$request->session()->put('type', $request->type);
		$request->session()->put('marque', $request->marque);
		$request->session()->put('model', $request->model);
		$request->session()->put('couleur', $request->couleur);
		$request->session()->put('permis_num', $request->permis_num);
		$request->session()->put('cat_permi', $request->cat_permi);
		$request->session()->put('wilaya_obtention', $request->wilaya_obtention);
		$request->session()->put('categorie', $request->categorie);


		$taxe = "";
		$date_effet_taxe = null;
		if ($request->taxe == "non") {
			$taxe = 0;
		} else {
			$taxe = 1;
			$date_effet_taxe = $request->effet_taxe;
		}

		if ($request->date_eff < date('Y-m-d')) {
			Alert::warning('Avertissement', 'Merci de verifier la date d effet');
			//  return back();
			return redirect()->route('type_produit', ['auto', 'index']);
		}

		$pattern = "/[0-9]{5} - [0-9]{3} - [0-9]{2}/";
		if ($request->matricule == "" || !preg_match($pattern, $request->matricule)) {
			Alert::warning('Avertissement', 'Merci de verifier le matricule ');
			//  return back();
			return redirect()->route('type_produit', ['auto', 'index']);
		}

		if ($request->num_chassis == "" || strlen($request->num_chassis) > 17 || strlen($request->num_chassis) < 1) {
			Alert::warning('Avertissement', 'Merci de verifier le N° chassis ');
			//  return back();
			return redirect()->route('type_produit', ['auto', 'index']);
		}

		if ($request->type == "" || strlen($request->type) > 20 || strlen($request->type) < 0) {
			Alert::warning('Avertissement', 'Merci de verifier le type ');
			//  return back();
			return redirect()->route('type_produit', ['auto', 'index']);
		}

		if ($request->couleur == "" || strlen($request->couleur) > 20 || strlen($request->couleur) < 0) {
			Alert::warning('Avertissement', 'Merci de verifier la couleur ');
			//  return back();
			return redirect()->route('type_produit', ['auto', 'index']);
		}

		if ($request->permis_num == "" || strlen($request->permis_num) > 16 || strlen($request->permis_num) < 1) {
			Alert::warning('Avertissement', 'Merci de verifier la couleur ');
			//  return back();
			return redirect()->route('type_produit', ['auto', 'index']);
		}

		if ($request->code_agence == "" || strlen($request->code_agence) > 5 || strlen($request->code_agence) < 0) {
			Alert::warning('Avertissement', 'Merci de verifier le code agence ');
			//  return back();
			return redirect()->route('type_produit', ['auto', 'index']);
		}



		$value_auto  = session('data_auto');

		$date_sous = $request->date_sous;
		$date_eff  = $request->date_eff;
		$date_exp  = $request->date_exp;
		$prime_total = $request->prime_total;

		if ($request->id) {

			$risque = Rsq_Vehicule::find($request->id);
			$risque->update([
				'matricule'              => $request->matricule,
				'marque'                 => $request->marque,
				'modele'                 => $request->model,
				'num_chassis'            => $request->num_chassis,
				'type'                   => $request->type,
				'couleur'                => $request->couleur,
				'permis_num'             => $request->permis_num,
				'wilaya_obtention'       => $request->wilaya_obtention,
				'immatricule_a'          => $request->wilaya,
				'categorie'              => $request->categorie
			]);



			$devis = devis::find($risque->code_devis);
			$devis->update([
				'date_effet'      => $date_eff,
				'date_expiration' => $date_exp,
				'code_agence'     => $request->code_agence
			]);
		} else {

			$dev = devis::create([
				'date_souscription' => $date_sous,
				'date_effet'        => $date_eff,
				'date_expiration'   => $date_exp,
				'prime_total'       => $request->prime_total,
				'code_agence'       => $request->code_agence,
				'prime_nette'       => $value_auto['prime_nette'],
				'tva'               => $value_auto['tva'],
				'cp'                => $value_auto['cout_police'],
				'td'                => $value_auto['timbre_dimension'],
				'fga'               => $value_auto['timbre_gradue'],
				'tg'                => $value_auto['fga'],
				'tp'                => $value_auto['taxe_pollution'],
				'id_user'           => Auth()->user()->id,
				'type_assurance'    => 'Automobile'
			]);

			Prime::create([
				'code'              => '030120',
				'libelle'           => 'Bris de Glace',
				'valeur'            => $value_auto['bris_de_glace'],
				'id_devis'          => $dev->id
			]);
			Prime::create([
				'code'              => '030131',
				'libelle'           => 'Vol & Incendie',
				'valeur'            => $value_auto['vol'],
				'id_devis'          => $dev->id
			]);
			Prime::create([
				'code'              => '030141',
				'libelle'           => 'DASC',
				'valeur'            => $value_auto['dasc'],
				'id_devis'          => $dev->id
			]);
			Prime::create([
				'code'              => '100110',
				'libelle'           => 'Responsabilité Civile',
				'valeur'            => $value_auto['rc'],
				'id_devis'          => $dev->id
			]);
			Prime::create([
				'code'              => '170110',
				'libelle'           => 'Défense et Recours',
				'valeur'            => $value_auto['defense_recours'],
				'id_devis'          => $dev->id
			]);
			Prime::create([
				'code'              => '180214',
				'libelle'           => 'Assistance',
				'valeur'            => $value_auto['assistance'],
				'id_devis'          => $dev->id
			]);

			//creation devis sur IRIS

			



			$usage = UsageAuto::where('libelle', $request->usage)->first();


			$res = Rsq_Vehicule::create([
				'matricule'              => $request->matricule,
				'marque'                 => $request->marque,
				'modele'                 => $request->model,
				'annee_mise_circulation' => $request->annee_auto,
				'date_conducteur'        => $request->date_conducteur,
				'date_permis'            => $request->date_permis,
				'wilaya_obtention'       => $request->wilaya_obtention,
				'immatricule_a'          => $request->wilaya,
				'puissance'              => $request->puissance,
				'usage'                  => $usage->code,
				'dure'                   => $request->dure,
				'code_formule'           => $request->formule,
				'assistance'             => $request->assistance,
				'offre'                  => $request->offre,
				'valeur_vehicule'        => $request->valeur,
				'num_chassis'            => $request->num_chassis,
				'type'                   => $request->type,
				'couleur'                => $request->couleur,
				'permis_num'             => $request->permis_num,
				'categorie'              => $request->categorie,
				'personne_transporte'    => 0,
				'genre'                  => 00,
				'taxe'                   => $taxe,
				'effet_taxe'             => $date_effet_taxe,
				'code_devis'             => $dev->id

			]);


			$user = auth::user();
			$code_wilaya =  wilaya::where('nlib_wilaya', $request->wilaya)->first()->code_wilaya;
			//dd($code_wilaya);

			$assure = Assure::create([
				'nom'                => $request->name,
				'prenom'             => $request->prenom,
				'code_wilaya'        => $code_wilaya,
				'code_commune'       => $user->commune,
				'date_naissance'     => $request->date_naissance,
				'lieu_naissance'     => $user->lieu_naissance,
				'adresse'            => $user->adresse,
				'sexe'               => $user->sexe,
				'telephone'          => $request->telephone,
				'code_activite'      => $user->activite,
				'profession'         => $user->profession,
				'id_devis'           => $dev->id
			]);

			$devis = devis::find($dev->id);
			$risque = Rsq_Vehicule::find($res->id);
		}

		$prime = Prime::where('id_devis', $devis->id)->get();

		$user = auth::user();

		$agence = Agences::where('Name', $devis->code_agence)->first();

		$assure = Assure::where('id_devis', $devis->id)->first();



		return view('produits.Auto.resultat', compact('user', 'devis', 'risque', 'prime_total', 'agence', 'prime', 'assure'));
	}

	public function modification_devis_auto(Request $request, $id)
	{

		$user = auth::user();

		$profession = Profession::where('code', $user->profession)->first();
		$civilite   = Civilite::where('code', $user->sexe)->first();

		$devis = devis::find($id);

		if ($devis->id_user == $user->id) {

			$devis = devis::find($id);

			$risque = Rsq_Vehicule::where('code_devis', $devis->id)->first();

			$id = $risque->id;

			$puissance = puissance::where('code', $risque->puissance)->first();


			$date_souscription = $devis->date_souscription;
			$date_effet          = $devis->date_effet;
			$date_exp          = $devis->date_expiration;

			// personne_transporte

			$date_conducteur   = $risque->date_conducteur;
			$date_permis       = $risque->date_permis;
			$wilaya_selected   = $risque->wilaya_obtention;
			$annee_auto        = $risque->annee_mise_circulation;
			$usage             = $risque->usage;
			$dure              = $risque->dure;
			$formule           = $risque->code_formule;
			$assistance_nom    = $risque->assistance;
			$taxe              = $risque->taxe;
			$date_taxe         = $risque->effet_taxe;
			$offre             = $risque->offre;
			$valeur            = $risque->valeur_vehicule;
			$matricule         = $risque->matricule;
			$marque_selected   = $risque->marque;
			$model             = $risque->modele;
			$num_chassis       = $risque->num_chassis;
			$type              = $risque->type;
			$couleur_selected  = $risque->couleur;
			$permis_num        = $risque->permis_num;
			$categorie_selected = $risque->categorie;
			$delivre_a         = $risque->wilaya_obtention;
			$wilaya            = wilaya::all();
			$prime_total       = $devis->prime_total;
			$agences           = Agences::all();
			$code_agence       = $devis->code_agence;
			$agence_map        = Agences::where('id', $code_agence)->first();
			$marques           = marque::all();
			$categorie         = categorie_permis::all();
			$couleurs          = Couleur::all();

			$assistance = Assistance::where('code', $assistance_nom)->first();


			$assure = Assure::where('id_devis', $devis->id)->first();

			$user_wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();
			$user_commune = commune::where('code_commune', $user->commune)->first();

			return view('produits.Auto.devis_auto', compact('date_souscription', 'date_effet', 'date_exp', 'date_conducteur', 'date_permis', 'wilaya_selected', 'annee_auto', 'puissance', 'usage', 'dure', 'formule', 'taxe', 'date_taxe', 'offre', 'valeur', 'matricule', 'marques', 'marque_selected', 'model', 'delivre_a', 'wilaya', 'prime_total', 'agences', 'code_agence', 'agence_map', 'num_chassis', 'type', 'couleur_selected', 'couleurs', 'permis_num', 'categorie_selected', 'categorie', 'id', 'user_wilaya', 'user_commune', 'assure', 'profession', 'civilite', 'assistance'));
		} else {
			return view('welcome');
		}
	}

	public function generate_pdf($id)
	{

		$devis = devis::find($id);
		$risque = Rsq_Vehicule::where('code_devis', $devis->id)->first();

		$prime = Prime::where('id_devis', $devis->id)->get();
		$user = auth::user();
		$agence = Agences::where('Name', $devis->code_agence)->first();
		$assure = Assure::where('id_devis', $devis->id)->first();

		$agence = Agences::where('Name', $devis->code_agence)->first();

		$pdf = PDF::loadView('pdf.auto', compact('user', 'devis', 'risque', 'agence', 'prime', 'assure'));
		//return view('pdf.auto',compact('user','devis','risque','agence','prime'));

		return $pdf->stream();
	}

	public function contrat_auto($id)
	{


		$devis = devis::find($id);
		$risque = Rsq_Vehicule::where('code_devis', $devis->id)->first();
		$prime = Prime::where('id_devis', $devis->id)->get();
		$user = auth::user();
		$agence = Agences::where('Name', $devis->code_agence)->first();
		$prime_total = $devis->prime_total;
		$assure = Assure::where('id_devis', $devis->id)->first();

		return view('produits.Auto.resultat', compact('user', 'devis', 'risque', 'agence', 'prime', 'prime_total', 'assure'));
	}

	public function attestation($id)
	{
		$devis = devis::find($id);
		$risque = Rsq_Vehicule::where('code_devis', $devis->id)->first();
		$user = auth::user();
		$agence = Agences::where('Name', $devis->code_agence)->first();


		$pdf = PDF::loadView('pdf.attestation', compact('user', 'devis', 'risque', 'agence'));
		//return view('pdf.auto',compact('user','devis','risque','agence','prime'));

		return $pdf->stream();
	}
}
