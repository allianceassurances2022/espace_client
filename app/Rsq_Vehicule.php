<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsq_Vehicule extends Model
{
    protected $fillable = ['matricule','marque','modele','annee_mise_circulation','date_conducteur', 'date_permis',
    'wilaya_obtention', 'puissance', 'usage', 'dure','code_formule','assistance','offre','valeur_vehicule',
    'personne_transporte','genre','num_chassis','type','couleur','permis_num','categorie','taxe','effet_taxe','code_devis','immatricule_a'];

    protected $table = 'rsq_vehicule';
}
