<?php

namespace App\Http\Controllers;

use App\CodeAssureParrain;
use App\DossierSinistre;
use App\marque;
use App\Categorie_permis;
use App\DossierVehicule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class SinistreController extends Controller
{
    public function index_sinistre()
    {

        return view('sinistre.declaration');
    }

    public function logged()
    {
        return view('');
    }

    public function index(Request $request)
    {

        $marques = marque::all();
        $categories = categorie_permis::all();


        if (Auth::user()) {

            return view('sinistre.logged', compact('categories'));
        } else {
            return view('sinistre.not_logged', compact('marques', 'categories'));
        }
    }


    public function getSinistres()
    {

        $user_id = Auth::user()->id;

        $dataAssure = CodeAssureParrain::where('id_user', $user_id)->get();
        $codeAssures = $dataAssure->pluck('code_assure');
        $codeAssures =  $codeAssures->join("','");

        $url = "https://epaiement.allianceassurances.com.dz/public/api/get_police?code=('" . $codeAssures . "')";
        $response = Http::contentType("application/json")
            ->send('GET', $url)
            ->json();


        $codeAssures = $response;

        return $codeAssures;
        // dd($codeAssures[0]['REFERENCE']);

        //    $dataAssure = DossierSinistre::where('user_id', $user_id)->get();
        //    $codeAssures = $dataAssure->pluck('num_police');


        // $request->session()->put('cookies', $response);

        // dd($request);
    }



    public function getData(Request $request)
    {

        // $user_id = Auth::user()->id;

        $num_polices = $request->num_police;

        $num_polices = str_replace(' ', '', $num_polices);

        $vehicule = DossierVehicule::where('num_police', 160832111000044)->first();
        $sinistre = DossierSinistre::where('num_police', 160832111000044)->first();

        $data1 = $vehicule->toArray();
        $data2 = $sinistre->toArray();

        $data = array();
        $data = [
            'num_police' => $num_polices,
            'data1' => $data1,
            'data2' => $data2,
        ];


        return $data;
    }

    public function getPolice()
    {

        $user_id = Auth::user()->id;
        $num_assure = CodeAssureParrain::where('id_user', $user_id)->get();
        $num_assure = $num_assure->pluck('code_assure');

        foreach ($num_assure as $assure) {

            $url = "https://epaiement.allianceassurances.com.dz/public/api/get_police?code=('" . $assure . "')";
            $response = Http::contentType("application/json")
                ->send('GET', $url)
                ->json();
        }
    }

    public function declare_sinistre(Request $request)
    {

        dd($request);

        $vehicule1 =   [
            "account_id"                => 1,
            "num_police"                => $request->num_police,
            "car_serial"                => "6571465461846",
            "societe_assurance"         => "ALLIANCE ASSURANCE",
            "contrat_debut"             => $request->contrat_debut,
            "contrat_fin"               => $request->contrat_fin,
            "nom_proprietaire"          => $request->name,
            "prenom_proprietaire"       => $request->prenom,
            "address_proprietaire"      => $request->adress,
            "profession_proprietaire"   => $request->profession,
            "num_permis_proprietaire"   => "",
            "date_permis_proprietaire"  => "",
            "tel_proprietaire"          => "0546982365",
            "model"                     => $request->modele,
            "marque"                    => $request->marque,
            "immatriculation"           => $request->matricule,
            "nom_conducteur"            => $request->name_cond,
            "prenom_conducteur"         => $request->prenom_cond,
            "adresse_conducteur"        => $request->adress_cond,
            "tel_conducteur"            => "054263985",
            "num_permis_conducteur"     => $request->permis,
            "date_permis_conducteur"    => $request->deliver,
            "categorie_conducteur"      => $request->categorie,
            "degat_conducteur"          => "test",

        ];

        $vehicule2 = [
            "account_id"                => 1,
            "num_police"                => $request->num_police_adv,
            "societe_assurance"         => $request->societe_assurance_adv,
            "contrat_debut"             => $request->contrat_debut_adv,
            "contrat_fin"               => $request->contrat_fin_adv,
            "nom_proprietaire"          => $request->name_adv,
            "prenom_proprietaire"       => $request->prenom_adv,
            "address_proprietaire"      => $request->adress_adv,
            "profession_proprietaire"   => $request->profession_adv,
            "marque"                    => "",
            "immatriculation"           => "",
            "nom_conducteur"            => $request->name_cond_adv,
            "prenom_conducteur"         => $request->prenom_cond_adv,
            "adresse_conducteur"        => $request->adress_cond_adv,
            "tel_conducteur"            => "056326541",
            "num_permis_conducteur"     => $request->permis_adv,
            "date_permis_conducteur"    => $request->deliver_adv,
            "categorie_conducteur"      => $request->categorie_adv,
            "degat_conducteur"          => "",
            "car_serial"                => ""

        ];

        $data = [
            "account_id"                => 1,
            "user_id"                   => "",
            "isGendarmerie"             => $request->brigade,
            "isPolice"                  => $request->police,
            "brigade"                   => $request->brigade,
            "isVol"                     => $request->vol,
            "num_serie_type"            => $request->num_serie_type,
            "isPledged"                 => $request->gager,
            "nom_organism"              => $request->nom_organism,
            "adress_organism"           => $request->adress_organism,
            "lourd"                     => $request->lourd,
            "attele"                    => $request->attele,
            "poids_charge_second"       => $request->poids_charge_second,
            "num_imma_charge"           => $request->num_imma_charge,
            "poids_charge_second"       => $request->poids_charge_second,
            "assurance_second"          => $request->assurance_second,
            "n_police_second"           => $request->n_police_second,
            "degat"                     => $request->degat,
            "nature"                    => $request->nature,
            "nom_nature"                => $request->nom_nature,
            "adress_nature"             => $request->adress_nature,
            "blesse"                    => $request->blesse,
            "nbr_hurts"                 => $request->nmbr_blesse,
            "vehicle1"                  => $vehicule1,
            "vehicle2"                  => $vehicule2,
            "type_paiment"              => $request->type_paiment
        ];

        $data = json_encode($data);

        //  dd($data);

        /*   
        $url = "https://epaiement.allianceassurances.com.dz/public/api/create_sinistre";
        $response = Http::contentType("application/json")
            ->send('POST', $url, ['body' => $data])
            ->json();
*/
        $url = 'https://epaiement.allianceassurances.com.dz/public/api/create_sinistre';
        $response = Http::contentType("application/json")
            ->send('POST', $url, ['body' => $data])
            ->json();

        // dd($response);

        return view('sinistre.validation', compact('response'));

        //  $num_agence = substr($data['vehicle1'], 0, 4);
        //    dd(substr($data['num_police'], 0, 4));

        /*  $client = new \GuzzleHttp\Client();
        $client->post(
            'http://epaiement.local/api/create_sinistre',
            array(
                'form_params' => $data
            )
        );


        dd($client);
        */
    }
}
