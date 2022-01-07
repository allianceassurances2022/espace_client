<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DossierVehicule extends Model
{
    protected $fillable = ['id', 'account_id', 'num_police', 'came_from', 'go_to', 'categorie', 'modele', 'marque', 'matricule', 'coming', 'going_to', 'societe_assurance', 'police_declaration', 'attes_start', 'attes_end', 'num_permis', 'date_permis', 'categorie', 'degats', 'created_at', 'updated_at', 'nom_proprietaire', 'prenom_proprietaire', 'address_proprietaire', 'profession_proprietaire', 'tel_proprietaire', 'nom_conducteur', 'prenom_conducteur', 'address_conducteur', 'profession_conducteur', 'tel_conducteur', 'weight', 'id_dossier'];

    protected $table = 'dossier_vehicule';
}
