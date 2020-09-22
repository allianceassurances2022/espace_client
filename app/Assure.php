<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assure extends Model
{
    protected $fillable = ['code_assure',    'nom',    'prenom',    'code_wilaya',    'date_naissance',    'telephone',    'mail',    'profession',    'sexe', 'date_permis', 'code_activite'];
    
    protected $table = 'assure';

}
