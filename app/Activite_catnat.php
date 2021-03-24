<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite_catnat extends Model
{
    protected $fillable = ['code', 'libelle'];

    protected $table = 'activite_catnat';
}
