<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garantie extends Model
{
    protected $fillable = ['code_garantie',    'lib_garantie',    'valeur',    'taux'];
    
    protected $table = 'garantie';
}
