<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;

use App\Wilaya;
use App\commune;
use App\zcatnat;
/*use App\Agences;
use RealRashid\SweetAlert\Facades\Alert;

use App\Rsq_Immobilier;
use App\devis;
use App\Prime;
use App\Assure;
use PDF;
use App\Profession;
use App\Civilite; 

use auth;*/

class TarificationAPI
{

    //********************** DEVI AUTO ********************** */

    public function calculeAuto(Request $request)
    {

        header("Access-Control-Allow-Origin: *");
        $data = $request->json()->all();

        $wilaya = Wilaya::where('code_wilaya', "1")->first();

        $zone = $wilaya->zone;

        $AssSM = 1000;
        $AssTran = 2400;
        $AssTranP = 4500;
        $AssLib = 6500;
        $CP = 500;
        $MAJp = 0;
        $MAJa = 0;
        $genre = "00";
        $Ass = 0;
        $reduction = 0;
        $DASC = null;
        $DCVV = null;

        $usage = $data['usage'];
        $puissance = $data['puissance'];
        $valeur = $data['valeur_auto'];
        $daten = $data['date_conducteur'];

        $jours = substr($daten, -2);
        $mois = substr($daten, -5, 2);
        $annee = substr($daten, 0, 4);

        $date_permis = $data['date_permis'];
        $annee_auto = $data['annee_auto'];

        $offre = $data['type_assurance'];

        $dure = $data['dure'];

        $taxe = $data['taxe'];
        $date_taxe = $data['date_taxe'];

        if ($valeur < "800000.00") {

            return -1;
        } else {

            if ($offre == "OTO_L") {
                $formule = $data['formule'];
                $option = "";
                switch ($dure) {
                    case ("1"):
                        $dureee = "1ans";
                        break;
                }
            } else if ($offre == "AUTO_P") {
                $formule = $data['formule'];
                $option = "";


                switch ($dure) {
                    case ("1"):
                        $dureee = "1ans";
                        break;
                    case ("2"):
                        $dureee = "6mois";
                        break;
                }
            }
            $assistance = $data['assistance'];

            $use = substr($usage, 1, 1);
            $puiss = substr($puissance, 1, 1);

            $code_tarif = $genre . $zone . $use . $puiss;
            $code_particulier = $zone . $use . $puiss;



            $BDG = 0;

            // RC /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $TRC = array(
                100 => array("1ans" => 1045.31, "6mois" => 574.92),
                101 => array("1ans" => 1495.18, "6mois" => 822.35),
                102 => array("1ans" => 1712, "6mois" => 941.60),
                103 => array("1ans" => 1933.91, "6mois" => 1063.64),
                104 => array("1ans" => 3624.31, "6mois" => 1993.37),
                105 => array("1ans" => 3892.38, "6mois" => 2140.81),
                106 => array("1ans" => 4073.48, "6mois" => 2240.41),
                110 => array("1ans" => 784.06, "6mois" => 431.23),
                111 => array("1ans" => 1121.39, "6mois" => 616.76),
                112 => array("1ans" => 1284.14, "6mois" => 706.28),
                113 => array("1ans" => 1450.43, "6mois" => 797.74),
                114 => array("1ans" => 2718.19, "6mois" => 1495.01),
                115 => array("1ans" => 2919.26, "6mois" => 1605.60),
                116 => array("1ans" => 3055.39, "6mois" => 1680.47),
                120 => array("1ans" => 1100.60, "6mois" => 605.33),
                121 => array("1ans" => 1560.12, "6mois" => 858.07),
                122 => array("1ans" => 1776.90, "6mois" => 977.29),
                123 => array("1ans" => 1960.75, "6mois" => 1078.42),
                124 => array("1ans" => 2399.47, "6mois" => 1319.71),
                125 => array("1ans" => 2568.30, "6mois" => 1412.57),
                126 => array("1ans" => 2681.52, "6mois" => 1540.84),
                130 => array("1ans" => 1568.11, "6mois" => 862.46),
                131 => array("1ans" => 2242.80, "6mois" => 1233.54),
                132 => array("1ans" => 2567.98, "6mois" => 1412.39),
                133 => array("1ans" => 2900.84, "6mois" => 1595.46),
                134 => array("1ans" => 3397.76, "6mois" => 1868.77),
                135 => array("1ans" => 3649.10, "6mois" => 2007.01),
                136 => array("1ans" => 3818.89, "6mois" => 2100.40),
                200 => array("1ans" => 721.07, "6mois" => 396.59),
                201 => array("1ans" => 1049.78, "6mois" => 577.38),
                202 => array("1ans" => 1264.02, "6mois" => 695.21),
                203 => array("1ans" => 1472.81, "6mois" => 810.05),
                204 => array("1ans" => 2883.46, "6mois" => 1585.90),
                205 => array("1ans" => 3175.61, "6mois" => 1746.59),
                206 => array("1ans" => 3365.92, "6mois" => 1851.25),
                210 => array("1ans" => 540.71, "6mois" => 297.38),
                211 => array("1ans" => 787.25, "6mois" => 432.98),
                212 => array("1ans" => 948.10, "6mois" => 521.45),
                213 => array("1ans" => 1104.78, "6mois" => 607.63),
                214 => array("1ans" => 2162.58, "6mois" => 1189.42),
                215 => array("1ans" => 2381.57, "6mois" => 1309.86),
                216 => array("1ans" => 2524.33, "6mois" => 1388.39),
                220 => array("1ans" => 783.41, "6mois" => 430.87),
                221 => array("1ans" => 1112.46, "6mois" => 611.86),
                222 => array("1ans" => 1321.22, "6mois" => 726.67),
                223 => array("1ans" => 1561.72, "6mois" => 858.95),
                224 => array("1ans" => 1953.41, "6mois" => 1074.37),
                225 => array("1ans" => 2105.29, "6mois" => 1157.92),
                226 => array("1ans" => 2225.21, "6mois" => 1223.87),
                230 => array("1ans" => 1081.75, "6mois" => 594.96),
                231 => array("1ans" => 1574.83, "6mois" => 866.16),
                232 => array("1ans" => 1896.18, "6mois" => 1042.90),
                233 => array("1ans" => 2209.22, "6mois" => 1215.07),
                234 => array("1ans" => 2703.24, "6mois" => 1486.79),
                235 => array("1ans" => 2976.97, "6mois" => 1637.43),
                236 => array("1ans" => 3155.72, "6mois" => 1735.64),
            );
            /////////////////////////////////////////////////////////////////////////////////////////////
            //Fonction diff Date
            function diff($date)
            {
                $Mois = substr($date, -5, 2);
                $Jour = substr($date, -2, 2);
                $Annee = substr($date, 0, 4);
                $datedepart = (mktime(0, 0, 0, $Mois, $Jour, $Annee));
                $date1 = date("Y-m-d", ($datedepart));
                $dateactuelle = time();
                $date2 = date("Y-m-d", $dateactuelle);
                $diff = $dateactuelle - $datedepart;
                $difdate = date("Y-m-d", $diff);
                $difAn = substr($difdate, 0, 4) - 1970;
                return $difAn;
            }

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            //Prime nette
            //$Assistance = 0 ;
            $DC = 0;

            //////////////////////////////////////////////////////////////////////////////////////////////
            $RC = $TRC[$code_particulier][$dureee];

            //$RC = $TRC[$code_particulier]['1ans'] ;
            $RC1 = ($RC * 20) / 100;
            $RC = $RC1 + $RC;
            if (diff($daten) < 25) {
                $MAJa = ($RC * 15) / 100;
            }
            if (diff($date_permis) < 1) {
                $MAJp = ($RC * 25) / 100;
            }
            $MAJ = max($MAJp, $MAJa);
            $RC += $MAJ;

            //dd($RC);


            //////////////////////////////////////////////////////////////////////////////////////////////

            switch ($assistance) {
                case ("Sir_mhani"):
                    $Ass = $AssSM;
                    break;
                case ("Tranquilité"):
                    $Ass = $AssTran;
                    break;
                case ("Tranquilité_plus"):
                    $Ass = $AssTranP;
                    break;
                case ("Liberté"):
                    $Ass = $AssLib;
                    break;
            }

            /////////////////////////////////////////////////////////////////////////////////////////////////

            if ($offre == "OTO_L") {

                switch ($assistance) {
                    case ("Tranquilité_plus"):
                        $Ass = 0;
                        break;
                    case ("Liberté"):
                        $Ass = 4000;
                        break;
                }



                if ($formule == "1") {
                    switch ($dure) {
                        case '1':
                            $DASC = (2.5 * $valeur) / 100;
                            $VOL = (0.25 * $valeur) / 100;
                            $BDG = 1000;
                            $DR = 300;
                            $reduction = 0;
                            break;
                    }

                    $prime_nette = $RC + $BDG + $VOL + ((($DASC + $DR) * (100 - $reduction)) / 100) + $Ass;
                }
            } else if ($offre == "AUTO_P") {

                switch ($usage) {
                    case '0':

                        if ($dure == 1) {
                            switch ($assistance) {

                                case ("Sir_mhanni"):
                                    $Ass = 1000;
                                    break;
                                case ("Tranquilité"):
                                    $Ass = 2400;
                                    break;
                                case ("Tranquilité_plus"):
                                    $Ass = 4500;
                                    break;
                                case ("Liberté"):
                                    $Ass = 6500;
                                    break;
                            }
                        } else if ($dure == 2) {

                            switch ($assistance) {
                                case ("Sir_mhanni"):
                                    $Ass = 1000 - (1000 * 0.4);
                                    break;
                                case ("Tranquilité"):
                                    $Ass = 2400 - (2400 * 0.4);
                                    break;
                                case ("Tranquilité_plus"):
                                    $Ass = 4500 - (4500 * 0.4);
                                    break;
                                case ("Liberté"):
                                    $Ass = 6500 - (6500 * 0.4);
                                    break;
                            }
                        }
                        break;

                    case '1':

                        if ($dure == 1) {
                            switch ($assistance) {

                                case ("Sir_mhanni"):
                                    $Ass = 1000;
                                    break;
                                case ("Tranquilité"):
                                    $Ass = 2400;
                                    break;
                                case ("Tranquilité_plus"):
                                    $Ass = 4500;
                                    break;
                                case ("Liberté"):
                                    $Ass = 6500;
                                    break;
                            }
                        } else if ($dure == 2) {

                            switch ($assistance) {
                                case ("Sir_mhanni"):
                                    $Ass = 1000 - (1000 * 0.4);
                                    break;
                                case ("Tranquilité"):
                                    $Ass = 2400 - (2400 * 0.4);
                                    break;
                                case ("Tranquilité_plus"):
                                    $Ass = 4500 - (4500 * 0.4);
                                    break;
                                case ("Liberté"):
                                    $Ass = 6500 - (6500 * 0.4);
                                    break;
                            }
                        }
                        break;
                    case '2':
                        if ($dure == 1) {
                            switch ($assistance) {

                                case ("Sir_mhanni"):
                                    $Ass = 1490;
                                    break;
                                case ("Tranquilité"):
                                    $Ass = 2990;
                                    break;
                                case ("Tranquilité_plus"):
                                    $Ass = 4990;
                                    break;
                                case ("Liberté"):
                                    $Ass = 10000;
                                    break;
                            }
                        } else if ($dure == 2) {

                            switch ($assistance) {
                                case ("Sir_mhanni"):
                                    $Ass = 1490 - (1490 * 0.4);
                                    break;
                                case ("Tranquilité"):
                                    $Ass = 2990 - (2990 * 0.4);
                                    break;
                                case ("Tranquilité_plus"):
                                    $Ass = 4990 - (4990 * 0.4);
                                    break;
                                case ("Liberté"):
                                    $Ass = 10000 - (10000 * 0.4);
                                    break;
                            }
                        }
                        break;
                }



                if ($formule == "1") {

                    switch ($dure) {
                        case '1':
                            $DASC = (5 * $valeur) / 100;
                            $VOL = (0.5 * $valeur) / 100;
                            $BDG = 2000;
                            $DR = 300;
                            $reduction = 50;
                            break;

                        case '2':
                            $DASC = (5 * $valeur) / 100;
                            $DASC = $DASC * 0.55;
                            $VOL = (0.5 * $valeur) / 100;
                            $VOL = $VOL * 0.55;
                            $BDG = 2000;
                            $BDG = $BDG * 0.55;
                            $DR = 300;
                            $reduction = 50;
                            break;
                    }

                    $ratio = 0.025;
                    $valeur_ratio = $valeur * $ratio;

                    $valeur_reduction = (($DASC + $DR) * (100 - $reduction)) / 100;
                    $valeur_prise = 0;

                    if ($valeur_ratio >  $valeur_reduction) {
                        $valeur_prise = $valeur_ratio;
                    } else if ($valeur_ratio < $valeur_reduction) {
                        $valeur_prise = $valeur_reduction;
                    } else {
                        $valeur_prise = $valeur_reduction;
                    }

                    $prime_nette = $RC + $BDG + $VOL + $valeur_prise + $Ass;
                } else if ($formule == "2") {


                    switch ($dure) {
                        case '1':
                            $DCVV = (2.5 * $valeur) / 100;
                            $VOL = (1 * $valeur) / 100;
                            $BDG = 2000;
                            $DR = 300;
                            $reduction = 30;
                            break;

                        case '2':
                            $DCVV = (2.5 * $valeur) / 100;
                            $DCVV = $DCVV * 0.55;
                            $VOL = (1 * $valeur) / 100;
                            $VOL = $VOL * 0.55;
                            $BDG = 2000;
                            $BDG = $BDG * 0.55;
                            $DR = 300;
                            $reduction = 30;
                            break;
                    }

                    $ratio = 0.025;
                    $valeur_ratio = $valeur * $ratio;

                    $valeur_reduction = (($DCVV + $DR) * (100 - $reduction)) / 100;
                    $valeur_prise = 0;

                    if ($valeur_ratio >  $valeur_reduction) {
                        $valeur_prise = $valeur_ratio;
                    } else if ($valeur_ratio < $valeur_reduction) {
                        $valeur_prise = $valeur_reduction;
                    } else {
                        $valeur_prise = $valeur_reduction;
                    }

                    $prime_nette = $RC + $BDG + $VOL + $valeur_prise + $Ass;
                }
            }


            //echo ' RC:'.$RC.' D:'.$DC20.' BDG:'.$BDG.' vol:'.$VOL.' DR:'.$DR.' ASS:'.$Ass;
            //$TVA = (($prime_nette+$CP)*17)/100 ; // (CP-PTA)*0.17
            $TVA = round(((($prime_nette + $CP) * 19) / 100), 2);


            //echo $TVA." ".$TVA2;
            //$FGA = (($RC+$MAJ+$CP)*3)/100;
            $FGA = round(((($RC + $CP) * 3) / 100), 2);
            //echo "<br/>".$FGA." ".$FGA2;
            $TD = 40;
            $TG = 0;
            /////////////
            ///TG
            switch ($prime_nette) {
                case ($prime_nette <= 2500):
                    $TG = 300;
                    break;
                case ($prime_nette <= 10000):
                    $TG = 300 + (($prime_nette - 2500) * 5) / 100;
                    break;
                case ($prime_nette <= 50000):
                    $TG = 300 + 375 + (($prime_nette - 10000) * 3) / 100;
                    break;
                case ($prime_nette > 50000):
                    $TG = 300 + 375 + 1200 + ($prime_nette - 50000) * 0.02;
                    break;
            }
            if ($puissance > 3) {
                $TG = $TG * 2;
            }

            /// Taxe pollution

            $TP = 1500;

            if ($taxe == "oui") {
                if ($dure == 1) {
                    $date_exp = date("Y-m-d", strtotime('+1 year'));
                } else if ($dure == 2) {
                    $date_exp = date("Y-m-d", strtotime('+6 months'));
                }

                $date_exp_taxe = date('Y-m-d', strtotime('+1 year', strtotime($date_taxe)));


                if ($date_exp_taxe > $date_exp) {
                    $TP = 0;
                }
            }


            //////////////
            $TAXE = $TVA + $FGA + $TD + $TG + $CP + $TP;


            //////////////////////////////////////////////
            $devis = $prime_nette + $TAXE;

            $devis = round($devis, 2);

            $datec = date('d/m/y');

            $Wilaya_selected = $wilaya->code_wilaya;

            $wilaya = Wilaya::All();

            $tab = array();

            $tab['date_permis'] = $date_permis;
            $tab['Wilaya'] = $wilaya;
            $tab['annee_auto'] = $annee_auto;
            $tab['puissance'] = $puissance;
            $tab['usage'] = $usage;
            $tab['dure'] = $dure;
            $tab['formule'] = $formule;
            $tab['assistance_nom'] = $assistance;
            $tab['devis'] = $devis;
            $tab['daten'] = $daten;
            $tab['taxe'] = $taxe;
            $tab['date_taxe'] = $date_taxe;
            $tab['Wilaya_selected'] = $Wilaya_selected;
            $tab['type_assurance'] = $offre;
            $tab['valeur_auto'] = $valeur;
            $tab['prime_nette'] = $prime_nette;
            $tab['cout_police'] = $CP;
            $tab['timbre_dimension'] = $TD;
            $tab['tva'] = $TVA;
            $tab['timbre_gradue'] = $TG;
            $tab['fga'] = $FGA;
            $tab['taxe_pollution'] = $TP;
            $tab['bris_de_glace'] = $BDG;
            $tab['vol'] = $VOL;
            $tab['dasc'] = $DASC;
            $tab['dcvv'] = $DCVV;
            $tab['rc'] = $DC;
            $tab['defense_recours'] = $DR;
            $tab['assistance'] = $Ass;


            $data = json_encode($tab);
            print_r($data);
        }
    }

    //********************** DEVI MRH ********************** */

    public function calculeMRH(Request $request)
    {

        $data = $request->json()->all();
        $ct = 0;
        $taux = 0.0;
        $p_res_civile = 0;

        $terasse = $data['terasse'];
        $habitation = $data['habitation'];
        $montant = $data['montant'];
        $juredique = $data['juredique'];
        $nbr_piece = $data['nbr_piece'];

        $tab1 = array("oui", "non");
        $tab2 = array("proprietaire", "locataire");
        $tab3 = array("individuelle", "collective");

        print_r((in_array($juredique, $tab2)));
        if (($montant > "200000.00") && ($montant < "5000000.00") && (in_array(strtolower($terasse), $tab1)) && (in_array(strtolower($juredique), $tab2)) && (in_array(strtolower($habitation), $tab3))
            && ($nbr_piece > "0") && ($nbr_piece < "16")
        ) {

            $sup_log = 35 + ($nbr_piece - 1) * 15;


            if ($habitation == "individuelle") {
                $ct = 60000;
            } else if ($habitation == "collective") {
                $ct = 40000;
            }

            $val_batim = $sup_log * $ct;

            if ($juredique == "proprietaire") {
                $taux = 0.0005;
                $p_res_civile = 100;
            } else if ($juredique == "locataire") {
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
            } else {
                $prim = $p_in + $p_vol + $p_degat + $p_bris + $p_res_civile;
            }

            $ct = 0;
            $taux = 0.0;
            $p_res_civile = 0;



            $sup_log = 35 + ($nbr_piece - 1) * 15;


            if ($habitation == "individuelle") {
                $ct = 60000;
            } else if ($habitation == "collective") {
                $ct = 40000;
            }

            $val_batim = $sup_log * $ct;

            if ($juredique == "proprietaire") {
                $taux = 0.0005;
                $p_res_civile = 100;
            } else if ($juredique == "locataire") {
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


            $red = $p_in * 0.4;
            $p_in = $p_in - $red;

            $red = $p_vol * 0.4;
            $p_vol = $p_vol - $red;

            $red = $p_degat * 0.4;
            $p_degat = $p_degat - $red;

            $red = $p_bris * 0.4;
            $p_bris = $p_bris - $red;


            $prim = $p_in + $p_vol + $p_degat + $p_bris + $p_res_civile;

            $td = 120;
            $Ctpolice = 500;
            $tva = ($prim + $Ctpolice) * 0.19;


            $totale = $prim + $Ctpolice + $tva + $td;

            $tab = array();

            $tab['prime_total'] = $totale;
            $tab['incendie'] = $p_in;
            $tab['degats_eaux'] = $p_degat;
            $tab['bris_glace'] = $p_bris;
            $tab['vol'] = $p_vol;
            $tab['rc_chef_famille'] = $p_res_civile;
            $tab['prime_nette'] = $prim;
            $tab['cout_police'] = $Ctpolice;
            $tab['timbre_dimension'] = $td;
            $tab['tva'] = $tva;

            $data = json_encode($tab);
            print_r($data);
        } else {
            http_response_code(500);
            print_r(-1);
        }
    }

    //********************** DEVI CATNAT ********************** */

    public function calculeCatnat(Request $request)
    {

        header("Access-Control-Allow-Origin: *");

        $data = $request->json()->all();

        $type_formule = $data['type_formule'];
        $type_const = $data['type_const'];
        $valeur_c = $data['contenant'];
        $valeur_e = $data['equipement'];
        $valeur_m = $data['marchandise'];
        $contenu = $data['contenu'];
        $act_reg = $data['activite'];
        $reg_com = $data['registre'];
        $local = $data['loca'];
        $Commune = $data['commune'];
        $Wilaya = $data['wilaya'];
        $anne_cont = $data['anne_cont'];
        $surface = $data['Superficie'];
        $permis = $data['permis'];
        $val_assur = $data['val_assur'];
        $reg_para = $data['seisme'];

        $tableau = array('Habitation', 'Commerce', 'Industrielle');

        if (in_array($type_formule, $tableau)) {

            switch ($type_formule) {
                case 'Habitation';

                    if ($surface < "0" || $surface === "0") {

                        return -1;
                    }

                    if ($anne_cont > date("Y")) {

                        return -1;
                    }
            }
        }

        $maj = 0.0;


        $zone = zcatnat::select('zone')
            ->where('code_commune', $Commune)
            ->first();

        $zone = $zone->zone;

        $wilaya = wilaya::all();
        $commune = commune::where('code_wilaya', $Wilaya)->get();
        $val_assure = 0;
        $maj = 0;
        $taux = 0;


        /////////////////////Habitation-----------------------------------------

        if ($type_formule == "Habitation") {
            $valeur_c = $val_assur;
            $valeur_e = 0;
            $valeur_m = 0;
            if ($type_const == "Habitation individuelle") {
                if ($zone == "0") {
                    $val_assure = $surface * 28000;
                    $taux = 0.00055;
                } else if ($zone == "1") {
                    $val_assure = $surface * 31000;
                    if ($reg_para == "oui")
                        $taux = 0.00060;
                    else $taux = 0.00065;
                } else if ($zone == "2a") {
                    $val_assure = $surface * 35000;
                    if ($reg_para == "oui")
                        $taux = 0.00065;
                    else $taux = 0.00080;
                } else if ($zone == "2b") {
                    $val_assure = $surface * 39000;
                    if ($reg_para == "oui")
                        $taux = 0.00070;
                    else $taux = 0.001;
                } else if ($zone == "3") {
                    $val_assure = $surface * 47000;
                    if ($reg_para == "oui")
                        $taux = 0.00075;
                    else $taux = 0.00125;
                }
            } else {
                if ($zone == "0") {
                    $val_assure = $surface * 25000;
                    $taux = 0.00055;
                } else if ($zone == "1") {
                    $val_assure = $surface * 28000;
                    if ($reg_para == "oui")
                        $taux = 0.00060;
                    else $taux = 0.00065;
                } else if ($zone == "2a") {
                    $val_assure = $surface * 31000;
                    if ($reg_para == "oui")
                        $taux = 0.00065;
                    else $taux = 0.00080;
                } else if ($zone == "2b") {
                    $val_assure = $surface * 35000;
                    if ($reg_para == "oui")
                        $taux = 0.00070;
                    else $taux = 0.001;
                } else if ($zone == "3") {
                    $val_assure = $surface * 38000;
                    if ($reg_para == "oui")
                        $taux = 0.00075;
                    else $taux = 0.00125;
                }
            }
            if ($valeur_c > $val_assure)
                $val_assure = $valeur_c;
        } ///////////////////////industrie et commercial--------------------------------------
        else {

            $val_assure = $valeur_c + $valeur_e + $valeur_m;

            if ($zone == "0") {
                $taux = 0.00037;
            } else if ($zone == "1") {
                if ($reg_para == "oui")
                    $taux = 0.00040;
                else $taux = 0.00043;
            } else if ($zone == "2a") {
                if ($reg_para == "oui")
                    $taux = 0.00043;
                else $taux = 0.00053;
            } else if ($zone == "2b") {
                if ($reg_para == "oui")
                    $taux = 0.00047;
                else $taux = 0.00067;
            } else if ($zone == "3") {
                if ($reg_para == "oui")
                    $taux = 0.00050;
                else $taux = 0.00083;
            }


            if ($act_reg == "non") {
                $maj = $val_assure * $taux * 0.2;
            }
        }
        ///////////////////////////////majoration------------------------------------------------------------------

        if ($permis == "non" || $permis == "ne sais pas") {
            $maj = $val_assure * $taux * 0.2;
        }

        $val = $val_assure * $taux;

        if ($type_formule == "Habitation") {

            if ($val < 1500)
                $val = 1500;
            else $val = $val_assure * $taux;
        } else {
            if ($val < 2500)
                $val = 2500;
            else $val = $val_assure * $taux;
        }
        $CP = 1000;
        $TD = 80;

        $prime_total_ = $val + $CP + $TD + $maj;
        $prime_total = number_format($prime_total_, 2, ',', ' ');

        $tab = array();

        $tab['type_formule'] = $type_formule;
        $tab['type_const'] = $type_const;
        $tab['contenant'] = $valeur_c;
        $tab['equipement'] = $valeur_e;
        $tab['marchandise'] = $valeur_m;
        $tab['contenu'] = $contenu;
        $tab['registre'] = $reg_com;
        $tab['loca'] = $local;
        $tab['commune'] = $Commune;
        $tab['wilaya'] = $wilaya;
        $tab['anne_cont'] = $anne_cont;
        $tab['surface'] = $surface;
        $tab['permis'] = $permis;
        $tab['val_assur'] = $val_assur;
        $tab['seisme'] = $reg_para;
        $tab['cout_police'] = $CP;
        $tab['timbre_dimension'] = $TD;
        $tab['zone'] = $zone;
        $tab['prime_nette'] = $val;
        $tab['activite'] = $act_reg;
        $tab['prime_total'] = $prime_total_;

        $data = json_encode($tab);

        print_r($data);
    }
}
