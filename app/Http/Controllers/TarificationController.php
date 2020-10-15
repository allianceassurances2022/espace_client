<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilaya;
use App\commune;
use App\zcatnat;
use App\Agences;
use RealRashid\SweetAlert\Facades\Alert;

use App\Rsq_Immobilier;
use App\devis;
use App\Prime;
use PDF;

use auth;

class TarificationController extends Controller
{
    //catnat

	public function type_formule_catnat(Request $request)
	{

		$formul=$request->formule;
		$request->session()->put('formul', $formul);
		$type_const = "Bloc indépendant";
		$activite = "oui";
		$registre = "oui";
		$local = "oui";
		$type_const = "Habitation individuelle";
		$permis = "oui";

		if($formul=='Habitation'){
			return view('produits.catnat.formule_habitation',compact('formul','type_const','permis'));
		}elseif($formul=='Commerce'){
			return view('produits.catnat.formule_commerce',compact('formul','type_const','activite','registre','local'));

		}elseif($formul=='Industrielle'){
			return view('produits.catnat.formule_industrielle',compact('formul','type_const','activite','registre','local'));
		}

	}
	public function precidanttypeformul(Request $request)
	{

		$formul=session('formul');

		return view('produits.catnat.index',compact('formul'));

	}


	public function construction_catanat(Request $request)
	{



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
			$request->session()->put('type_formule', $type_formule);

			$val_assur    = $request->val_assur;
			$request->session()->put('val_assur', $val_assur);

			$permis       = $request->permis;
			$request->session()->put('permis', $permis);

			$type_const   = $request->type_const;
			$request->session()->put('type_const', $type_const);

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


			return view('produits.catnat.construction',compact('type_formule','type_const','Contenant','equipement','marchandise','contenu','activite','registre','local',
			'val_assur','permis','wilaya','prime_total','wilaya_selected','Commune_selected','reg_para'));

		}


	}
	public function precidantconstruction(Request $request)
	{


		$formul=session('formul');

		if($formul=="Commerce"){
			//$type_formulecom-=session('type_formulecom');
			$val_assur  =session('val_assur');
			$permis    =session('permis');
			$type_const =session('type_const');
			$Contenant      =session('Contenant');
			$equipement     =session('equipement');
			$marchandise    =session('marchandise');
			$contenu        =session('contenu');
			$activite       =session('activite');
			$registre       =session('registre');
			$local          =session('local');
			//$request->session()->forget('formul');
			return view('produits.catnat.formule_commerce',compact('val_assur','permis','type_const','Contenant','equipement', 'marchandise','contenu','activite', 'registre','local','formul'));

		}
		elseif($formul=="Habitation"){

		 // $type_formule=session('type_formule');
			$val_assur  =session('val_assur');
			$permis     =session('permis');
			$type_const =session('type_const');
			//$request->session()->forget('formul');
			return view('produits.catnat.formule_habitation',compact('val_assur','permis','type_const','formul'));
		}elseif($formul="Industrielle"){
		//$request-=session('type_formulecom');
			$val_assur  =session('val_assur');
			$permis     =session('permis');
			$type_const =session('type_const');
			$Contenant      =session('Contenant');
			$equipement     =session('equipement');
			$marchandise    =session('marchandise');
			$contenu        =session('contenu');
			$activite       =session('activite');
			$registre       =session('registre');
			$local          =session('local');
			//$request->session()->forget('formul');
			return view('produits.catnat.formule_industrielle',compact('val_assur','permis','type_const','Contenant','equipement', 'marchandise','contenu','activite', 'registre','local','formul'));


		}

	}

	public function montant_catnat(Request $request)
	{

		$maj=0.0;

		$type_formule     = $request->type_formule;
		$type_const       = $request->type_const;
		$valeur_c         = $request->Contenant;
		$valeur_e         = $request->equipement;
		$valeur_m         = $request->marchandise;
		$contenu          = $request->contenu;
		$act_reg          = $request->activite;
		$reg_com          = $request->registre;
		$loca             = $request->local;
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

		$val_assure=0;
    $maj=0;
    $taux=0;






/////////////////////Habitation-----------------------------------------

if ($type_formule=="Habitation"){
$valeur_c=$val_assur;
$valeur_e=0;
$valeur_m=0;
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
	if ($valeur_c>$val_assure)
		 $val_assure=$valeur_c;
}

///////////////////////industrie et commercial--------------------------------------
else {

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


			if ($act_reg=="non"){
			$maj=$val_assure*$taux*0.2;
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
        $prime_total  = number_format($prime_total_, 2,',', ' ');


		//dd($prime_total);

		$datec=date('d/m/y');


		$data_session     = [
		'type_formule'    => $request->type_formule,
		'type_const'      => $request->type_const,
		'Contenant'       => $request->Contenant,
		'equipement'      => $request->equipement,
	    'marchandise'     => $request->marchandise,
	    'contenu'         => $request->contenu,
	    'act_reg'         => $request->activite,
	    'reg_com'         => $request->registre,
	    'loca'            => $request->local,
		'commune_selected'=> $request->Commune,
		'wilaya_selected' => $request->Wilaya,
		'anne_cont'       => $request->anne_cont,
		'surface'         => $request->Superficie,
		'permis'          => $request->permis,
		'val_assur'       => $request->val_assur,
		'reg_para'        => $request->seisme,
		'datec'           => $datec,
		'prime_total'     => $prime_total_,
        'cout_police'      => $CP,
        'timbre_dimension' => $TD,
        'prime_nette'       => $val,
		];



		$request->session()->put('data_catnat', $data_session);

		$Contenant   = $valeur_c;
        $equipement  = $valeur_e;
        $marchandise = $valeur_m;
        $activite    = $act_reg;
        $registre    = $reg_com;
        $local       = $loca;

		return view('produits.catnat.construction',compact('type_formule','val_assur','permis','wilaya','prime_total','type_const','Contenant','equipement',
		            'marchandise','contenu','activite','registre','local','surface','anne_cont','wilaya_selected','commune','Commune_selected','reg_para'));

	}

	//mrh
	public function montant_mrh(Request $request)
	{

		$rules = array(
			'habitation' => 'bail|required|string|max:190',
			'terasse'    => 'bail|required|string',
			'montant'    => 'bail|required|Numeric',
			'juredique'  => 'bail|required|string',
			'nbr_piece'  => 'bail|required|integer',
		);

		$this->validate($request, $rules);

		if ($request->nbr_piece > 15){
		 Alert::warning('Avertissement', 'Nombre de piéces doit etre inferieur a 16 ');
		   return redirect()->route('type_produit',['mrh','index']);
		 }

		$habitation = $request->habitation;


		$ct=0;
		$taux=0.0;
		$p_res_civile=0;

		$terasse = $request->terasse;
		($habitation);
		$montant = $request->montant;

		$juredique = $request->juredique;
		$nbr_piece = $request->nbr_piece;

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

			$ct=0;$taux=0.0;$p_res_civile=0;



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
				$p_degat = $p_degat * 1.5;
			}


			$red=$p_in*0.4;
			$p_in=$p_in-$red;

			$red=$p_vol*0.4;
			$p_vol=$p_vol-$red;

			$red=$p_degat*0.4;
			$p_degat=$p_degat-$red;

			$red=$p_bris*0.4;
			$p_bris=$p_bris-$red;


			$prim = $p_in + $p_vol + $p_degat + $p_bris + $p_res_civile;

			$td =120;
			$Ctpolice =500;
			$tva=($prim+$Ctpolice)*0.19;


			$totale = $prim+$Ctpolice+$tva+$td;

			/////////////////////// sauvegarde session

			$datec=date('d/m/y');

			$data_session = [
				'terasse'          => $terasse,
				'habitation'       => $habitation,
				'montant'          => $montant,
				'juredique'        => $juredique,
				'nbr_piece'        => $nbr_piece,
				'datec'            => $datec,
				'prime_total'      => $totale,
				'incendie'         => $p_in,
				'degats_eaux'      => $p_degat,
				'bris_glace'       => $p_bris,
				'vol'              => $p_vol,
				'rc_chef_famille'  => $p_res_civile,
				'prime_nette'      => $prim,
				'cout_police'      => $Ctpolice,
				'timbre_dimension' => $td,
				'tva'              => $tva


			];

			$request->session()->put('data_mrh', $data_session);


			///////////////////////////////////////////////////////////



      //session()->flash('success', 'text goes here');
			return view('produits.mrh.index',compact('habitation','terasse','montant','juredique','nbr_piece','totale'));

			// try{
      //           return response()->json(['total' => $totale ]);
      //       } catch (\Exception  $e) {
      //            return response()->json(['Erreur' => $e->errorsMessage()->first() ], 403 );
      //       }


		// }
		//
		//
		// else{
		//
		// 	return redirect()->route('montant_mrh')
		// 	->withError("veuillez corriger les champs ci-dessous");
		// }








	}
	function fetch(Request $request)
	{
		$select = $request->post('select');
		$value  = $request->post('value');
		$data   = commune::where('code_wilaya', $value)->get();
		$output = '';
		//$output = '<option value="">Select Commune</option>';
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

			$nom     = 'Automobile';
			$montant = $value_auto['prime_total'];
			$total   = $total+$montant;

			$auto = [
				'nom'     => $nom,
				'montant' => $montant
			];

		}



		return view('panier',compact('mrh','auto','cat','total'));


	}


    public function panier_supp (Request $request, $produit){

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

			if ($request->code_agence == ""){
			Alert::warning('Avertissement', 'Merci de choisir une Agence');
      return back();
			}

			$rules = array(
				'code_agence'  => 'bail|string|max:5',
			);

			$this->validate($request, $rules);

			$value_mrh  = session('data_mrh');
			$date_sous = $request->date_sous;
			$date_eff  = $request->date_eff;
			$date_exp  = $request->date_exp;

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
    			'code_agence'       => $request->code_agence,
					'prime_nette'       => $value_mrh['prime_nette'],
					'tva'               => $value_mrh['tva'],
					'cp'                => $value_mrh['cout_police'],
					'td'                => $value_mrh['timbre_dimension'],
					'id_user'           => Auth()->user()->id,
                    'type_assurance'    => 'Multirisques Habitation'
    		]);

				Prime::create([
					'code'              => '080120',
					'libelle'           => 'Incendie',
					'valeur'            => $value_mrh['incendie'],
					'id_devis'          => $dev->id
				]);
				Prime::create([
					'code'              => '090120',
					'libelle'           => 'Dégâts des Eaux',
					'valeur'            => $value_mrh['degats_eaux'],
					'id_devis'          => $dev->id
				]);
				Prime::create([
					'code'              => '090220',
					'libelle'           => 'Bris de Glace',
					'valeur'            => $value_mrh['bris_glace'],
					'id_devis'          => $dev->id
				]);
				Prime::create([
					'code'              => '090340',
					'libelle'           => 'Vol en Mobilier',
					'valeur'            => $value_mrh['vol'],
					'id_devis'          => $dev->id
				]);
				Prime::create([
					'code'              => '080120',
					'libelle'           => 'RC Chef de Famille',
					'valeur'            => $value_mrh['rc_chef_famille'],
					'id_devis'          => $dev->id
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

			$prime= Prime::where('id_devis',$devis->id)->get();

    	$user=auth::user();
			$agence=Agences::where('Name',$devis->code_agence)->first();

    	return view('produits.mrh.resultat',compact('user','devis','risque','prime_total','agence','prime'));


    }
    public function validation_devis_catnat(Request $request){

			if ($request->code_agence == ""){
			Alert::warning('Avertissement', 'Merci de choisir une Agence');
            return back();
			}

			$rules = array(
				'code_agence'  => 'bail|string|max:5',
			);

			$this->validate($request, $rules);

            $value_catnat  = session('data_catnat');



			$date_sous = $request->date_sous;
			$date_eff  = $request->date_eff;
			$date_exp  = $request->date_exp;

    	$prime_total= $request->prime_total;

			if ($request->appartient ="on"){
				$appartient = "oui";
			}else{
				$appartient = "non";
			}

    	if($request->id){
    		$risque= Rsq_Immobilier::find($request->id);
    		$risque->update([
    			'appartient'  => $appartient,
    		]);

    		$devis= devis::find($risque->code_devis);
    		$devis->update([
    			'date_effet'      => $date_eff,
    			'date_expiration' => $date_exp,
    			'code_agence'     => $request->code_agence

    		]);
    		$dev=$devis;

    	}else{

    		$dev=devis::create([
    			'date_souscription' => $date_sous,
    			'date_effet'        => $date_eff,
    			'date_expiration'   => $date_exp,
    			'prime_total'       => $request->prime_total,
    			'code_agence'       => $request->code_agence,
          'id_user'           => Auth()->user()->id,
          'prime_nette'       => $value_catnat['prime_nette'],
          'cp'                => $value_catnat['cout_police'],
          'td'                => $value_catnat['timbre_dimension'],
          'type_assurance'    => 'Catastrophe Naturelle'
    		]);

				if($request->formule == 'Habitation'){

    		$res=Rsq_Immobilier::create([
    		  'formule'            => $request->formule,
    			'type_habitation'    => $request->type_const,
    			'valeur_assure'      => $request->val_assur,
    			'permis'             => $request->permis,
          'superficie'         => $request->surface,
    			'annee_construction' => $request->anne_cont,
          'code_wilaya'        => $request->wilaya,
          'code_commune'       => $request->commune,
    			'reg_para'           => $request->reg_para,
    			'appartient'         => $request->appartient,
    			'code_devis'         => $dev->id
    		]);

			}else{
				$res=Rsq_Immobilier::create([
					'formule'            => $request->formule,
    			'type_habitation'    => $request->type_const,
    			'valeur_contenant'   => $request->contenant,
    			'valeur_equipement'  => $request->equipement,
    			'valeur_marchandise' => $request->marchandise,
					'valeur_contenu'     => $request->contenu,
    			'insc_registe_com'   => $request->act_reg,
    			'registe_com'        => $request->reg_com,
    			'local_assure'       => $request->loca,
					'superficie'         => $request->surface,
    			'annee_construction' => $request->anne_cont,
					'code_wilaya'        => $request->wilaya,
					'code_commune'       => $request->commune,
    			'reg_para'           => $request->reg_para,
    			'appartient'         => $request->appartient,
    			'code_devis'         => $dev->id
    		]);
			}



    		$devis= devis::find($dev->id);
    		$risque= Rsq_Immobilier::find($res->id);



    	}

        $agence=Agences::where('Name',$devis->code_agence)->first();
        $prime=Prime::where('id_devis',$dev->id)->first();

    	$user=auth::user();

    	return view('produits.catnat.resultat',compact('user','devis','risque','prime_total','agence','prime'));


    }


    public function modification_devis_mrh (Request $request,$id){

	    $devis=devis::find($id);

    	$risque=Rsq_Immobilier::where('code_devis',$devis->id)->first();

    	$id=$risque->id;



			$date_souscription = $devis->date_souscription;
			$date_eff          = $devis->date_effet;
			$date_exp          = $devis->date_expiration;
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
			$agences           = Agences::all();
    	$code_agence       = $devis->code_agence;
			$agence_map        = Agences::where('id',$code_agence)->first();

    	return view('produits.mrh.devis_mrh',compact('terasse','habitation','montant','juredique','nbr_piece','prime_total','date_souscription','wilaya','date_eff','date_exp',
			'adresse','wilaya_selected','surface','etage','id','agences','code_agence','agence_map'));

    }


		public function modification_devis_catnat (Request $request,$id){

    	$risque             = Rsq_Immobilier::find($id);
    	$id                 = $risque->id;

    	$devis              = devis::find($risque->code_devis);

    	$date_souscription = $devis->date_souscription;
    	$date_eff          = $devis->date_effet;
    	$date_exp          = $devis->date_expiration;
			$type_formule      = $risque->formule;
    	$type_const        = $risque->type_habitation;
    	$Contenant         = $risque->valeur_contenant;
    	$equipement        = $risque->valeur_equipement;
    	$marchandise       = $risque->valeur_marchandise;
    	$contenu           = $risque->valeur_contenu;
    	$act_reg           = $risque->insc_registe_com;
    	$reg_com           = $risque->registe_com;
    	$loca              = $risque->local_assure;
    	$val_assur         = $risque->valeur_assure;
    	$permis            = $risque->permis;
    	$surface           = $risque->superficie;
    	$anne_cont         = $risque->annee_construction;
    	$wilaya_selected   = $risque->code_wilaya;
    	$commune_selected  = $risque->code_commune;
    	$reg_para          = $risque->reg_para;
    	$appartient        = $risque->appartient;
    	$prime_total       = $devis->prime_total;
    	$wilaya_selected   = $risque->code_wilaya;
    	$wilaya            = wilaya::all();
    	$code_agence       = $devis->code_agence;
			$agences           = Agences::all();
            $agence_map        = Agences::where('id',$code_agence)->first();

			$commune_selected  = commune::where('code_commune',$commune_selected)->first();
			$wilaya_selected   = wilaya::where('code_wilaya',$wilaya_selected)->first();



    	return view('produits.catnat.devis_catnat',compact('date_souscription','date_eff','date_exp','type_formule','wilaya_selected','commune_selected','surface','wilaya',
			'anne_cont','reg_para','appartient','type_const','val_assur','permis','Contenant','equipement','marchandise','contenu','act_reg','reg_com','loca','prime_total','agences','agence_map','id','code_agence'));

    }

    public function delete_devis(Request $request, $id){

	    $devi = devis::find($id);
	    $devi->delete();

        return view('delete_devis');

    }



}
