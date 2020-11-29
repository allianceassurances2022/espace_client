<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie_permis extends Model
{
    protected $fillable = ['code', 'libelle'];

    protected $table = 'categorie_permis';
}
