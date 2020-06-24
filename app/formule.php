<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class formule extends Model
{
    protected $fillable = ['code_formule', 'libelle_formule', 'code_garantie', 'code_branche'];
    
    protected $table = 'formule';
}
