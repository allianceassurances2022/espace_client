<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $fillable = ['code', 'libelle','abreveation'];

    protected $table = 'profession';
}
