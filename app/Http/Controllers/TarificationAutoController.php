<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wilaya;

class TarificationAutoController extends Controller
{

    public function choix_auto(Request $request){

    	$auto=$request->all();

      // $data_session = [
      // 	              'date_conducteur' => $daten,
  	  //                 'date_permis'     => $date_permis,
  	  //                 'wilaya'          => $wilaya,
  	  //                 'annee_auto'      => $annee_auto,
  		// 			          'puissance'       => $puissance,
  		// 			          'usage'           => $usage,
  	  //                 'valeur'          => $valeur,
  	  //                 'offre'           => $offre,
  	  //                 'dure'            => $dure,
  	  //                 'formule'         => $formule,
  	  //                 'assistance'      => $assistance,
  	  //                 'prime_total'     => $devis,
  	  //                 'datec'           => $datec,
      //                 ];
      //
      // $request->session()->put('data_auto', $data_session);

      $auto=array_merge($auto, ["dure"=>"1","formule"=>"1","assistance"=>"Liberté","usage"=>"0","taxe"=>"non"]);

    	$devis = 0;

    if ($request->type_assurance == "AUTO_P"){
        return view('produits.auto.formule_part',compact('auto','devis'));
    }elseif($request->type_assurance == "OTO_L"){
        return view('produits.auto.formule_laki',compact('auto','devis'));
    }

    }

    public function precedent(Request $request){
      $auto=$request->all();

      dd($auto);

    }

    public function montant_auto(Request $request){

    $auto=$request->all();

    $wilaya=Wilaya::where('code_wilaya',$request->Wilaya)->first();

		$zone = $wilaya->zone;

		$AssSM = 1000;
		$AssTran = 2400;
		$AssTranP= 4500;
		$AssLib = 6500;
		$CP = 1000;
		$MAJp = 0;
		$MAJa = 0;
		$genre = "00";
		$Ass = 0;
		$reduction=0;

		$usage = $request->usage;
		$puissance = $request->puissance;
		$valeur = $request->valeur_auto;
		$daten = $request->date_conducteur;

		$jours = substr($daten, -2);
		$mois = substr($daten, -5, 2);
		$annee = substr($daten, 0, 4);

		$date_permis = $request->date_permis;
		$annee_auto = $request->annee_auto;

		$offre = $request->type_assurance;

		$dure=$request->dure;

    $taxe=$request->taxe;
    $date_taxe=$request->date_taxe;

		if ($offre == "OTO_L") {
			$formule = $request->formule;
			$option = "";
			switch ($dure) {
			case ("1") : $dureee = "1ans";
								break;
		    }
		}
		else if ($offre == "AUTO_P") {
			$formule = $request->formule;
			$option = "";
			switch ($dure) {
			case ("1") : $dureee = "1ans";
								break;
			case ("2") : $dureee = "6mois";
								break;
		    }
		}
		$assistance = $request->assistance;

		$code_tarif = $genre.$zone.$usage.$puissance ;
		$code_particulier = $zone.$usage.$puissance ;

		$BDG = 0 ;

		// RC /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$TRC = array(
			100 => array("1ans"=>1045.31,"6mois"=>574.92),
			101 => array("1ans"=>1495.18,"6mois"=>822.35),
			102 => array("1ans"=>1712,"6mois"=>941.60),
			103 => array("1ans"=>1933.91,"6mois"=>1063.64),
			104 => array("1ans"=>3624.31,"6mois"=>1993.37),
			105 => array("1ans"=>3892.38,"6mois"=>2140.81),
			106 => array("1ans"=>4073.48,"6mois"=>2240.41),
			110 => array("1ans"=>784.06,"6mois"=>431.23),
			111 => array("1ans"=>1121.39,"6mois"=>616.76),
			112 => array("1ans"=>1284.14,"6mois"=>706.28),
			113 => array("1ans"=>1450.43,"6mois"=>797.74),
			114 => array("1ans"=>2718.19,"6mois"=>1495.01),
			115 => array("1ans"=>2919.26,"6mois"=>1605.60),
			116 => array("1ans"=>3055.39,"6mois"=>1680.47),
			120 => array("1ans"=>1100.60,"6mois"=>605.33),
			121 => array("1ans"=>1560.12,"6mois"=>858.07),
			122 => array("1ans"=>1776.90,"6mois"=>977.29),
			123 => array("1ans"=>1960.75,"6mois"=>1078.42),
			124 => array("1ans"=>2399.47,"6mois"=>1319.71),
			125 => array("1ans"=>2568.30,"6mois"=>1412.57),
			126 => array("1ans"=>2681.52,"6mois"=>1540.84),
			130 => array("1ans"=>1568.11,"6mois"=>862.46),
			131 => array("1ans"=>2242.80,"6mois"=>1233.54),
			132 => array("1ans"=>2567.98,"6mois"=>1412.39),
			133 => array("1ans"=>2900.84,"6mois"=>1595.46),
			134 => array("1ans"=>3397.76,"6mois"=>1868.77),
			135 => array("1ans"=>3649.10,"6mois"=>2007.01),
			136 => array("1ans"=>3818.89,"6mois"=>2100.40),
			200 => array("1ans"=>721.07,"6mois"=>396.59),
			201 => array("1ans"=>1049.78,"6mois"=>577.38),
			202 => array("1ans"=>1264.02,"6mois"=>695.21),
			203 => array("1ans"=>1472.81,"6mois"=>810.05),
			204 => array("1ans"=>2883.46,"6mois"=>1585.90),
			205 => array("1ans"=>3175.61,"6mois"=>1746.59),
			206 => array("1ans"=>3365.92,"6mois"=>1851.25),
			210 => array("1ans"=>540.71,"6mois"=>297.38),
			211 => array("1ans"=>787.25,"6mois"=>432.98),
			212 => array("1ans"=>948.10,"6mois"=>521.45),
			213 => array("1ans"=>1104.78,"6mois"=>607.63),
			214 => array("1ans"=>2162.58,"6mois"=>1189.42),
			215 => array("1ans"=>2381.57,"6mois"=>1309.86),
			216 => array("1ans"=>2524.33,"6mois"=>1388.39),
			220 => array("1ans"=>783.41,"6mois"=>430.87),
			221 => array("1ans"=>1112.46,"6mois"=>611.86),
			222 => array("1ans"=>1321.22,"6mois"=>726.67),
			223 => array("1ans"=>1561.72,"6mois"=>858.95),
			224 => array("1ans"=>1953.41,"6mois"=>1074.37),
			225 => array("1ans"=>2105.29,"6mois"=>1157.92),
			226 => array("1ans"=>2225.21,"6mois"=>1223.87),
			230 => array("1ans"=>1081.75,"6mois"=>594.96),
			231 => array("1ans"=>1574.83,"6mois"=>866.16),
			232 => array("1ans"=>1896.18,"6mois"=>1042.90),
			233 => array("1ans"=>2209.22,"6mois"=>1215.07),
			234 => array("1ans"=>2703.24,"6mois"=>1486.79),
			235 => array("1ans"=>2976.97,"6mois"=>1637.43),
			236 => array("1ans"=>3155.72,"6mois"=>1735.64),
		);
		/////////////////////////////////////////////////////////////////////////////////////////////
		//Fonction diff Date
		function diff($date){
			$Mois = substr($date ,-5,2) ;
			$Jour = substr($date ,-2,2) ;
			$Annee = substr($date ,0,4) ;
			$datedepart = (mktime (0,0,0,$Mois,$Jour,$Annee));
			$date1 = date("Y-m-d",($datedepart));
			$dateactuelle = time();
			$date2 = date("Y-m-d",$dateactuelle);
			$diff= $dateactuelle-$datedepart ;
			$difdate = date("Y-m-d",$diff);
			$difAn = substr($difdate,0,4)-1970;
			return $difAn;
		}

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		//Prime nette
		//$Assistance = 0 ;
		$DC = 0 ;

		//////////////////////////////////////////////////////////////////////////////////////////////
		$RC = $TRC[$code_particulier][$dureee] ;
		//$RC = $TRC[$code_particulier]['1ans'] ;
		$RC1 = ($RC*20)/100;
		$RC = $RC1+$RC;
		if(diff($daten)<25){
			$MAJa = ($RC*15)/100 ;
		}
		if(diff($date_permis)<1){
			$MAJp = ($RC*25)/100 ;
		}
		$MAJ = max($MAJp , $MAJa);
		$RC+=$MAJ ;

    //dd($RC);


		//////////////////////////////////////////////////////////////////////////////////////////////

		switch ($assistance) {
			case ("Sir_mhani") : $Ass = $AssSM;
								break ;
			case ("Tranquilité") : $Ass = $AssTran;
								break ;
			case ("Tranquilité_plus") : $Ass = $AssTranP;
								break ;
			case ("Liberté") : $Ass = $AssLib;
								break ;
		}

		/////////////////////////////////////////////////////////////////////////////////////////////////

		if ($offre == "OTO_L") {

         switch ($assistance) {
			case ("Tranquilité_plus") : $Ass = 0;
								break ;
			case ("Liberté") : $Ass = 4000;
								break ;
		}


			if ($formule == "1") {
				switch ($dure) {
					case '1':
					    $DASC = (2.5 * $valeur)/100 ;
				      $VOL = (0.25 * $valeur)/100 ;
				      $BDG = 1000;
				      $DR = 1200;
				      $reduction = 0;
						break;
				}

				$prime_nette = $RC+$DR+$BDG+((($VOL+$DASC)*(100-$reduction))/100)+$Ass;
			}

		}

		else if ($offre == "AUTO_P") {
		 switch ($usage) {
			case '0' :

        if($dure == 1){
			    switch ($assistance) {

			    	case ("Sir_mhanni") : $Ass = 1000;
								break ;
			    	case ("Tranquilité") : $Ass = 2400;
								break ;
			        case ("Tranquilité_plus") : $Ass = 4500;
								break ;
			        case ("Liberté") : $Ass = 6500;
								break ;
		        }

          }else if($dure == 2){

            switch ($assistance) {
  			    	case ("Sir_mhanni") : $Ass = 1000-(1000*0.4);
  								break ;
  			    	case ("Tranquilité") : $Ass = 2400-(2400*0.4);
  								break ;
  			        case ("Tranquilité_plus") : $Ass = 4500-(4500*0.4);
  								break ;
  			        case ("Liberté") : $Ass = 6500-(6500*0.4);
  								break ;
  		        }
          }
					break ;

          case '1' :

            if($dure == 1){
    			    switch ($assistance) {

    			    	case ("Sir_mhanni") : $Ass = 1000;
    								break ;
    			    	case ("Tranquilité") : $Ass = 2400;
    								break ;
    			        case ("Tranquilité_plus") : $Ass = 4500;
    								break ;
    			        case ("Liberté") : $Ass = 6500;
    								break ;
    		        }

              }else if($dure == 2){

                switch ($assistance) {
      			    	case ("Sir_mhanni") : $Ass = 1000-(1000*0.4);
      								break ;
      			    	case ("Tranquilité") : $Ass = 2400-(2400*0.4);
      								break ;
      			        case ("Tranquilité_plus") : $Ass = 4500-(4500*0.4);
      								break ;
      			        case ("Liberté") : $Ass = 6500-(6500*0.4);
      								break ;
      		        }
              }
    					break ;
			case '2' :
        if($dure == 1){
			    switch ($assistance) {

			    	case ("Sir_mhanni") : $Ass = 1490;
								break ;
			    	case ("Tranquilité") : $Ass = 2990;
								break ;
			        case ("Tranquilité_plus") : $Ass = 4990;
								break ;
			        case ("Liberté") : $Ass = 10000;
								break ;
		        }

          }else if($dure == 2){

            switch ($assistance) {
  			    	case ("Sir_mhanni") : $Ass = 1490-(1490*0.4);
  								break ;
  			    	case ("Tranquilité") : $Ass = 2990-(2990*0.4);
  								break ;
  			        case ("Tranquilité_plus") : $Ass = 4990-(4990*0.4);
  								break ;
  			        case ("Liberté") : $Ass = 10000-(10000*0.4);
  								break ;
  		        }
          }
					break ;
		 }



			if ($formule == "1") {



              switch ($dure) {
      					case '1':
                $DASC = (5 * $valeur)/100 ;
                $VOL = (0.5 * $valeur)/100 ;
                $BDG = 2000;
                $DR = 1200;
                $reduction = 0;
      						break;

                case '2':
                $DASC = (5 * $valeur)/100 ;
                $DASC = $DASC*0.55 ;
                $VOL = (0.5 * $valeur)/100 ;
                $VOL = $VOL*0.55 ;
                $BDG = 2000;
                $BDG = $BDG*0.55;
                $DR = 1200;
                $reduction = 0;
        				  break;
      				}


				$prime_nette = $RC+$DR+$BDG+((($VOL+$DASC)*(100-$reduction))/100)+$Ass;

			} else if ($formule == "2") {


        switch ($dure) {
          case '1':
          $DCVV = (2.5 * $valeur)/100;
          $VOL = (1 * $valeur)/100;
          $BDG = 2000;
          $DR = 1200;
          $reduction = 0;
            break;

          case '2':
          $DCVV = (2.5 * $valeur)/100;
          $DCVV = $DCVV*0.55;
          $VOL = (1 * $valeur)/100;
          $VOL = $VOL*0.55 ;
          $BDG = 2000;
          $BDG = $BDG*0.55;
          $DR = 1200;
          $reduction = 0;
            break;
        }

        $prime_nette = $RC+$DR+$BDG+((($VOL+$DCVV)*(100-$reduction))/100)+$Ass;

      }

		}


		//echo ' RC:'.$RC.' D:'.$DC20.' BDG:'.$BDG.' vol:'.$VOL.' DR:'.$DR.' ASS:'.$Ass;
		//$TVA = (($prime_nette+$CP)*17)/100 ; // (CP-PTA)*0.17
		$TVA = round(((($prime_nette+$CP)*19)/100), 2);


		//echo $TVA." ".$TVA2;
		//$FGA = (($RC+$MAJ+$CP)*3)/100;
		$FGA = round(((($RC+$MAJ+$CP)*3)/100), 2);
		//echo "<br/>".$FGA." ".$FGA2;
		$TD = 40 ;
		$TG = 0 ;
		/////////////
		///TG
		switch ($prime_nette){
			case ($prime_nette<=2500) : $TG = 300;
				break;
			case ($prime_nette<=10000) : $TG = 300+(($prime_nette-2500)*5)/100;
				break;
			case ($prime_nette<=50000) : $TG = 300+375+(($prime_nette-10000)*3)/100;
				break;
			case ($prime_nette>50000) : $TG = 300+375+1200+($prime_nette-50000)*0.02;
				break;
		}
		if ( $puissance > 3 ) {
			$TG = $TG*2;
		}

    /// Taxe pollution

    $TP=1500;

    if ($taxe == "oui" ){
      if ($dure == 1 ){
      $date_exp=date("Y-m-d", strtotime('+1 year'));
      }else if ($dure == 2){
      $date_exp=date("Y-m-d", strtotime('+6 months'));
      }

      $date_exp_taxe=date('Y-m-d', strtotime('+1 year', strtotime($date_taxe)) );


      if($date_exp_taxe > $date_exp){
        $TP=0;
      }


    }


		//////////////
		$TAXE = $TVA+$FGA+$TD+$TG+$CP+$TP ;

		//////////////////////////////////////////////
		$devis = $prime_nette + $TAXE ;

		$devis = round($devis,2) ;

		$datec=date('d/m/y');

		$data_session = [
    	              'date_conducteur' => $daten,
	                  'date_permis'     => $date_permis,
	                  'wilaya'          => $wilaya,
	                  'annee_auto'      => $annee_auto,
					          'puissance'       => $puissance,
					          'usage'           => $usage,
	                  'valeur'          => $valeur,
	                  'offre'           => $offre,
	                  'dure'            => $dure,
	                  'formule'         => $formule,
	                  'assistance'      => $assistance,
	                  'prime_total'     => $devis,
	                  'datec'           => $datec,
                    ];

        $request->session()->put('data_auto', $data_session);

        if ($offre == "OTO_L") {
        return view('produits.auto.formule_laki',compact('auto','devis'));
        }else if($offre == "AUTO_P") {
        return view('produits.auto.formule_part',compact('auto','devis'));
        }

    }

}
