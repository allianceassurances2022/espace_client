<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilaya;
use App\commune;
use App\zcatnat;
class TarificationController extends Controller
{
    //catnat
 
	public function type_formule_catnat(Request $request)
	{	//dd("aaa");
		
		
		$formul=$request->get('formule');
	
		if($formul=='Habitation'){
			return view('produits.catnat.formule_habitation',compact('formul'));
		}elseif($formul=='Commerce'){
			return view('produits.catnat.formule_commerce',compact('formul'));
	    }elseif($formul=='Industrielle'){
			return view('produits.catnat.formule_industrielle',compact('formul'));
	    }
	}
	public function construction_catanat(Request $request)
    {
		$type_formule=$request->get('type_formule');
		$Contenant =$request->get('Contenant');
		$equipement=$request->get('equipement');
		$marchandise=$request->get('marchandise');
		$contenu=$request->get('contenu');
		$activite=$request->get('activite');
		$registre=$request->get('registre');
		$local=$request->get('local');
		$val_assur=$request->get('val_assur');
		$permis=$request->get('permis');
		$wilaya = wilaya::all();
		//$wilaya = 16;
			return view('produits.catnat.construction',compact('type_formule','Contenant','equipement','marchandise','contenu','activite','registre','local','val_assur','permis','wilaya'));
		
	}

    public function montant_catnat(Request $request)
    {
		$maj=0.0;
	//	dd($request);

	$type_formule=$request->post('type_formule');

	$valeur_c=$request->post('Contenant');
	$equipement=$request->post('equipement');
	$marchandise=$request->post('marchandise');
	$contenu=$request->post('contenu');
	$act_reg=$request->get('activite');
	$reg_com=$request->post('registre');
	$loca=$request->post('local');
	$Commune=$request->post('Commune');
	$Wilaya=$request->post('Wilaya');
	$anne_cont=$request->post('anne_cont');
	$surface=$request->post('Superficie');
	$permis=$request->post('permis');
	$val_assur=$request->post('val_assur');
	$reg_para=$request->post('seisme');
	//dd($Commune);
	$zone = zcatnat::select('zone')
	->where('code_commune', $Commune)
	->first();
	$zone = $zone->zone;



// 	foreach($zonee as $row)
// 	{
// 	$zone=$row->zone;
//    }
	//dd($zone);
	//$data = zcatnat::where('code_commune', $Commune)->get('zone');


//$zone=$data->zone;
//dd($zone);
    	/////////////////////Habitation-----------------------------------------

		if ($type_formule=="Habitation"){
			
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
		$valeur_normative=$val_assure;	
        if ($valeur_c>$val_assure)
           $val_assure=$valeur_c;
		}

///////////////////////industrie et commercial--------------------------------------
		else {$valeur_e=0;$valeur_m=0;
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


            if ($reg_com=="non"){
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
		
		//echo $taux.' '.$val_assure.' '.$maj;

		//echo $val." "." taux:".$taux." majoration:".$maj." zone:".$zone." conforme:".$reg_para." val:".$val;

		$prime_total = $val+$CP+$TD+$maj;
		dd($prime_total);
		return view('produits.catnat.resultat',compact('habitation','terasse','montant','juredique','nbr_piece','totale'));

    }
    

	//mrh
    public function montant_mrh(Request $request)
    { $ct=0;$taux=0.0;$p_res_civile=0;
		
		$habitation = $request->post('hab');
    {
    	$ct=0;$taux=0.0;$p_res_civile=0;
		
		$terasse = $request->post('terasse');
		($habitation);
        $montant = $request->post('montant');

        $juredique = $request->post('juredique');
		$nbr_piece = $request->post('nbr_piece');
        
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
	
       // $output = '<input  class="input100" type="text" id="montant_calcul" name="montant_calcul"  value="'.$totale.'" placeholder="Calcul du Montant en cours" disabled="">';
	   // echo $output;
	   return view('produits.mrh.resultat',compact('habitation','terasse','montant','juredique','nbr_piece','totale'));
	
	}
	function fetch(Request $request)
{
	$select = $request->post('select');
    $value = $request->post('value');
    $data = Commune::where('code_wilaya', $value)->get();
      $output = '<option value="">Select Commune</option>';
      foreach($data as $row)
      {
       $output .= '<option value="'.$row->code_commune.'"> '.$row->lib_commune.'</option>';
	  }
	  echo $output;
   

}


     function montant_catnat(Request $request)
    {
 $maj=0;
    	dd($request);

    	/////////////////////Habitation-----------------------------------------

		if ($type_formule=="Habitation"){
			$activite="";
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
		$valeur_normative=$val_assure;	
        if ($valeur_c>$val_assure)
           $val_assure=$valeur_c;
		}

///////////////////////industrie et commercial--------------------------------------
		else {
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


            if ($reg_com=="non"){
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
		
		//echo $taux.' '.$val_assure.' '.$maj;

		//echo $val." "." taux:".$taux." majoration:".$maj." zone:".$zone." conforme:".$reg_para." val:".$val;

		$prime_total = $val+$CP+$TD+$maj;

    }    
}
}