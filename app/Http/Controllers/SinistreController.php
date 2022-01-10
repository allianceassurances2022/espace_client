<?php

namespace App\Http\Controllers;

use App\CodeAssureParrain;
use App\DossierSinistre;
use App\marque;
use App\Categorie_permis;
use App\DossierVehicule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use \Illuminate\Http\UploadedFile;


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
        // dd($url);
        $response = Http::contentType("application/json")
            ->send('GET', $url)
            ->json();

        $codeAssures = $response;

        return $codeAssures;
    }



    public function getData(Request $request)
    {
       

        $num_polices = $request->num_police;

        $num_polices = str_replace(' ', '', $num_polices);

        // dd($num_polices);

        $vehicule = DossierVehicule::where('num_police',  1000001460443)->first();
        $sinistre = DossierSinistre::where('num_police',  1000001460443)->first();

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
       
        $vehicule1 =   [
            "account_id"                => 1,
            "num_police"                => $request->num_police,
            "car_serial"                => "6571465461846",
            "societe_assurance"         => "ALLIANCE ASSURANCE",
            "contrat_debut"             =>  $request->contrat_debut,
            "contrat_fin"               => $request->contrat_fin,
            "came_from"                 => $request->came_from,
            "go_to"                     => $request->go_to,
            "date_cond"                 => $request->date_cond,
            "permis"                    => $request->permis,
            "num_permis_proprietaire"   => $request->permis,
            "nom_proprietaire"          => $request->name,
            "prenom_proprietaire"       => $request->prenom,
            "address_proprietaire"      => $request->adress,
            "profession_proprietaire"   => $request->profession,
            "tel_proprietaire"          => "0546982365",
            "model"                     => $request->modele,
            "marque"                    => $request->marque,
            "immatriculation"           => $request->matricule,
            "nom_conducteur"            => $request->name_cond,
            "prenom_conducteur"         => $request->prenom_cond,
            "adresse_conducteur"        => $request->adress_cond,
            "tel_conducteur"            =>  "0552204156",
            "num_permis_conducteur"     => $request->permis,
            "date_permis_conducteur"    => $request->deliver,
            "date_permis_proprietaire"  => $request->deliver,
            "categorie_conducteur"      => $request->categorie,
            "degat_conducteur"          => "test",

        ];

        $vehicule2 = [
            "account_id"                => 1,
            "num_police"                => $request->num_police_adv,
            "societe_assurance"         => $request->societe_assurance_adv,
            "contrat_debut"             => $request->contrat_debut_adv,
            "contrat_fin"               => $request->contrat_fin_adv,
            "came_from"                 => $request->came_from,
            "go_to"                     => $request->go_to,
            "nom_proprietaire"          => $request->name_adv,
            "prenom_proprietaire"       => $request->prenom_adv,
            "address_proprietaire"      => $request->adress_adv,
            "profession_proprietaire"   => $request->profession_adv,
            "num_permis_proprietaire"   => $request->permis,
            "marque"                    => "",
            "immatriculation"           => "",
            "nom_conducteur"            => $request->name_cond_adv,
            "prenom_conducteur"         => $request->prenom_cond_adv,
            "adresse_conducteur"        => $request->adress_cond_adv,
            "tel_conducteur"            => "056326541",
            "num_permis_conducteur"     => $request->permis_adv,
            "date_permis_conducteur"    => $request->deliver_adv,
            "date_permis_proprietaire"  => $request->deliver,
            "categorie_conducteur"      => $request->categorie_adv,
            "degat_conducteur"          => "",
            "car_serial"                => ""

        ];
        $id = $this->guidv4();
        $data = [
            "id"                        => $id,
            "account_id"                => 1,
            "user_id"                   => "",
            "accident_date"             => $request->date_accident,
            "accident_time"             => $request->heure_accident,
            "accident_place"            => $request->lieu_accident,
            "came_from"                 => $request->came_from,
            "go_to"                     => $request->go_to,
            "comment"                   => $request->comment,
            "isGendarmerie"             => $request->brigade,
            "isPolice"                  => $request->police,
            "brigade"                   => $request->brigade,
            "isVol"                     => $request->vol,
            "num_serie_type"            => $request->num_serie_type,
            "isPledged"                 => $request->gager,
            "nom_organism"              => $request->nom_organism,
            "adress_organism"           => $request->adress_organism,
            "isHeavyWeights"            => $request->isHeavyWeights,
            "attele"                    => $request->attele,
            "poids_charge_second"       => $request->poids_charge_second,
            "num_imma_charge"           => $request->num_imma_charge,
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
            "type_paiement"             => $request->type_paiment,
            "facon_paiement"            => $request->facon_paiement
        ];
       
        if (!is_null($request->myfile1)) {
            $file = $request->file('myfile1');
            $filename = $id . '_RIB.' . $file->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/Documents/Import');
            $file_saved = $file->move($destinationPath, $filename);
        }

        if (!is_null($request->myfile)) {
            $file = $request->file('myfile');
            $filename = $id . '.' . $file->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/Documents/Import');

            $file_saved = $file->move($destinationPath, $filename);
        }
      
        $url = 'https://epaiement.allianceassurances.com.dz/public/api/create_sinistre';
        $response = Http::contentType("application/json")
            ->send('POST', $url, ['body' => json_encode($data)])
            ->json();


        return view('sinistre.validation', compact('response'));
    }

    function guidv4()
    {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        return vsprintf('%s%s', str_split(bin2hex($data), 4));
    }

    public function 
}
