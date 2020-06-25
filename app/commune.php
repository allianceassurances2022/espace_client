<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commune extends Model
{
    protected $fillable = ['code_commune',    'lib_commune' ,'code_wilaya'];
    
    protected $table = 'communes';
}
