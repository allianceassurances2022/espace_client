<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dure extends Model
{
    protected $fillable = ['code', 'libelle'];

    protected $table = 'periode_assurance';
}
