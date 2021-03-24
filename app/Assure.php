<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assure extends Model
{
    protected $fillable = ['code_assure',    'nom',    'prenom',    'code_wilaya', 'code_commune','lieu_naissance',   'date_naissance',    'telephone', 'adresse',   'mail',    'profession',
    'sexe', 'date_permis', 'code_activite', 'id_devis'];

    protected $table = 'assure';

}
