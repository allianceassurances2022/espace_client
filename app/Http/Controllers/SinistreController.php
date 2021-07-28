<?php

namespace App\Http\Controllers;

use App\CodeAssureParrain;
use App\DossierSinistre;
use Illuminate\Http\Request;
use App\DossierVehicule;
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

    public function index()
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;

            $dataAssure = CodeAssureParrain::where('id_user', $user_id)->get();
            $codeAssures = $dataAssure->pluck('code_assure');
            $codeAssures =  $codeAssures->join("','");

            $url = "https://epaiement.allianceassurances.com.dz/public/api/get_police?code=('" . $codeAssures . "')";
            $response = Http::contentType("application/json")
                ->send('GET', $url)
                ->json();


            $codeAssures = $response;
            dd($codeAssures);

            //    $dataAssure = DossierSinistre::where('user_id', $user_id)->get();
            //    $codeAssures = $dataAssure->pluck('num_police');


            return view('sinistre.logged', compact('codeAssures'));
        } else {
            return view('sinistre.not_logged');
        }
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


        // dd($num_assure->join(',  '));       
        //  $code = $num_assure->join(', ', ',');
        // $code = $num_assure->concat(['null']);
        foreach ($num_assure as $assure) {
            // dd($assure);
            $url = "https://epaiement.allianceassurances.com.dz/public/api/get_police?code=('" . $assure . "')";
            //  dd($url);
            $response = Http::contentType("application/json")
                ->send('GET', $url)
                ->json();

            dd($response);
        }
    }

    public function declare_sinistre(Request $request)
    {

        //  $data = $request;

        $vehicule1 =   [
            "account_id" => "",
            "num_police" => "160832111000044",
            "car_serial" => "6571465461846",
            "societe_assurance" => "ALLIANCE ASSURANCE",
            "contrat_debut" => "2021-07-14",
            "contrat_fin" => "2021-07-14",
            "nom_proprietaire" => "test",
            "prenom_proprietaire" => "test",
            "address_proprietaire" => "",
            "profession_proprietaire" => "test",
            "num_permis_proprietaire" => "",
            "date_permis_proprietaire" => "",
            "tel_proprietaire" => "0546982365",
            "model" => "", "marque" => "",
            "immatriculation" => "",
            "nom_conducteur" => "test",
            "prenom_conducteur" => "test",
            "adresse_conducteur" => "test",
            "tel_conducteur" => "054263985",
            "num_permis_conducteur" => "686879718",
            "date_permis_conducteur" => "2021-07-14",
            "categorie_conducteur" => "test",
            "degat_conducteur" => "test",
            "adresse_proprietaire" => "test",
            "model_vehicule" => "test",
            "marque_vehicule" => "test",
            "immatriculation_vehicule" => "65768656"
        ];

        $vehicule2 = [
            "account_id" => "",
            "num_police" => "",
            "societe_assurance" => "",
            "contrat_debut" => "",
            "contrat_fin" => "",
            "nom_proprietaire" => "",
            "prenom_proprietaire" => "",
            "address_proprietaire" => "",
            "profession_proprietaire" => "",
            "num_permis_proprietaire" => "24654684",
            "date_permis_proprietaire" => "2021-07-14",
            "tel_proprietaire" => "", "model" => "",
            "marque" => "", "immatriculation" => "",
            "nom_conducteur" => "",
            "prenom_conducteur" => "",
            "adresse_conducteur" => "",
            "tel_conducteur" => "056326541",
            "num_permis_conducteur" => "",
            "date_permis_conducteur" => "",
            "categorie_conducteur" => "",
            "degat_conducteur" => "",
            "car_serial" => ""

        ];

        $data = [
            "account_id" => "",
            "user_id" => "",
            "isGendarmerie" => 1,
            "isPolice" => 1,
            "isYourVehicule" => 1,
            "isPledged" => 0,
            "isVol" => 0,
            "isHeavyWeights" => 0,
            "isDamage" => 0,
            "isInjured" => 0,
            "nbr_hurts" => "",
            "categorie" => "",
            "came_from" => "test",
            "go_to" => "test",
            "accident_date" => "2021-07-14",
            "accident_time" => "09:57",
            "accident_place" => "test",
            "comment" => "test",
            "vehicle1" => $vehicule1,
            "vehicle2" => $vehicule2,
        ];

        $data = json_encode($data);

        //  dd($data);

        /*   
        $url = "https://epaiement.allianceassurances.com.dz/public/api/create_sinistre";
        $response = Http::contentType("application/json")
            ->send('POST', $url, ['body' => $data])
            ->json();
*/
        $url = 'http://epaiement.local/api/create_sinistre';
        $response = Http::contentType("application/json")
            ->send('POST', $url, ['body' => $data])
            ->json();

        dd($response);

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
