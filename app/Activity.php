<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['code', 'libelle', 'abreveation'];

    protected $table = 'activite';

}
