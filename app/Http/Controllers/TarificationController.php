<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilaya;
use App\commune;
use App\zcatnat;

use App\Rsq_Immobilier;
use App\devis;

use auth;

class TarificationController extends Controller
{
    //catnat

	public function type_formule_catnat(Request $request)
	{


		$formul=$request->formule;

		if($formul=='Habitation'){
			$request->session()->put('formul', $formul);
			return view('produits.catnat.formule_habitation',compact('formul'));



		}elseif($formul=='Commerce'){
			$request->session()->put('formul', $formul);
			return view('produits.catnat.formule_commerce',compact('formul'));

		}elseif($formul=='Industrielle'){
			$request->session()->put('formul', $formul);
			return view('produits.catnat.formule_industrielle',compact('formul'));





		}
	}
	public function precidanttypeformul(Request $request)
	{


		$formul=session('formul');

		return view('produits.catnat.index',compact('formul'));

	}
	public function construction_catanat(Request $request)
	{

    	//dd($request);

		$wilaya           = wilaya::all();
		$prime_total      = 0;
		$surface          = '';
		$anne_cont        = '';
		$wilaya_selected  = '';
		$commune          = '';
		$Commune_selected = '';
		$reg_para         = 'oui';

		if ($request->type_formule == 'Habitation') {

			$type_formule=$request->type_formule;
			$request->session()->put('type_formule', $type_formule);

			$val_assur=$request->val_assur;
			$request->session()->put('val_assur', $val_assur);

			$permis=$request->permis;
			$request->session()->put('permis', $permis);

			$type_const=$request->type_const;
			$request->session()->put('type_const', $type_const);
			return view('produits.catnat.construction',compact('type_formule','val_assur','permis','type_const','wilaya','prime_total','wilaya_selected','Commune_selected','reg_para'));


		}else{

			$type_formule = $request->type_formule;
			$request->session()->put('type_formulecom', $type_formule);

			$val_assur    = $request->val_assur;
			$request->session()->put('val_assurcomm', $val_assur);

			$permis       = $request->permis;
			$request->session()->put('permiscomm', $permis);

			$type_const   = $request->type_const;
			$request->session()->put('type_constcomm', $type_const);

			$Contenant    = $request->Contenant;
			$request->session()->put('Contenant', $Contenant);

			$equipement   = $request->equipement;
			$request->session()->put('equipement', $equipement);

			$marchandise  = $request->marchandise;
			$request->session()->put('marchandise', $marchandise);

			$contenu      = $request->contenu;
			$request->session()->put('contenu', $contenu);

			$activite     = $request->activite;
			$request->session()->put('activite', $activite);

			$registre     = $request->registre;
			$request->session()->put('registre', $registre);

			$local        = $request->local;
			$request->session()->put('local', $local);


			return view('produits.catnat.construction',compact('type_formule','Contenant','equipement','marchandise','contenu','activite','registre','local','val_assur','permis','wilaya','prime_total','wilaya_selected','Commune_selected','reg_para'));

		}


	}
	public function precidantconstructuin(Request $request)
	{


		$formul=session('formul');
		if($formul=="Commerce"){
			//$type_formulecom-=session('type_formulecom');
			$val_assurcomm=session('val_assurcomm');
			$permiscomm=session('permiscomm');
			$type_constcomm=session('type_constcomm');
			$Contenant=session('Contenant');
			$equipement=session('equipement');
			$marchandise=session('marchandise');
			$contenu=session('contenu');
			$activite=session('activite');
			$registre=session('registre');
			$local=session('local');
			$request->session()->forget('formul');
			return view('produits.catnat.formule_commerce',compact('val_assurcomm','permiscomm','type_constcomm','Contenant','equipement', 'marchandise','contenu','activite', 'registre','local'));

		}
		elseif($formul=="Habitation"){

		 // $type_formule=session('type_formule');
			$val_assur=session('val_assur');
			$permis=session('permis');
			$type_const=session('type_const');
			$request->session()->forget('formul');
			return view('produits.catnat.formule_habitation',compact('val_assur','permis','type_const'));
		}elseif($formul="Industrielle"){
		//$request-=session('type_formulecom');
			$val_assurcomm=session('val_assurcomm');
			$permiscomm=session('permiscomm');
			$type_constcomm=session('type_constcomm');
			$Contenant=session('Contenant');
			$equipement=session('equipement');
			$marchandise=session('marchandise');
			$contenu=session('contenu');
			$activite=session('activite');
			$registre=session('registre');
			$local=session('local');
			$request->session()->forget('formul');
			return view('produits.catnat.formule_industrielle',compact('val_assurcomm','permiscomm','Contenant','equipement', 'marchandise','contenu','activite', 'registre','local'));


		}





	}

	public function montant_catnat(Request $request)
	{

		$maj=0.0;

		$type_formule     = $request->type_formule;
		$type_const       = $request->type_const;

		$Commune_selected = $request->Commune;
		$wilaya_selected  = $request->Wilaya;
		$anne_cont        = $request->anne_cont;
		$surface          = $request->Superficie;
		$permis           = $request->permis;
		$val_assur        = $request->val_assur;
		$reg_para         = $request->seisme;

		$zone = zcatnat::select('zone')
		->where('code_commune', $Commune_selected)
		->first();
		$zone = $zone->zone;

		$wilaya = wilaya::all();
		$commune = commune::where('code_wilaya',$wilaya_selected)->get();

    	/////////////////////Habitation-----------------------------------------

		if ($type_formule=="Habitation"){

			if ($type_const=="Habitation individuelle"){
				if ($zone=="0"){
					$val_assure=$surface*28000;
					$taux=0.00055;
				}
				else if ($zone=="1"){
					$val_assure=$surface*31000;
					if ($reg_para=="oui")
						$taux=0.00060;
					else $taux=0.00065;
				}
				else if ($zone=="2a"){
					$val_assure=$surface*35000;
					if ($reg_para=="oui")
						$taux=0.00065;
					else $taux=0.00080;
				}
				else if ($zone=="2b"){
					$val_assure=$surface*39000;
					if ($reg_para=="oui")
						$taux=0.00070;
					else $taux=0.001;
				}
				else if ($zone=="3"){
					$val_assure=$surface*47000;
					if ($reg_para=="oui")
						$taux=0.00075;
					else $taux=0.00125;
				}
			}
			else{
				if ($zone=="0"){
					$val_assure=$surface*25000;
					$taux=0.00055;
				}
				else if ($zone=="1"){
					$val_assure=$surface*28000;
					if ($reg_para=="oui")
						$taux=0.00060;
					else $taux=0.00065;
				}
				else if ($zone=="2a"){
					$val_assure=$surface*31000;
					if ($reg_para=="oui")
						$taux=0.00065;
					else $taux=0.00080;
				}
				else if ($zone=="2b"){
					$val_assure=$surface*35000;
					if ($reg_para=="oui")
						$taux=0.00070;
					else $taux=0.001;
				}
				else if ($zone=="3"){
					$val_assure=$surface*38000;
					if ($reg_para=="oui")
						$taux=0.00075;
					else $taux=0.00125;
				}
			}
			$valeur_normative=$val_assure;

		}

///////////////////////industrie et commercial--------------------------------------
		else {
			$valeur_e=0;
			$valeur_m=0;
			$valeur_normative=0;
			$val_assure=$valeur_c+$valeur_e+$valeur_m;


			if ($zone=="0"){
				$taux=0.00037;
			}
			else if ($zone=="1"){
				if ($reg_para=="oui")
					$taux=0.00040;
				else $taux=0.00043;
			}
			else if ($zone=="2a"){
				if ($reg_para=="oui")
					$taux=0.00043;
				else $taux=0.00053;
			}
			else if ($zone=="2b"){
				if ($reg_para=="oui")
					$taux=0.00047;
				else $taux=0.00067;
			}
			else if ($zone=="3"){
				if ($reg_para=="oui")
					$taux=0.00050;
				else $taux=0.00083;
			}
		}
///////////////////////////////majoration------------------------------------------------------------------
		if ($permis=="non" ){
			$maj=$val_assure*$taux*0.2;
		}


		$val=$val_assure*$taux;

		if ($type_formule=="Habitation"){

			if ($val<1500)
				$val=1500;
			else $val=$val_assure*$taux;
		}
		else
		{
			if ($val<2500)
				$val=2500;
			else $val=$val_assure*$taux;
		}
		$CP=1000;
		$TD=80;




		$prime_total_ = $val+$CP+$TD+$maj;
		$prime_total = number_format($prime_total_,2);
		//dd($prime_total);

		$datec=date('d/m/y');


		$data_session     = [
			'type_formule'    => $request->type_formule,
			'type_const'      => $request->type_const,
			'Contenant'       => $request->Contenant,
			'commune_selected'=> $request->Commune,
			'wilaya_selected' => $request->Wilaya,
			'anne_cont'       => $request->anne_cont,
			'surface'         => $request->Superficie,
			'permis'          => $request->permis,
			'val_assur'       => $request->val_assur,
			'reg_para'        => $request->seisme,
			'datec'           => $datec,
			'prime_total'     => $prime_total_
		];

		$request->session()->put('data_catnat', $data_session);

		return view('produits.catnat.construction',compact('type_formule','val_assur','permis','wilaya','prime_total','surface','anne_cont','wilaya_selected','commune','Commune_selected','reg_para'));



	}


	//mrh
	public function montant_mrh(Request $request)
	{

	//['DR','CODE','TYPE_AGENCE','TGVA','STATUT','CHEF_AGENCE','EMAIL']

		$habitation = $request->post('hab');


		$ct=0;
		$taux=0.0;
		$p_res_civile=0;

		$terasse = $request->post('terasse');
		($habitation);
		$montant = $request->post('montant');

		$juredique = $request->post('juredique');
		$nbr_piece = $request->post('nbr_piece');

		$sup_log = 35 + ($nbr_piece - 1) * 15;


		if ($habitation =="individuelle") {
			$ct = 60000;
		}
		else if ($habitation == "collective") {
			$ct = 40000;
		}

		$val_batim = $sup_log * $ct;

		if ($juredique == "proprietaire") {
			$taux = 0.0005 ;
			$p_res_civile = 100;
		}
		else if ($juredique == "locataire") {
			$taux = 0.0003;
			$p_res_civile = 200;
		}

		$p_inc = $val_batim * $taux;

		$p_con_inc = $montant * 0.0009;

		$p_in = $p_inc + $p_con_inc;
		$p_vol = $montant * 0.001;
		$p_degat = $montant * 0.0009;
		$p_bris = 100 * $nbr_piece;

		if ($terasse == "oui") {
			$Majter = $p_degat * 1.5;
			$prim = $p_in + $p_vol + $Majter + $p_bris + $p_res_civile;
		}
		else {
			$prim = $p_in + $p_vol + $p_degat + $p_bris + $p_res_civile;
		}


		$rules = array(
			'habitation' => 'bail|string|max:190',
			'terasse' => 'bail|string|max:3',
			'montant' => 'bail|required|integer',
			'juredique'  => 'bail|string',
			'nbr_piece'    => 'bail|string|max:3',

		);

		if($this->validate($request, $rules)){
			$ct=0;$taux=0.0;$p_res_civile=0;


				//	if((!is_null($habitation)) and (!is_null($terasse)) and (!is_null($montant)) and (!is_null($juredique)) and (!is_null($nbr_piece))){
					//dd($nbr_piece);
			$sup_log = 35 + ($nbr_piece - 1) * 15;

				//	dd($sup_log);
			if ($habitation =="individuelle") {
				$ct = 60000;
			}
			else if ($habitation == "collective") {
				$ct = 40000;
			}
					//dd($ct);
			$val_batim = $sup_log * $ct;

			if ($juredique == "proprietaire") {
				$taux = 0.0005 ;
				$p_res_civile = 100;
			}
			else if ($juredique == "locataire") {
				$taux = 0.0003;
				$p_res_civile = 200;
			}
					//dd($p_res_civile);
			$p_inc = $val_batim * $taux;
					//dd($p_inc);
			$p_con_inc = $montant * 0.0009;

			$p_in = $p_inc + $p_con_inc;
			$p_vol = $montant * 0.001;
			$p_degat = $montant * 0.0009;
			$p_bris = 100 * $nbr_piece;

			if ($terasse == "oui") {
				$Majter = $p_degat * 1.5;
				$prim = $p_in + $p_vol + $Majter + $p_bris + $p_res_civile;
			}
			else {
				$prim = $p_in + $p_vol + $p_degat + $p_bris + $p_res_civile;
			}


			$td =80;
			$Ctpolice =500;
			$tva=($prim+$Ctpolice)*0.19;
			$totale = $prim+$Ctpolice+$tva+$td;

			$datec=date('d/m/y');
					//dd($date);
			$data_session = [
				'terasse'     => $terasse,
				'habitation'  => $habitation,
				'montant'     => $montant,
				'juredique'   => $juredique,
				'nbr_piece'   => $nbr_piece,
				'datec'       => $datec,
				'prime_total' => $totale
			];

			$request->session()->put('data_mrh', $data_session);


					//dd($nbr_piece);

				   // $output = '<input  class="input100" type="text" id="montant_calcul" name="montant_calcul"  value="'.$totale.'" placeholder="Calcul du Montant en cours" disabled="">';
				   // echo $output;
			return view('produits.mrh.index',compact('habitation','terasse','montant','juredique','nbr_piece','totale'));
				//	}else{

					//}

		}
		else{

			return redirect()->route('montant_mrh')
			->withError("veuillez corriger les champs ci-dessous");
		}





	 //  return view('produits.mrh.resultat',compact('habitation','terasse','montant','juredique','nbr_piece','totale'));








	}
	function fetch(Request $request)
	{
		$select = $request->post('select');
		$value  = $request->post('value');
		$data   = commune::where('code_wilaya', $value)->get();
		$output = '<option value="">Select Commune</option>';
		foreach($data as $row)
		{
			$output .= '<option value="'.$row->code_commune.'"> '.$row->lib_commune.'</option>';
		}
		echo $output;


	}


	public function panier (){

		$value_cat  = session('data_catnat');
		$value_mrh  = session('data_mrh');
		$value_auto = session('data_auto');
		$cat        = '';
		$auto       = '';
		$mrh        = '';
		$total      = 0;

		if ($value_cat) {

			$nom     = 'Catastrophe Naturelle';
			$montant = $value_cat['prime_total'];
			$total   = $total+$montant;

			$cat = [
				'nom'     => $nom,
				'montant' => $montant
			];

		}

		if ($value_mrh) {

			$nom = 'Multirisques Habitation';
			$montant = $value_mrh['prime_total'];
			$total=$total+$montant;

			$mrh = [
				'nom'     => $nom,
				'montant' => $montant
			];

		}

		if ($value_auto) {

			$nom = 'Automobile';
			$montant = $value_auto['prime_total'];
			$total=$total+$montant;

			$auto = [
				'nom'     => $nom,
				'montant' => $montant
			];

		}



		return view('panier',compact('mrh','auto','cat','total'));


	}
	public function paiement ($id){


		$risqueh = Rsq_Immobilier::where('id',$id)->first();
		//$devis = devis::where('id',$id)->GET('prime_total');
		$code_devis=$risqueh->code_devis;
		$id=$risqueh->id;
		$devis = devis::where('id',$code_devis)->first();
		$prime_total= $devis->prime_total;
		$cat='';
		$auto='';

/*      $value_cat = session('data_catnat');
        $value_mrh = session('data_mrh');
        $cat='';
        $auto='';
        $mrh='';
        $total = 0;

        if ($value_cat) {

        	$nom = 'Catastrophe Naturelle';
        	$montant = $value_cat['prime_total'];
        	$total=$total+$montant;

        	$cat = [
        		'nom' => $nom,
        		'montant' => $montant
        	];

        }

        if ($value_mrh) {

        	$nom = 'Multirisques Habitation';
        	$montant = $value_mrh['prime_total'];
        	$total=$total+$montant;

        	$mrh = [
        		'nom' => $nom,
        		'montant' => $montant
        	];

        }
*/


        return view('paiement',compact('risqueh','auto','cat','prime_total','id'));


    }

    public function panier_supp (Request $request, $produit){

        //dd($request);
    	if($produit == 'mrh'){
    		$request->session()->forget('data_mrh');
    	}
    	if($produit == 'catnat'){
    		$request->session()->forget('data_catnat');
    	}
    	if($produit == 'auto'){
    		$request->session()->forget('data_auto');
    	}

    	return redirect('panier');


    }

    public function validation_devis_mrh (Request $request){


    	$var =  $request->date_sous;
    	$date = str_replace('/', '-', $var);
    	$date_sous = date('Y-m-d', strtotime($date));

    	$var =  $request->date_eff;
    	$date = str_replace('/', '-', $var);
    	$date_eff = date('Y-m-d', strtotime($date));

    	$var =  $request->date_exp;
    	$date = str_replace('/', '-', $var);
    	$date_exp = date('Y-m-d', strtotime($date));

    	$prime_total= $request->prime_total;
    	if($request->id){
    		$risque= Rsq_Immobilier::find($request->id);
    		$risque->update([
    			'adresse'     => $request->adresse,
    			'code_wilaya' => $request->Wilaya,
    			'superficie'  => $request->surface,
    			'etage'       => $request->etage
    		]);

    		$devis= devis::find($risque->code_devis);
    		$devis->update([
    			'date_effet'      => $date_eff,
    			'date_expiration' => $date_exp,
    			'code_agence'     => $request->code_agence
    		]);


    	}else{


    		$dev=devis::create([
    			'date_souscription' => $date_sous,
    			'date_effet'        => $date_eff,
    			'date_expiration'   => $date_exp,
    			'prime_total'       => $request->prime_total,
    			'code_agence'       => $request->code_agence
    		]);

    		$res=Rsq_Immobilier::create([
    			'adresse'             => $request->adresse,
    			'code_wilaya'         => $request->Wilaya,
    			'type_habitation'     => $request->hab,
    			'qualite_juridique'   => $request->juredique,
    			'montant_forfaitaire' => $request->montant,
    			'nombre_piece'        => $request->nbr_piece,
    			'superficie'          => $request->surface,
    			'etage'               => $request->etage,
    			'terrasse'            => $request->terasse,
    			'code_devis'          => $dev->id

    		]);

    		$devis= devis::find($dev->id);
    		$risque= Rsq_Immobilier::find($res->id);

    	}

    	$user=auth::user();

    	return view('produits.mrh.resultat',compact('user','devis','risque','prime_total'));


    }
    public function validation_devis_catnat(Request $request){

    	$var =  $request->date_sous;
    	$date = str_replace('/', '-', $var);
    	$date_sous = date('Y-m-d', strtotime($date));

			$var =  $request->date_eff;
    	$date = str_replace('/', '-', $var);
    	$date_eff = date('Y-m-d', strtotime($date));

    	$var =  $request->date_exp;
    	$date = str_replace('/', '-', $var);
    	$date_exp = date('Y-m-d', strtotime($date));

    	$prime_total= $request->prime_total;

    	if($request->id){
    		$risque= Rsq_Immobilier::find($request->id);
    		$risque->update([
    			'adresse'     => $request->adresse,
    			'code_wilaya' => $request->Wilaya,
    			'superficie'  => $request->surface,
    			'etage'       => $request->etage
    		]);

    		$devis= devis::find($risque->code_devis);
    		$devis->update([
    			'date_effet'      => $date_eff,
    			'date_expiration' => $date_exp,
    			'code_agence'     => $request->code_agence
    		]);


    	}else{


    		$dev=devis::create([
    			'date_souscription' => $date_sous,
    			'date_effet'        => $date_eff,
    			'date_expiration'   => $date_exp,
    			'prime_total'       => $request->prime_total,
    			'code_agence'       => $request->code_agence
    		]);

    		$res=Rsq_Immobilier::create([
					'formule'             => $request->formule,
    			'type_habitation'     => $request->type_const,
    			'valeur_assure'       => $request->val_assur,
    			'permis'              => $request->permis,
					'superficie'          => $request->surface,
    			'annee_construction'  => $request->anne_cont,
					'code_wilaya'         => $request->wilaya,
					'code_commune'        => $request->commune,
    			'reg_para'            => $request->reg_para,
    			'appartient'          => $request->appartient,
    			'code_devis'          => $dev->id

    		]);

    		$devis= devis::find($dev->id);
    		$risque= Rsq_Immobilier::find($res->id);

    	}

    	$user=auth::user();

    	return view('produits.catnat.resultat',compact('user','devis','risque','prime_total'));


    }


    public function modification_devis_mrh (Request $request,$id){


    	$risque=Rsq_Immobilier::find($id);
    	$id=$risque->id;

    	$devis=devis::find($risque->code_devis);

    	$var =  $devis->date_souscription;
    	$date = str_replace('-', '/', $var);
    	$date_sous = date('d-m-Y', strtotime($date));

    	$var =  $devis->date_effet;
    	$date = str_replace('-', '/', $var);
    	$date_eff = date('d-m-Y', strtotime($date));

    	$var =  $devis->date_expiration;
    	$date = str_replace('-', '/', $var);
    	$date_exp = date('d-m-Y', strtotime($date));

    	$date_souscription = $date_sous;
    	$date_eff          = $date_eff;
    	$date_exp          = $date_exp;
    	$terasse           = $risque->terrasse;
    	$habitation        = $risque->type_habitation;
    	$montant           = $risque->montant_forfaitaire;
    	$juredique         = $risque->qualite_juridique;
    	$nbr_piece         = $risque->nombre_piece;
    	$prime_total       = $devis->prime_total;
    	$wilaya_selected   = $risque->code_wilaya;
    	$wilaya            = wilaya::all();
    	$adresse           = $risque->adresse;
    	$surface           = $risque->superficie;
    	$etage             = $risque->etage;
    	$code_agence       = $devis->code_agence;



    	return view('produits.mrh.devis_mrh',compact('terasse','habitation','montant','juredique','nbr_piece','prime_total','date_souscription','wilaya','date_eff','date_exp','adresse','wilaya_selected','surface','etage','id','agences','code_agence'));

    }



}
