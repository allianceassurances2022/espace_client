<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class formule extends Model
{
    protected $fillable = ['id', 'class_id', 'branch_id', 'libelle', 'abreviation', 'created_at', 'updated_at'];
    
    protected $table = 'formules';
}
