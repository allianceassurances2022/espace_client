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
    {$ct=0;$taux=0.0;$p_res_civile=0;
		
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
    
}
