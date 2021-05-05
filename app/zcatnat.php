<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class zcatnat extends Model
{
    protected $fillable = ['code_commune', 'zone'];
    
    protected $table = 'zcatnats';
}
