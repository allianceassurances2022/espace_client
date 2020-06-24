<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class liste_profession_table extends Model
{
    protected $fillable = ['code_profession', 'lib_professions'];
    
    protected $table = 'liste_professions';
}
