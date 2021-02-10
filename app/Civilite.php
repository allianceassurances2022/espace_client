<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Civilite extends Model
{
    protected $fillable = ['code', 'libelle','abreveation'];

    protected $table = 'civilite';
}
