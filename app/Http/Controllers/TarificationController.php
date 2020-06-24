<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\MRH;
class TarificationController extends Controller
{
    //
    public function create_mrh()
    {
        
    }
    public function montant_mrh(Request $request)
    {
    	$ct=0;$taux=0.0;$p_res_civile=0;
		
        $habitation = $request->get('habitation');
        $terasse = $request->get('Terrasse');
        $montant = $request->get('montant');

        $juredique = $request->get('juredique');
		$nbr_piece = $request->get('nbr_piece');
        

		$sup_log = 35 + ($nbr_piece - 1) * 15;
		
		
		if ($habitation == "individuelle") {
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

		
		$td =80;
		$Ctpolice =500;
		$tva=($prim+$Ctpolice)*0.19;
		$totale = $prim+$Ctpolice+$tva+$td;
	//	dd($totale);
     //   $output = '<input  class="input100" type="text" id="montant_calcul" name="montant_calcul"  value="'.$totale.'" placeholder="Calcul du Montant en cours" disabled="">';
	   // echo $output;
	   return view('produits.mrh.index',compact('habitation','terasse','montant','juredique','nbr_piece','totale'));
	
    }

    public function montant_catnat(Request $request)
    {

    	dd($request);

    	/////////////////////Habitation-----------------------------------------

		if ($formule_catnatt=="Habitation"){
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

        if ($formule_catnatt=="Habitation"){

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
