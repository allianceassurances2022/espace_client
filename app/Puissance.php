<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puissance extends Model
{
    protected $fillable = ['code', 'libelle'];

    protected $table = 'puissance';
}
