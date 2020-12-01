<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Wilaya;
use App\commune;

use App\Rsq_Vehicule;
use App\devis;
use App\Agences;
use App\Prime;
use App\marque;
use App\Assure;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

use auth;

class TarificationAutoController extends Controller
{

    public function choix_auto(Request $request){

    	$auto=$request->all();

  		if ($request->valeur_auto < 800000){
  		 Alert::warning('Avertissement', 'la valeur du véhicule ne doit pas etre inferieure a 800 000 DA ');
  		   return redirect()->route('type_produit',['auto','index']);
  		 }

      $data_session = $auto;

      $request->session()->put('data_auto', $data_session);

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
      $auto  = session('data_auto');

      $wilaya = Wilaya::all();

      return view('produits.auto.index',compact('wilaya','auto'));

    }

    public function montant_auto(Request $request){

    $auto=$request->all();

   //dd($request);

    //Verificateur captcha
    $recap='g-recaptcha-response';

    $response=$request->$recap;
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LdA5eMZAAAAAFQaDfKxFdSo7UJbUxyZUQptej5Q',
        'response' => $request->$recap
    );
    $query = http_build_query($data);
    $options = array(
        'http' => array (
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            "Content-Length: ".strlen($query)."\r\n".
            "User-Agent:MyAgent/1.0\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success= json_decode($verify);

    if ($captcha_success->success==false) {

      echo '<script language="javascript" type="text/javascript">';
      echo 'alert(\'Recaptcha incorrect, merci de r\351essayer\');';
      echo 'window.history.go(-1);';
      echo '</script>';

    } else if ($captcha_success->success==true) {

      $date_conduc=date('Y-m-d',strtotime('-18 year'));

      if ($request->date_conducteur > $date_conduc){

         Alert::warning('Avertissement', 'Date naissance incorrect');
  		   return redirect()->route('type_produit',['auto','index']);

  		 }

       $date_permis=date('Y-m-d');

       if ($request->date_permis > $date_permis){

          Alert::warning('Avertissement', 'Date permis incorrect');
   		   return redirect()->route('type_produit',['auto','index']);

   		 }

       if( $request->formule == "1") {

       $annee_now=date('Y');

       $annee_dix=date('Y',strtotime('-10 year'));

       if ($request->annee_auto > $annee_now || $request->annee_auto < $annee_dix ){

          Alert::warning('Avertissement', 'Annee vehicule incorrect');
   		   return redirect()->route('type_produit',['auto','index']);

   		 }

       }

      if ($request->usage < "0" || $request->usage > "2"  ){

         Alert::warning('Avertissement', 'Usage incorrect');
  		   return redirect()->route('type_produit',['auto','index']);

  		 }

        if ($request->dure < "1" || $request->dure > "2"  ){

           Alert::warning('Avertissement', 'Durée incorrect');
           return redirect()->route('type_produit',['auto','index']);

         }

         if ($request->formule < "1" || $request->formule > "2"  ){

            Alert::warning('Avertissement', 'Formule incorrect');
     		   return redirect()->route('type_produit',['auto','index']);

     		 }

         $tableau_assis = array(
            'Sir_mhanni', 'Tranquilité', 'Tranquilité_plus', 'Liberté'
         );

         if ( !in_array( $request->assistance , $tableau_assis )) {

           Alert::warning('Avertissement', 'Assistance incorrect');
           return redirect()->route('type_produit',['auto','index']);

         }

         if ($request->puissance < "0" || $request->puissance > "6"  ){

             Alert::warning('Avertissement', 'Puissance incorrect');
      		   return redirect()->route('type_produit',['auto','index']);

      		 }

          if ($request->valeur_auto < "800000"  ){

             Alert::warning('Avertissement', 'Valuer incorrect');
      		   return redirect()->route('type_produit',['auto','index']);

      		 }

           $tableau_assurance = array(
              'AUTO_P', 'OTO_L'
           );

          if (!in_array( $request->type_assurance , $tableau_assurance )){

             Alert::warning('Avertissement', 'Assurance incorrect');
      		   return redirect()->route('type_produit',['auto','index']);

      		 }

          if ($request->Wilaya_selected < "1" || $request->Wilaya_selected > "48"  ){

             Alert::warning('Avertissement', 'Wilaya incorrect');
      		   return redirect()->route('type_produit',['auto','index']);

      		 }





    $wilaya=Wilaya::where('code_wilaya',$request->Wilaya_selected)->first();

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
    $DASC = '';
    $DCVV = '';

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
		$RC+=$MAJ;

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

				$prime_nette = $RC+$BDG+((($VOL+$DASC+$DR)*(100-$reduction))/100)+$Ass;
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
                $reduction = 50;
      						break;

                case '2':
                $DASC = (5 * $valeur)/100 ;
                $DASC = $DASC*0.55 ;
                $VOL = (0.5 * $valeur)/100 ;
                $VOL = $VOL*0.55 ;
                $BDG = 2000;
                $BDG = $BDG*0.55;
                $DR = 1200;
                $reduction = 50;
        				  break;
      				}


				$prime_nette = $RC+$BDG+((($VOL+$DASC+$DR)*(100-$reduction))/100)+$Ass;

			} else if ($formule == "2") {


        switch ($dure) {
          case '1':
          $DCVV = (2.5 * $valeur)/100;
          $VOL = (1 * $valeur)/100;
          $BDG = 2000;
          $DR = 1200;
          $reduction = 30;
            break;

          case '2':
          $DCVV = (2.5 * $valeur)/100;
          $DCVV = $DCVV*0.55;
          $VOL = (1 * $valeur)/100;
          $VOL = $VOL*0.55 ;
          $BDG = 2000;
          $BDG = $BDG*0.55;
          $DR = 1200;
          $reduction = 30;
            break;
        }

        $prime_nette = $RC+$BDG+((($VOL+$DCVV+$DR)*(100-$reduction))/100)+$Ass;

      }

		}


		//echo ' RC:'.$RC.' D:'.$DC20.' BDG:'.$BDG.' vol:'.$VOL.' DR:'.$DR.' ASS:'.$Ass;
		//$TVA = (($prime_nette+$CP)*17)/100 ; // (CP-PTA)*0.17
		$TVA = round(((($prime_nette+$CP)*19)/100), 2);


		//echo $TVA." ".$TVA2;
		//$FGA = (($RC+$MAJ+$CP)*3)/100;
		$FGA = round(((($RC+$CP)*3)/100), 2);
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

    $wilaya_selected = $wilaya->code_wilaya;

    $wilaya=Wilaya::All();

    //dd($assistance);

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
                return view('produits.auto.formule_laki',compact('auto','devis'));
            }else if($offre == "AUTO_P") {
                return view('produits.auto.formule_part',compact('auto','devis'));
            }

}

    }

    public function validation_devis_auto (Request $request) {

       // dd( $request->date_eff);
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



      $taxe="";
      $date_effet_taxe=null;
      if($request->taxe == "non"){
        $taxe=0;
      }else {
          $taxe = 1;
          $date_effet_taxe=$request->effet_taxe;
		}

		//VERIFICATION VALUES
		//$newDate=date('Y-m-d', strtotime('-18 year'));
		if ($request->date_eff < date('Y-m-d')){
			Alert::warning('Avertissement', 'Merci de verifier la date d effet');
          	//  return back();
			  return redirect()->route('type_produit',['auto','index']);
			}

		$pattern="/[0-9]{5} - [0-9]{3} - [0-9]{2}/";
		if ($request->matricule == "" || !preg_match($pattern, $request->matricule)){
			Alert::warning('Avertissement', 'Merci de verifier le matricule ');
          	//  return back();
			  return redirect()->route('type_produit',['auto','index']);
			}

		if ($request->num_chassis == "" || strlen($request->num_chassis)>17 || strlen($request->num_chassis)<1){
			Alert::warning('Avertissement', 'Merci de verifier le N° chassis ');
          	//  return back();
			  return redirect()->route('type_produit',['auto','index']);
			}

		if ($request->type == "" || strlen($request->type)>20 || strlen($request->type)<0){
			Alert::warning('Avertissement', 'Merci de verifier le type ');
          	//  return back();
			  return redirect()->route('type_produit',['auto','index']);
			}

		if ($request->couleur == "" || strlen($request->couleur)>20 || strlen($request->couleur)<0){
			Alert::warning('Avertissement', 'Merci de verifier la couleur ');
          	//  return back();
			  return redirect()->route('type_produit',['auto','index']);
			}

		if ($request->permis_num == "" || strlen($request->permis_num)>16 || strlen($request->permis_num)<1){
			Alert::warning('Avertissement', 'Merci de verifier la couleur ');
          	//  return back();
			  return redirect()->route('type_produit',['auto','index']);
			}

		if ($request->code_agence == "" || strlen($request->code_agence)>5 || strlen($request->code_agence)<0){
			Alert::warning('Avertissement', 'Merci de verifier le code agence ');
          	//  return back();
			  return redirect()->route('type_produit',['auto','index']);
			}



    //   if ($request->code_agence == ""){
	// 		Alert::warning('Avertissement', 'Merci de choisir une Agence');
    //   return back();
	// 		}

      $value_auto  = session('data_auto');

			// $rules = array(
			// 	'code_agence'  => 'bail|string|max:5',
			// );

			// $this->validate($request, $rules);

      $date_sous = $request->date_sous;
			$date_eff  = $request->date_eff;
			$date_exp  = $request->date_exp;

			$prime_total= $request->prime_total;

      if($request->id){

    		$risque= Rsq_Vehicule::find($request->id);
    		$risque->update([
                'matricule'              => $request->matricule,
    			'marque'                 => $request->marque,
    			'modele'                 => $request->model,
    			'num_chassis'            => $request->num_chassis,
    			'type'                   => $request->type,
    			'couleur'                => $request->couleur,
    			'permis_num'             => $request->permis_num,
    			'wilaya_obtention'       => $request->wilaya_obtention,
    			'categorie'              => $request->categorie
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





    		$res=Rsq_Vehicule::create([
    			'matricule'              => $request->matricule,
    			'marque'                 => $request->marque,
    			'modele'                 => $request->model,
    			'annee_mise_circulation' => $request->annee_auto,
    			'date_conducteur'        => $request->date_conducteur,
    			'date_permis'            => $request->date_permis,
    			'wilaya_obtention'       => $request->wilaya_obtention,
    			'puissance'              => $request->puissance,
    			'usage'                  => $request->usage,
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

		$user=auth::user();
		$code_wilaya =  wilaya::where('nlib_wilaya',$request->wilaya)->first()->code_wilaya;
		//dd($code_wilaya);

        $assure=Assure::create([
  				'nom'                => $request->name,
  				'prenom'             => $request->prenom,
  				'code_wilaya'        => $code_wilaya,
  				'date_naissance'     => $request->date_naissance,
  				'adresse'            => $user->adresse,
  				'sexe'               => $user->sexe,
  				'telephone'          => $request->telephone,
  				'profession'         => $request->commune_assure,
  				'id_devis'           => $dev->id
  			]);

    		$devis= devis::find($dev->id);
    		$risque= Rsq_Vehicule::find($res->id);

    	}

      $prime= Prime::where('id_devis',$devis->id)->get();

      $user=auth::user();
	  $agence=Agences::where('Name',$devis->code_agence)->first();
	 
	  $assure=Assure::where('id_devis',$devis->id)->first();

      return view('produits.Auto.resultat',compact('user','devis','risque','prime_total','agence','prime','assure'));


    }

    public function modification_devis_auto(Request $request,$id){

		$user= auth::user();


		$devis=devis::find($id);
		// print_r($devis->id_user." ".$user->id);
		// die();
		if($devis->id_user == $user->id){

        $devis=devis::find($id);

        $risque=Rsq_Vehicule::where('code_devis',$devis->id)->first();

     //   dd($risque);

        $id=$risque->id;


        $date_souscription = $devis->date_souscription;
			$date_eff          = $devis->date_effet;
			$date_exp          = $devis->date_expiration;

      // personne_transporte

      $date_conducteur   = $risque->date_conducteur;
      $date_permis       = $risque->date_permis;
      $wilaya_selected   = $risque->wilaya_obtention;
      $annee_auto        = $risque->annee_mise_circulation;
      $puissance         = $risque->puissance;
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
      $couleur           = $risque->couleur;
      $permis_num        = $risque->permis_num;
      $categorie         = $risque->categorie;
      $delivre_a         = $risque->wilaya_obtention;
      $wilaya            = wilaya::all();
      $prime_total       = $devis->prime_total;
      $agences           = Agences::all();
      $code_agence       = $devis->code_agence;
      $agence_map        = Agences::where('id',$code_agence)->first();
      $marques           = marque::all();
      $cat_permi         = [
            'Catégorie A',
            'Catégorie B',
            'Catégorie C',
            'Catégorie D',
            'Catégorie F',
            'Catégorie F',
      ];




		$user= auth::user();
		
		$assure=Assure::where('id_devis',$devis->id)->first();

        $user_wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();
        $user_commune = commune::where('code_commune', $user->commune)->first();



        return view('produits.Auto.devis_auto',compact('date_souscription','date_eff','date_exp','date_conducteur','date_permis','wilaya_selected','annee_auto','puissance','usage','dure','formule','assistance_nom','taxe','date_taxe',
      'offre','valeur','matricule','marques','cat_permi','marque_selected','model','delivre_a','wilaya','prime_total','agences','code_agence','agence_map','num_chassis','type','couleur','permis_num','categorie','id',
            'user_wilaya', 'user_commune','assure'));

	}else{
		return view('welcome'); 
	}
}

    public function generate_pdf($id)
		{

			$devis= devis::find($id);
			$risque= Rsq_Vehicule::where('code_devis',$devis->id)->first();
      		$prime= Prime::where('id_devis',$devis->id)->get();
      		$user=auth::user();
		  $agence=Agences::where('Name',$devis->code_agence)->first();
		  $assure=Assure::where('id_devis',$devis->id)->first();


			$pdf = PDF::loadView('pdf.auto',compact('user','devis','risque','agence','prime','assure'));
      //return view('pdf.auto',compact('user','devis','risque','agence','prime'));

			return $pdf->stream();

		}

    public function contrat_auto ($id){


		$devis= devis::find($id);
		$risque= Rsq_Vehicule::where('code_devis',$devis->id)->first();
    	$prime= Prime::where('id_devis',$devis->id)->get();
		$user=auth::user();
		$agence=Agences::where('Name',$devis->code_agence)->first();
		$prime_total=$devis->prime_total;
		$assure=Assure::where('id_devis',$devis->id)->first();

		return view('produits.Auto.resultat',compact('user','devis','risque','agence','prime','prime_total','assure'));

		}

    public function attestation ($id){
      $devis= devis::find($id);
			$risque= Rsq_Vehicule::where('code_devis',$devis->id)->first();
      $user=auth::user();
		  $agence=Agences::where('Name',$devis->code_agence)->first();


			$pdf = PDF::loadView('pdf.attestation',compact('user','devis','risque','agence'));
      //return view('pdf.auto',compact('user','devis','risque','agence','prime'));

			return $pdf->stream();

    }

}
