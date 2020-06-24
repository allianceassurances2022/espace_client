<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wilaya extends Model
{
    protected $fillable = ['code_wilaya', 'nlib_wilaya', 'zone'];
    
    protected $table = 'wilaya';
}
