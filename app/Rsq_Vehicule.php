<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsq_Vehicule extends Model
{
    protected $fillable = ['code_assure',    'matricule',    'marque',    'modele',    'annee_mise_circulation',    'puissance',    'usage',    'valeur_vehicule',    'code_formule', 'personne_transporte', 'genre'];
    
    protected $table = 'rsq_vehicule';
}
