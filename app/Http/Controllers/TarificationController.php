<?php

namespace App\Http\Controllers;

use App\Activite_catnat;
use App\Http\Controllers\Services;
use Illuminate\Http\Request;
use App\Wilaya;
use App\commune;
use App\zcatnat;
use App\Agences;
use RealRashid\SweetAlert\Facades\Alert;

use App\Rsq_Immobilier;
use App\devis;
use App\Prime;
use App\Assure;
use PDF;
use App\Profession;
use App\Civilite;
use App\Http\Controllers\Services\TarificationService;
use auth;
use Illuminate\Support\Facades\Http;


class TarificationController extends Controller
{
    //catnat

    public function type_formule_catnat(Request $request)
    {



        $rules = array(
            'formule' => 'bail|required|string|max:190',
        );

        $this->validate($request, $rules);

        $formul = $request->formule;
        $request->session()->put('formul', $formul);
        $type_const = "Bloc indépendant";
        $activite = "oui";
        $registre = "oui";
        $local = "oui";
        $type_const = "Habitation individuelle";
        $permis = "oui";
        $code_formule = "";



        if ($formul == 'Habitation') {
            $code_formule = 1;
            return view('produits.catnat.formule_habitation', compact('formul', 'type_const', 'permis', 'code_formule'));
        } elseif ($formul == 'Commerce') {
            $code_formule = 2;
            return view('produits.catnat.formule_commerce', compact('formul', 'type_const', 'activite', 'registre', 'local', 'code_formule'));
        } elseif ($formul == 'Industrielle') {
            $code_formule = 3;
            return view('produits.catnat.formule_industrielle', compact('formul', 'type_const', 'activite', 'registre', 'local', 'code_formule'));
        } else {
            Alert::warning('Avertissement', 'Formule incorrecte');
            return redirect()->route('index_catnat');
        }
    }
    public function precidanttypeformul(Request $request)
    {

        $formul = session('formul');

        $code_formule = session('code_formule');

        return view('produits.catnat.index', compact('formul', 'code_formule'));
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
        $formul           = $request->type_formule;

        $val_assur = $request->val_assur;
        $type_const = $request->type_const;
        $permis = $request->permis;

        $code_formule     = $request->code_formule;
        $request->session()->put('code_formule', $code_formule);


        $list_contruction = array(
            'Habitation individuelle',
            'Habitation collective',
            'Immeuble'
        );

        if ($request->type_formule == 'Habitation') {

            $type_formule = $request->type_formule;
            $request->session()->put('type_formule', $type_formule);


            $code_formule     = $request->code_formule;
            $request->session()->put('code_formule', $code_formule);

            if ($val_assur > 10000) {

                $request->session()->put('val_assur', $val_assur);

                //  $permis=$request->permis;
                $request->session()->put('permis', $permis);

                if (in_array($request->type_const, $list_contruction)) {
                    //   $type_const=$request->type_const;
                    $request->session()->put('type_const', $type_const);

                    return view('produits.catnat.construction', compact(
                        'type_formule',
                        'val_assur',
                        'permis',
                        'type_const',
                        'wilaya',
                        'prime_total',
                        'wilaya_selected',
                        'Commune_selected',
                        'reg_para',
                        'code_formule'
                    ));
                } else {
                    //  $type_const=$request->type_const;

                    Alert::warning('Avertissement', 'Type de formule incorrect !!');
                    return view('produits.catnat.formule_habitation', compact('formul', 'type_const', 'permis', 'val_assur', 'code_formule'));
                }
            } else {
                Alert::warning('Avertissement', 'La valeur doit être supérieur à 10 000 DA !!');
                return view('produits.catnat.formule_habitation', compact('formul', 'type_const', 'permis', 'code_formule'));
            }
        } else {



            $type_formule = $request->type_formule;
            $request->session()->put('type_formule', $type_formule);

            $code_formule     = $request->code_formule;
            $request->session()->put('code_formule', $code_formule);

            /*			$val_assur    = $request->val_assur;
			$request->session()->put('val_assur', $val_assur);

			$permis       = $request->permis;
			$request->session()->put('permis', $permis);
*/

            if ($request->type_formule == 'Commerce' || $request->type_formule == 'Industrielle') {


                $type_const   = $request->type_const;
                $list_type_const = array(
                    'Bloc indépendant',
                    'Autres',
                );

                if (in_array($type_const, $list_type_const)) {
                    $request->session()->put('type_const', $type_const);
                } else {

                    Alert::warning('Avertissement', 'Type de construction incorrect !!');
                    return redirect()->back();
                }

                if ($request->Contenant == 0) {
                    Alert::warning('Avertissement', 'La valeur du contenant doit être supérieur à zéro !!');
                    return redirect()->back();
                } else {
                    $Contenant    = $request->Contenant;
                    $request->session()->put('Contenant', $Contenant);
                }

                if ($request->equipement == 0) {
                    Alert::warning('Avertissement', 'La valeur des équipements doit être supérieur à zéro !!');
                    return redirect()->back();
                } else {
                    $equipement   = $request->equipement;
                    $request->session()->put('equipement', $equipement);
                }

                if ($request->marchandise == 0) {
                    Alert::warning('Avertissement', 'La valeur de la marchandise doit être supérieur à zéro !!');
                    return redirect()->back();
                } else {
                    $marchandise  = $request->marchandise;
                    $request->session()->put('marchandise', $marchandise);
                }

                if ($request->contenu == 0) {
                    Alert::warning('Avertissement', 'La valeur du contenu doit être supérieur à zéro !!');
                    return redirect()->back();
                } else {
                    $marchandise  = $request->marchandise;
                    $request->session()->put('marchandise', $marchandise);
                }
            }
            $contenu      = $request->contenu;
            $request->session()->put('contenu', $contenu);

            $activite     = $request->activite;
            $request->session()->put('activite', $activite);

            $registre     = $request->registre;
            $request->session()->put('registre', $registre);

            $local        = $request->local;
            $request->session()->put('local', $local);


            return view('produits.catnat.construction', compact(
                'type_formule',
                'type_const',
                'Contenant',
                'equipement',
                'marchandise',
                'contenu',
                'activite',
                'registre',
                'local',
                'val_assur',
                'permis',
                'wilaya',
                'prime_total',
                'wilaya_selected',
                'Commune_selected',
                'reg_para',
                'code_formule'
            ));
        }
    }
    public function precidantconstruction(Request $request)
    {


        $formul = session('formul');

        if ($formul == "Commerce") {
            //$type_formulecom-=session('type_formulecom');
            $val_assur      = session('val_assur');
            $permis         = session('permis');
            $type_const     = session('type_const');
            $Contenant      = session('Contenant');
            $equipement     = session('equipement');
            $marchandise    = session('marchandise');
            $contenu        = session('contenu');
            $activite       = session('activite');
            $registre       = session('registre');
            $local          = session('local');

            //$request->session()->forget('formul');
            return view('produits.catnat.formule_commerce', compact('val_assur', 'permis', 'type_const', 'Contenant', 'equipement', 'marchandise', 'contenu', 'activite', 'registre', 'local', 'formul'));
        } elseif ($formul == "Habitation") {

            // $type_formule=session('type_formule');
            $val_assur  = session('val_assur');
            $permis     = session('permis');
            $type_const = session('type_const');
            //$request->session()->forget('formul');
            return view('produits.catnat.formule_habitation', compact('val_assur', 'permis', 'type_const', 'formul'));
        } elseif ($formul = "Industrielle") {
            //$request-=session('type_formulecom');
            $val_assur  = session('val_assur');
            $permis     = session('permis');
            $type_const = session('type_const');
            $Contenant      = session('Contenant');
            $equipement     = session('equipement');
            $marchandise    = session('marchandise');
            $contenu        = session('contenu');
            $activite       = session('activite');
            $registre       = session('registre');
            $local          = session('local');
            //$request->session()->forget('formul');
            return view('produits.catnat.formule_industrielle', compact('val_assur', 'permis', 'type_const', 'Contenant', 'equipement', 'marchandise', 'contenu', 'activite', 'registre', 'local', 'formul'));
        }
    }

    public function montant_catnat(Request $request)
    {

        //////// Verificateur captcha ////////
        $recap = 'g-recaptcha-response';

        $response = $request->$recap;
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6LdA5eMZAAAAAFQaDfKxFdSo7UJbUxyZUQptej5Q',
            'response' => $request->$recap
        );
        $query = http_build_query($data);
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                "Content-Length: " . strlen($query) . "\r\n" .
                    "User-Agent:MyAgent/1.0\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);

        if ($captcha_success->success == false) {

            echo '<script language="javascript" type="text/javascript">';
            echo 'alert(\'Recaptcha incorrect, merci de r\351essayer\');';
            echo 'window.history.go(-1);';
            echo '</script>';
        } else if ($captcha_success->success == true) {


            $tableau = array(
                'habitation', 'commerce', 'industrielle'
            );
        }

        $tab_json = array();
        $code_formule = session('code_formule');

        $tab_json['type_formule'] = $request->type_formule;
        $tab_json['type_const'] = $request->type_const;
        $tab_json['contenant'] = $request->Contenant;
        $tab_json['equipement'] = $request->equipement;
        $tab_json['marchandise'] = $request->marchandise;
        $tab_json['contenu'] = $request->contenu;
        $tab_json['activite'] = $request->activite;
        $tab_json['registre'] = $request->registre;
        $tab_json['loca'] = $request->local;
        $tab_json['commune'] = $request->Commune;
        $tab_json['wilaya'] = $request->Wilaya;
        $tab_json['anne_cont'] = $request->anne_cont;
        $tab_json['Superficie'] = $request->Superficie;
        $tab_json['permis'] = $request->permis;
        $tab_json['val_assur'] = $request->val_assur;
        $tab_json['seisme'] = $request->seisme;

        $data = json_encode($tab_json);

        $client = new \GuzzleHttp\Client();
        $url = "http://epaiement.local/api/api/calculecatnat";
        $response = Http::contentType("application/json")->send('POST', "http://epaiement.local/api/api/calculecatnat", ['body' => $data])->json();


        $tableau = array('Habitation', 'Commerce', 'Industrielle');

        $datec = date('d/m/y');

        if ($response['type_formule'] == 'Habitation') {

            $data_session = [
                'type_formule' => $response['type_formule'],
                'code_formule'  => $code_formule,
                'type_const' => $response['type_const'],
                'Contenant' => $response['contenant'],
                'equipement' => $response['equipement'],
                'marchandise' => $response['marchandise'],
                'contenu' => $response['contenu'],
                'reg_com' => $response['registre'],
                'loca' => $response['loca'],
                'commune_selected' => $response['commune'],
                'wilaya_selected' => $response['wilaya'],
                'anne_cont' => $response['anne_cont'],
                'surface' => $response['surface'],
                'permis' => $response['permis'],
                'val_assur' => $response['val_assur'],
                'reg_para' => $response['seisme'],
                'datec' => $datec,
                'prime_total' => $response['prime_total'],
                'cout_police' => $response['cout_police'],
                'timbre_dimension' => $response['timbre_dimension'],
                'zone'          => $response['zone'],
                'prime_nette' => $response['prime_nette'],
                'act_reg'     => '',

            ];
        } else {


            $data_session = [
                'type_formule' => $response['type_formule'],
                'code_formule'  => $code_formule,
                'type_const' => $response['type_const'],
                'Contenant' => $response['contenant'],
                'equipement' => $response['equipement'],
                'marchandise' => $response['marchandise'],
                'contenu' => $response['contenu'],
                'reg_com' => $response['registre'],
                'loca' => $response['loca'],
                'commune_selected' => $response['commune'],
                'wilaya_selected' => $response['wilaya'],
                'anne_cont' => $response['anne_cont'],
                'surface' => $response['surface'],
                'permis' => $response['permis'],
                'val_assur' => $response['val_assur'],
                'reg_para' => $response['seisme'],
                'datec' => $datec,
                'prime_total' => $response['prime_total'],
                'cout_police' => $response['cout_police'],
                'timbre_dimension' => $response['timbre_dimension'],
                'prime_nette' => $response['prime_nette'],
                'zone'          => $response['zone'],
                'act_reg'     => $response['activite'],

            ];
        }

        $request->session()->put('data_catnat', $data_session);


        $Contenant   = $response['contenant'];
        $equipement  = $response['equipement'];
        $marchandise = $response['marchandise'];
        $activite    = $response['activite'];
        $registre    = $response['registre'];
        $local       = $response['loca'];
        $type_formule       = $response['type_formule'];
        $type_const       = $response['type_const'];
        $contenu       = $response['contenu'];
        $activite       = $response['activite'];
        $registre       = $response['registre'];
        $Commune_selected       = $response['commune'];
        $wilaya_selected       = $response['wilaya'];
        $anne_cont       = $response['anne_cont'];
        $surface       = $response['surface'];
        $permis       = $response['permis'];
        $val_assur       = $response['val_assur'];
        $reg_para       = $response['seisme'];
        $prime_total       = $response['prime_total'];
        $cout_police       = $response['cout_police'];
        $timbre_dimension       = $response['timbre_dimension'];
        $zone       = $response['zone'];
        $prime_nette       = $response['prime_nette'];
        $seisme       = $response['seisme'];
        $wilaya = wilaya::all();
        $commune = commune::all();

        if (in_array($response['type_formule'], $tableau)) {

            switch ($response['type_formule']) {
                case 'Habitation';

                    if ($response['surface'] < 0 || $response['surface'] === 0) {
                        Alert::warning('Avertissement', 'Veuillez entrer une surface');
                        return view('produits.catnat.construction', compact('type_formule', 'prime_total', 'wilaya', 'wilaya_selected', 'Commune_selected', 'reg_para'));
                    }

                    if ($response['anne_cont'] > date("Y")) {
                        Alert::warning('Avertissement', 'La date deconstruction dépasse l\'année en cours');
                        return view('produits.catnat.construction', compact('type_formule', 'prime_total', 'wilaya', 'wilaya_selected', 'Commune_selected', 'reg_para'));
                    }

                    break;
            }
        } else {
            Alert::warning('Avertissement', 'Formule incorrects');
            return redirect()->route('index_catnat');
        }


        return view('produits.catnat.construction', compact(
            'type_formule',
            'code_formule',
            'val_assur',
            'permis',
            'wilaya',
            'prime_total',
            'type_const',
            'Contenant',
            'equipement',
            'marchandise',
            'contenu',
            'activite',
            'registre',
            'local',
            'surface',
            'anne_cont',
            'wilaya_selected',
            'commune',
            'Commune_selected',
            'reg_para'
        ));
    }

    //mrh
    public function montant_mrh(Request $request)
    {

        $recap = 'g-recaptcha-response';

        $response = $request->$recap;
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6LdA5eMZAAAAAFQaDfKxFdSo7UJbUxyZUQptej5Q',
            'response' => $request->$recap
        );
        $query = http_build_query($data);
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                "Content-Length: " . strlen($query) . "\r\n" .
                    "User-Agent:MyAgent/1.0\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);
        /*  if ($captcha_success->success == false) {

            echo '<script language="javascript" type="text/javascript">';
            echo 'alert(\'Recaptcha incorrect, merci de r\351essayer\');';
            echo 'window.history.go(-1);';
            echo '</script>';
        } else if ($captcha_success->success == true) {
*/
        if ($request->montant < "200000.00" || $request->montant > "5000000.00") {
            Alert::warning('Avertissement', 'Le montant doit etre superieur a 200000.00 et inferieur a 5000000.00');
        }

        $tab = array("oui", "non");
        if (!in_array($request->terasse, $tab)) {
            Alert::warning('Avertissement', 'terasse est incorrecte');
        }

        $tab = array("proprietaire", "locataire");
        if (!in_array($request->juredique, $tab)) {
            Alert::warning('Avertissement', 'juredique est incorrecte');
        }

        $tab = array("individuelle", "collective");
        if (!in_array($request->habitation, $tab)) {
            Alert::warning('Avertissement', 'habitation est incorrecte');
        }

        if ($request->nbr_piece < "0" || $request->nbr_piece > "16") {
            Alert::warning('Nombre de piéces doit etre inferieur a 16');
        }

        $tab_json = array();
        $habitation = $request->habitation;
        $juredique = $request->juredique;
        $nbr_piece = $request->nbr_piece;
        $montant = $request->montant;
        $terasse = $request->terasse;

        $tab_json['habitation'] = $habitation;
        $tab_json['juredique'] = $juredique;
        $tab_json['nbr_piece'] = $nbr_piece;
        $tab_json['terasse'] = $terasse;
        $tab_json['montant'] = $montant;

        $data = json_encode($tab_json);


        /*   $ct = 0;
            $taux = 0.0;
            $p_res_civile = 0;

            $terasse = $request->terasse;
            ($habitation);
            $montant = $request->montant;

            $juredique = $request->juredique;
            $nbr_piece = $request->nbr_piece;

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
            $tva = ($prim + $Ctpolice) * 0.19;*/


        /*    $client = new \GuzzleHttp\Client();
        $url = "http://epaiement.local/api/calcule_mrh";
        $response = Http::contentType("application/json")->send('POST', "http://epaiement.local/api/calculemrh", ['body' => $data])->json();
*/

        $client = new \GuzzleHttp\Client();

        $url = "http://epaiement.local/api/calculemrh";


        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'body'    => $data
        ]);
        dd($response->json());
        $totale = $response['prime_total'];

        $datec = date('d/m/y');

        $data_session = [
            'terasse' => $terasse,
            'habitation' => $habitation,
            'montant' => $montant,
            'juredique' => $juredique,
            'nbr_piece' => $nbr_piece,
            'datec' => $datec,
            'prime_total' => $response['prime_total'],
            'incendie' => $response['incendie'],
            'degats_eaux' => $response['degats_eaux'],
            'bris_glace' => $response['bris_glace'],
            'vol' => $response['vol'],
            'rc_chef_famille' => $response['rc_chef_famille'],
            'prime_nette' => $response['prime_nette'],
            'cout_police' => $response['cout_police'],
            'timbre_dimension' => $response['timbre_dimension'],
            'tva' => $response['tva']
        ];


        $request->session()->put('data_mrh', $data_session);


        return view('produits.mrh.index', compact('habitation', 'terasse', 'montant', 'juredique', 'nbr_piece', 'totale'));
        // }
    }


    function fetch(Request $request)
    {
        $select = $request->post('select');
        $value  = $request->post('value');
        $data   = commune::where('code_wilaya', $value)->get();
        $output = '';
        //$output = '<option value="">Select Commune</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->code_commune . '"> ' . $row->lib_commune . '</option>';
        }
        echo $output;
    }


    public function panier()
    {

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
            $total   = $total + $montant;

            $cat = [
                'nom'     => $nom,
                'montant' => $montant
            ];
        }

        if ($value_mrh) {

            $nom = 'Multirisques Habitation';
            $montant = $value_mrh['prime_total'];
            $total = $total + $montant;

            $mrh = [
                'nom'     => $nom,
                'montant' => $montant
            ];
        }

        if ($value_auto) {

            $nom     = 'Automobile';
            $montant = $value_auto['prime_total'];
            $total   = $total + $montant;

            $auto = [
                'nom'     => $nom,
                'montant' => $montant
            ];
        }



        return view('panier', compact('mrh', 'auto', 'cat', 'total'));
    }


    public function panier_supp(Request $request, $produit)
    {

        if ($produit == 'mrh') {
            $request->session()->forget('data_mrh');
        }
        if ($produit == 'catnat') {
            $request->session()->forget('data_catnat');
        }
        if ($produit == 'auto') {
            $request->session()->forget('data_auto');
        }

        return redirect('panier');
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validation_devis_mrh(Request $request)
    {

        $request->session()->put('etage', $request->etage);
        $request->session()->put('date_eff', $request->date_eff);
        $request->session()->put('date_exp', $request->date_exp);
        $request->session()->put('adresse', $request->adresse);
        $request->session()->put('Wilaya', $request->Wilaya);
        $request->session()->put('surface', $request->surface);


        if ($request->code_agence == "" && strlen($request->code_agence) > 5) {
            Alert::warning('Avertissement', 'Merci de verifier code d Agence');
            return redirect()->route('devis_mrh', ['mrh', 'index']);
        }

        if ($request->date_eff < date('Y-m-d')) {
            Alert::warning('Avertissement', 'Merci de verifier la date d effet');
            return redirect()->route('devis_mrh', ['mrh', 'index']);
        }

        if ($request->etage == "" || $request->etage < 0 || $request->etage > 100) {
            Alert::warning('Avertissement', 'Merci de verifier nombre d etage');
            return redirect()->route('devis_mrh', ['mrh', 'index']);
        }

        if ($request->adresse == "" || strlen($request->adresse) > 200) {
            Alert::warning('Avertissement', 'Merci de verifier l adresse');
            //  return back();
            return redirect()->route('devis_mrh', ['mrh', 'index']);
        }

        if ($request->surface == "" || $request->surface < 0 || $request->surface > 1000) {
            Alert::warning('Avertissement', 'Merci de verifier la surface');
            return redirect()->route('devis_mrh', ['mrh', 'index']);
        }


        $value_mrh     = session('data_mrh');
        $date_sous     = $request->date_sous;
        $date_eff      = $request->date_eff;
        $date_exp      = $request->date_exp;
        $prime_total   = $request->prime_total;
        $code_wilaya   = wilaya::where('code_wilaya', $request->Wilaya)->first()->code_wilaya;
        $code_commune  = commune::where('code_commune', $request->commune)->first()->code_commune;

        $user = auth::user();


        if ($request->id) {
            $risque = Rsq_Immobilier::find($request->id);
            $risque->update([
                'adresse'     => $request->adresse,
                'code_wilaya' => $code_wilaya,
                'code_commune' => $code_commune,
                'superficie'  => $request->surface,
                'etage'       => $request->etage,
                'terasse'       => $request->terasse,

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
                'prime_nette'       => $value_mrh['prime_nette'],
                'tva'               => $value_mrh['tva'],
                'cp'                => $value_mrh['cout_police'],
                'td'                => $value_mrh['timbre_dimension'],
                'id_user'           => Auth()->user()->id,
                'type_assurance'    => 'mrh'
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

            $res = Rsq_Immobilier::create([
                'adresse'             => $request->adresse,
                'code_wilaya'         => $code_wilaya,
                'code_commune'        => $code_commune,
                'type_habitation'     => $request->hab,
                'qualite_juridique'   => $request->juredique,
                'montant_forfaitaire' => $request->montant,
                'nombre_piece'        => $request->nbr_piece,
                'superficie'          => $request->surface,
                'etage'               => $request->etage,
                'terrasse'            => $request->terasse,
                'offre'               => "Multirisques Habitation",
                'code_devis'          => $dev->id

            ]);




            $assure = Assure::create([
                'nom'                => $request->name,
                'prenom'             => $request->prenom,
                'code_wilaya'        => $user->wilaya,
                'code_commune'       => $user->commune,
                'date_naissance'     => $request->date_naissance,
                'lieu_naissance'     => $user->lieu_naissance,
                'sexe'               => $user->sexe,
                'telephone'          => $request->telephone,
                'code_activite'      => $user->activite,
                'adresse'            => $request->adresse,
                'profession'         => $user->profession,
                'id_devis'           => $dev->id
            ]);

            $devis = devis::find($dev->id);
            $risque = Rsq_Immobilier::find($res->id);
        }

        $prime = Prime::where('id_devis', $devis->id)->get();
        $assure = Assure::where('id_devis', $devis->id)->first();


        $agence = Agences::where('Name', $devis->code_agence)->first();

        return view('produits.mrh.resultat', compact('user', 'devis', 'risque', 'prime_total', 'agence', 'prime', 'assure'));
    }
    public function validation_devis_catnat(Request $request)
    {

        $rules = array(
            'code_agence'  => 'bail|string|max:5',
        );

        $this->validate($request, $rules);

        $value_catnat = session('data_catnat');

        $user = auth::user();

        $date_sous = $request->date_sous;
        $date_eff  = $request->date_eff;
        $date_exp  = $request->date_exp;

        $prime_total = $request->prime_total;

        if (!$request->appartient) {
            $appartient = "non";
        } else if ($request->appartient = "on") {
            $appartient = "oui";
        }

        if (!$request->proprietaire) {
            $proprietaire = "non";
        } else if ($request->proprietaire = "on") {
            $proprietaire = "oui";
        }

        if ($request->id) {
            $risque = Rsq_Immobilier::find($request->id);
            $risque->update([
                'code_activite' => $request->activite_catnat,
                'appartient'    => $appartient,
                'proprietaire'  => $proprietaire,
                'nombre_piece'  => $request->nbr_piece,
                'etage'         => $request->etage,
                'adresse'       => $request->adresse
            ]);

            $devis = devis::find($risque->code_devis);
            $devis->update([
                'date_effet'      => $date_eff,
                'date_expiration' => $date_exp,
                'code_agence'     => $request->code_agence

            ]);
            $dev = $devis;
        } else {

            $dev = devis::create([
                'date_souscription' => $date_sous,
                'date_effet'        => $date_eff,
                'date_expiration'   => $date_exp,
                'prime_total'       => $request->prime_total,
                'code_agence'       => $request->code_agence,
                'id_user'           => Auth()->user()->id,
                'prime_nette'       => $value_catnat['prime_nette'],
                'cp'                => $value_catnat['cout_police'],
                'td'                => $value_catnat['timbre_dimension'],
                'type_assurance'    => 'catnat'
            ]);

            if ($value_catnat['type_formule'] == 'Habitation') {
                Prime::create([
                    'code'              => '080431',
                    'libelle'           => 'CatNat Habitation',
                    'valeur'            => $value_catnat['prime_nette'],
                    'id_devis'          => $dev->id
                ]);
            } elseif ($value_catnat['type_formule'] == 'Commerce') {
                Prime::create([
                    'code'              => '080432',
                    'libelle'           => 'CatNat Commercial',
                    'valeur'            => $value_catnat['prime_nette'],
                    'id_devis'          => $dev->id
                ]);
            } elseif ($value_catnat['type_formule'] == 'Industrielle') {
                Prime::create([
                    'code'              => '080433',
                    'libelle'           => 'CatNat Indistriel',
                    'valeur'            => $value_catnat['prime_nette'],
                    'id_devis'          => $dev->id
                ]);
            }



            if ($request->formule == 'Habitation') {

                $code_type_habitation = '';

                if ($request->type_const == 'Habitation individuelle') {
                    $code_type_habitation = 1;
                }
                if ($request->type_const == 'Habitation collective') {
                    $code_type_habitation = 2;
                }
                if ($request->type_const == 'Immeuble') {
                    $code_type_habitation = 3;
                }

                $res = Rsq_Immobilier::create([
                    'adresse'               => $request->adresse,
                    'formule'               => $request->formule,
                    'code_formule'          => $request->code_formule,
                    'code_type_habitation'  => $code_type_habitation,
                    'proprietaire'          => $proprietaire,
                    'type_habitation'       => $request->type_const,
                    'valeur_assure'         => $request->val_assur,
                    'permis'                => $request->permis,
                    'superficie'            => $request->surface,
                    'annee_construction'    => $request->anne_cont,
                    'code_wilaya'           => $request->wilaya,
                    'code_commune'          => $request->commune,
                    'reg_para'              => $request->reg_para,
                    'appartient'            => $request->appartient,
                    'code_activite'         => $request->activite_catnat,
                    'code_zone'             => $value_catnat['zone'],
                    'offre'                 => "catnat",
                    'code_devis'            => $dev->id,
                    'etage'                 => $request->etage,
                    'nombre_piece'          => $request->nbr_piece,
                ]);
            } else {

                $code_type_habitation = '';

                if ($request->type_const == 'Bloc indépendant') {
                    $code_type_habitation = 1;
                }
                if ($request->type_const == 'Autres') {
                    $code_type_habitation = 2;
                }

                $res = Rsq_Immobilier::create([
                    'adresse'               => $request->adresse,
                    'formule'               => $request->formule,
                    'code_formule'          => $request->code_formule,
                    'code_type_habitation'  => $code_type_habitation,
                    'proprietaire'          => $proprietaire,
                    'type_habitation'       => $request->type_const,
                    'valeur_contenant'      => $request->contenant,
                    'valeur_equipement'     => $request->equipement,
                    'valeur_marchandise'    => $request->marchandise,
                    'valeur_contenu'        => $request->contenu,
                    'insc_registe_com'      => $request->act_reg,
                    'registe_com'           => $request->reg_com,
                    'local_assure'          => $request->loca,
                    'superficie'            => $request->surface,
                    'annee_construction'    => $request->anne_cont,
                    'code_wilaya'           => $request->wilaya,
                    'code_commune'          => $request->commune,
                    'reg_para'              => $request->reg_para,
                    'appartient'            => $request->appartient,
                    'code_activite'         => $request->activite_catnat,
                    'code_zone'             => $value_catnat['zone'],
                    'offre'                 => "catastrophe naturelle",
                    'code_devis'            => $dev->id,
                    'etage'                 => $request->etage,
                    'nombre_piece'          => $request->nbr_piece
                ]);
            }



            $devis = devis::find($dev->id);
            $risque = Rsq_Immobilier::find($res->id);


            $assure = Assure::create([
                'nom'               => $request->name,
                'prenom'            => $request->prenom,
                'code_wilaya'       => $user->wilaya,
                'code_commune'      => $user->commune,
                'date_naissance'    => $request->date_naissance,
                'lieu_naissance'    => $user->lieu_naissance,
                'code_activite'     => $user->activite,
                'sexe'              => $user->sexe,
                'telephone'         => $request->telephone,
                'adresse'           => $request->adresse,
                'profession'        => $user->profession,
                'id_devis'          => $dev->id
            ]);
        }

        $agence = Agences::where('Name', $devis->code_agence)->first();
        $prime = Prime::where('id_devis', $dev->id)->first();
        $assure = Assure::where('id_devis', $devis->id)->first();


        return view('produits.catnat.resultat', compact('user', 'devis', 'risque', 'prime_total', 'agence', 'prime', 'assure'));
    }


    public function modification_devis_mrh(Request $request, $id)
    {

        $user = auth::user();
        $profession = Profession::where('code', $user->profession)->first();
        $civilite   = Civilite::where('code', $user->sexe)->first();


        $devis = devis::find($id);
        // print_r($devis->id_user." ".$user->id);
        // die();
        if ($devis->id_user == $user->id) {

            $risque = Rsq_Immobilier::where('code_devis', $devis->id)->first();

            $id = $risque->id;



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
            $commune_selected  = $risque->code_commune;
            $wilaya            = wilaya::all();
            $commune           = commune::all();
            $adresse           = $risque->adresse;
            $surface           = $risque->superficie;
            $etage             = $risque->etage;
            $agences           = Agences::all();
            $code_agence       = $devis->code_agence;
            $agence_map        = Agences::where('id', $code_agence)->first();

            $assure = Assure::where('id_devis', $devis->id)->first();

            // $wilaya = wilaya::where('code_wilaya', $assure['code_wilaya'])->first()->nlib_wilaya;

            $user_wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();
            $user_commune = commune::where('code_commune', $user->commune)->first();

            return view('produits.mrh.devis_mrh', compact(
                'terasse',
                'habitation',
                'montant',
                'juredique',
                'nbr_piece',
                'prime_total',
                'date_souscription',
                'wilaya',
                'commune',
                'date_eff',
                'date_exp',
                'adresse',
                'wilaya_selected',
                'commune_selected',
                'surface',
                'etage',
                'id',
                'agences',
                'code_agence',
                'agence_map',
                'user_wilaya',
                'user_commune',
                'assure',
                'profession',
                'civilite'
            ));
        } else {
            return view('welcome');
        }
    }


    public function modification_devis_catnat(Request $request, $id)
    {

        $user = auth::user();
        $profession = Profession::where('code', $user->profession)->first();
        $civilite   = Civilite::where('code', $user->sexe)->first();


        $devis = devis::find($id);
        if ($devis->id_user == $user->id) {

            $risque = Rsq_Immobilier::where('code_devis', $devis->id)->first();

            $id = $risque->id;

            $date_souscription = $devis->date_souscription;
            $date_eff          = $devis->date_effet;
            $date_exp          = $devis->date_expiration;
            $type_formule      = $risque->formule;
            $code_formule      = $risque->fcode_formule;
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
            $code_activite     = $risque->code_activite;
            $activite_catnat   = Activite_catnat::all();
            $wilaya            = wilaya::all();
            $code_agence       = $devis->code_agence;
            $agences           = Agences::all();
            $agence_map        = Agences::where('id', $code_agence)->first();
            $adresse           = $risque->adresse;
            $etage             = $risque->etage;
            $nbr_piece         = $risque->nombre_piece;
            $proprietaire      = $risque->proprietaire;

            $commune_selected  = commune::where('code_commune', $commune_selected)->first();
            $wilaya_selected   = wilaya::where('code_wilaya', $wilaya_selected)->first();


            $assure = Assure::where('id_devis', $devis->id)->first();

            $user_wilaya = wilaya::where('code_wilaya', $user->wilaya)->first();
            $user_commune = commune::where('code_commune', $user->commune)->first();

            return view('produits.catnat.devis_catnat', compact('date_souscription', 'date_eff', 'date_exp', 'type_formule', 'wilaya_selected', 'commune_selected', 'surface', 'wilaya', 'anne_cont', 'reg_para', 'appartient', 'type_const', 'val_assur', 'permis', 'Contenant', 'equipement', 'marchandise', 'contenu', 'act_reg', 'reg_com', 'loca', 'prime_total', 'agences', 'agence_map', 'id', 'code_agence', 'user_wilaya', 'user_commune', 'assure', 'profession', 'civilite', 'adresse', 'etage', 'nbr_piece', 'proprietaire', 'code_activite', 'activite_catnat'));
        } else {
            return view('welcome');
        }
    }

    public function delete_devis(Request $request, $id)
    {

        $devi = devis::find($id);
        $devi->delete();

        return view('delete_devis');
    }

    public function contrat_mrh($id)
    {


        $devis = devis::find($id);
        $risque = Rsq_Immobilier::where('code_devis', $devis->id)->first();
        $prime = Prime::where('id_devis', $devis->id)->get();
        $user = auth::user();
        $agence = Agences::where('Name', $devis->code_agence)->first();
        $assure = Assure::where('id_devis', $devis->id)->first();

        return view('produits.mrh.resultat', compact('user', 'devis', 'risque', 'agence', 'prime', 'assure'));
    }

    public function contrat_catnat($id)
    {


        $devis = devis::find($id);
        $risque = Rsq_Immobilier::where('code_devis', $devis->id)->first();
        $prime = Prime::where('id_devis', $devis->id)->get();
        $user = auth::user();
        $agence = Agences::where('Name', $devis->code_agence)->first();
        $assure = Assure::where('id_devis', $devis->id)->first();

        return view('produits.catnat.resultat', compact('user', 'devis', 'risque', 'agence', 'prime', 'assure'));
    }

    public function generate_pdf($id)
    {

        $devis = devis::find($id);
        $risque = Rsq_Immobilier::where('code_devis', $devis->id)->first();
        $prime = Prime::where('id_devis', $devis->id)->get();
        $user = auth::user();
        $assure = Assure::where('id_devis', $devis->id)->first();

        $agence = Agences::where('Name', $devis->code_agence)->first();


        if ($devis->type_assurance == 'Multirisques Habitation') {
            $pdf = PDF::loadView('pdf.mrh', compact('user', 'devis', 'risque', 'agence', 'prime', 'assure'));
        } elseif ($devis->type_assurance == 'Catastrophe Naturelle') {
            $pdf = PDF::loadView('pdf.catnat', compact('user', 'devis', 'risque', 'agence', 'prime', 'assure'));
        }
        return $pdf->stream();
    }
}
