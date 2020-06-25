<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marque extends Model
{
    
    protected $fillable = ['code_marque', 'lib_marque'];
    
    protected $table = 'marques';
}
