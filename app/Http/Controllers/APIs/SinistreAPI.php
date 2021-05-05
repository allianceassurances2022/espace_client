<?php

namespace App\Http\Controllers\APIs;

use App\Agences;
use App\DossierSinistre;
use App\DossierVehicule;
use Illuminate\Http\Request;

class SinistreAPI
{

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
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public function createSinistre(Request $request)
    {


        $data = $request->json()->all();
        $id = $this->guidv4();

        $this->createDossier($data, $id);
        $this->createVehicule($data['vehicle1'], $id);

        if (!is_null($data['vehicle2'])) {
            if ($this->isNotEmptyVehicule($data['vehicle2'])) {
                $this->createVehicule($data['vehicle2'], $id);
            }
        }

        $this->getEmail($data);

        print_r(true);
    }

    public function getAllDossierSinistre()
    {

        header("Access-Control-Allow-Origin: *");
        $dossiers = DossierSinistre::all()->toArray();
        $data = json_encode($dossiers);
        print_r($data);
    }

    public function createDossier($data, $id)
    {
        $al_dossier = DossierSinistre::create([
            'id' => $id,
            'account_id' => $data['account_id'],
            'num_police' => $data['vehicle1']['num_police'],
            'user_id' => $data['user_id'],
            'date_acc' => $data['accident_date'],
            'time_acc' => $data['accident_time'],
            'lieu_acc' => $data['accident_place'],
            'came_from' => $data['came_from'],
            'go_to' => $data['go_to'],
            'comment' => $data['comment'],
            'gendarmerie' => $data['isGendarmerie'],
            'police' => $data['isPolice'],
            'gage' => $data['isPledged'],
            'lourd' => $data['isHeavyWeights'],
            'vol' => $data['isVol'],
            'degats' => $data['isDamage'],
            'hurts' => $data['isInjured'],
            'nbr_hurts' => $data['nbr_hurts'],
            'categorie' => $data['categorie'],

            /*           'created_at'=>$data['created_at'],
            'updated_at'=>$data['updated_at'], */
        ]);
    }



    public function createVehicule($data, $id)
    {
        $al_dossier = DossierVehicule::create([

            'account_id' => $data['account_id'],
            'num_police' => $data['num_police'],
            'car_serial' => $data['car_serial'],
            'contrat_debut' => $data['contrat_debut'],
            'contrat_fin' => $data['contrat_fin'],
            'modele' => $data['model'],
            'marque' => $data['marque'],
            'matricule' => $data['immatriculation'],
            'societe_assurance' => $data['societe_assurance'],
            'num_permis' => $data['num_permis_proprietaire'],
            'date_permis' => $data['date_permis_proprietaire'],
            'nom_proprietaire' => $data['nom_proprietaire'],
            'prenom_proprietaire' => $data['prenom_proprietaire'],
            'adresse_proprietaire' => $data['address_proprietaire'],
            'profession_proprietaire' => $data['profession_proprietaire'],
            'tel_proprietaire' => $data['tel_proprietaire'],
            'nom_conducteur' => $data['nom_conducteur'],
            'prenom_conducteur' => $data['prenom_conducteur'],
            'categorie_conducteur' => $data['categorie_conducteur'],
            'num_permis_conducteur' => $data['num_permis_conducteur'],
            'date_permis_conducteur' => $data['date_permis_conducteur'],
            'adresse_conducteur' => $data['adresse_conducteur'],
            'tel_conducteur' => $data['tel_conducteur'],
            'degat_conducteur' => $data['degat_conducteur'],
            'id_dossier' => $id,

        ]);
    }

    public function isNotEmptyVehicule($data)
    {

        if (($data['account_id'] != "")
            &&  ($data['num_police'] != "")
            &&  ($data['car_serial'] != "")
            &&  ($data['contrat_debut'] != "")
            &&  ($data['contrat_fin'] != "")
            &&  ($data['model'] != "")
            &&  ($data['marque'] != "")
            &&  ($data['matricule'] != "")
            &&  ($data['societe_assurance'] != "")
            &&  ($data['num_permis_proprietaire'] != "")
            &&  ($data['date_permis_proprietaire'] != "")
            &&  ($data['nom_proprietaire'] != "")
            &&  ($data['prenom_proprietaire'] != "")
            &&  ($data['address_proprietaire'] != "")
            &&  ($data['profession_proprietaire'] != "")
            &&  ($data['tel_proprietaire'] != "")
            &&  ($data['nom_conducteur'] != "")
            &&  ($data['prenom_conducteur'] != "")
            &&  ($data['categorie_conducteur'] != "")
            &&  ($data['num_permis_conducteur'] != "")
            &&  ($data['date_permis_conducteur'] != "")
            &&  ($data['adresse_conducteur'] != "")
            &&  ($data['tel_conducteur'] != "")
            &&  ($data['degat_conducteur'] != "")
        ) {
            return true;
        }
        return false;
    }

    public function getEmail($data)
    {

        $numero_agence = substr($data['num_police'], 0, 4);
        $numero_police = $data['num_police'];
        $agence = Agences::where('id', 'like', '%' . $numero_agence . '%')->get()->toArray();
        if ($agence != null) {
            // $email=$agence[0]['Mail'];
            $email = 'nbelkacemi@allianceassurances.com.dz';
            if (($email != null) && ($email != ''))
                $this->envoiMail($email, $numero_police);
        }
    }

    public function envoiMail($email, $numero_police)
    {
        if (($email !== '') && ($email !== null)) {

            $destinataire = $email;
            // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            $objet = 'Création sinistre'; // Objet du message 
            $message = 'Nous vous remercions de bien vouloir prendre en charge le sinistre n° ' . $numero_police;
            $headers = 'From: Alliance' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/';

            $success = mail($destinataire, $objet, $message, $headers);

            if (!$success) {
                $errorMessage = error_get_last();
                echo $errorMessage;
                // echo "Votre message n'a pas pu être envoyé";
            }
        }
    }
}
