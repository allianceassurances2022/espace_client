<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    protected $fillable = ['code', 'libelle','abreveation'];

    protected $table = 'assistance';
}
