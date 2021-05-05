<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historique_Iris extends Model
{
    protected $fillable = ['id','status' ,'message','id_devis'];

    protected $table = 'historique_iris';
}
