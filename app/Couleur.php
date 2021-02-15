<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    protected $fillable = ['code', 'libelle','abreveation'];

    protected $table = 'couleur';
}
