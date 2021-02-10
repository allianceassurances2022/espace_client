<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsageAuto extends Model
{
    protected $fillable = ['code', 'libelle','abreveation'];

    protected $table = 'usageauto';
}
