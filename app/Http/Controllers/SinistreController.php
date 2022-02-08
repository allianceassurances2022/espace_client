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
            "num_police"                => str_replace(' ', '', $request->police_numero),
            "car_serial"                => "6571465461846",
            "societe_assurance"         => "ALLIANCE ASSURANCE",
            "contrat_debut"             => $request->contrat_debut,
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
        }

        $url = 'https://epaiement.allianceassurances.com.dz/public/api/create_sinistre';
        $response = Http::contentType("application/json")
            ->send('POST', $url, ['body' => json_encode($data)])
            ->json();

        //Send Mail to user to validate the declaration 
        if (Auth::user()) {

            //  $email = Auth::user()->email;
            $email = "shariti@allianceassurances.com.dz";

            $numero_police = str_replace(' ', '', $request->police_numero);
            $information = "Circanstances de l'accident ";
            $this->envoiMail($email, $numero_police, $information);
        } else {
            print("not connected recuperation de l'email de la base AARIS");
        }



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
    /*   public function envoiMail($email, $numero_police, $information)
    {
        if (($email !== '') && ($email !== null)) {

            $destinataire = $email;
            // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            $objet = 'Création sinistre'; // Objet du message
            $message = 'Votre sinistre à bien été enregistré sous le numéro de police :' . $numero_police . '\n' . $information;

            $headers = 'From: Alliance' . "\r\n" .
                'Reply-To: webmaster@allianceassurances.com.dz' . "\r\n" .
                'X-Mailer: PHP/';

            $success = mail($destinataire, $objet, $message, $headers);

            if (!$success) {
                $errorMessage = error_get_last();
                echo $errorMessage;
                // echo "Votre message n'a pas pu être envoyé";

            }
        }
    }
*/
    public function envoiMail($email, $numero_police, $information)
    {
        if (($email !== '') && ($email !== null)) {

         //   $template_file = "../../../resources/views/layouts/mail_template.php";
            $template_file = '/app/Http/Controllers/mail_template.php';
            $destinataire = $email;

            $swap_var = array(
                "{SITE_ADDR}" => "https://www.heytuts.com",
                "{EMAIL_LOGO}" => "https://www.heytuts.com/images/logo_emailer.png",
                "{EMAIL_TITLE}" => "Send custom HTML emails with a PHP script!",
                "{CUSTOM_URL}" => "https://www.heytuts.com/web-dev/php/send-emails-with-php-from-localhost-with-sendmail",
                "{CUSTOM_IMG}" => "https://i1.wp.com/www.heytuts.com/wp-content/uploads/2019/05/thumbnail_Send-emails-with-php-from-localhost-with-SendMail.png",
                "{TO_NAME}" => "THEIR_NAME",
                "{TO_EMAIL}" => "this_person@their_website.com"
            );

            // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            $objet = 'Création sinistre'; // Objet du message        

            $headers = 'From: Alliance' . "\r\n" .
                'Reply-To: webmaster@allianceassurances.com.dz' . "\r\n" .
                'X-Mailer: PHP/';
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            //  $message = 'Votre sinistre à bien été enregistré sous le numéro de police :' . $numero_police . '\n' . $information;

            if (file_exists($template_file)) {
                $message = file_get_contents($template_file);
            } else {
                die("unable to locate the template file");
            }

            // search and replace for predefined variables, like SITE_ADDR, {NAME}, {lOGO}, {CUSTOM_URL} etc
            foreach (array_keys($swap_var) as $key){
                if (strlen($key) > 2 && trim($swap_var[$key]) != '')
                    $email_message = str_replace($key, $swap_var[$key], $email_message);
            }

          

            $success = mail($destinataire, $objet, $message, $headers);

            if (!$success) {
                $errorMessage = error_get_last();
                echo $errorMessage;
                // echo "Votre message n'a pas pu être envoyé";

            }
        }
    }
}
