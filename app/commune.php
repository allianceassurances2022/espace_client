<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commune extends Model
{
    protected $fillable = ['code_commune',    'lib_commune'];
    
    protected $table = 'commune';
}
