<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agences extends Model
{
    protected $fillable = ['id','Latitude' ,'Longetude','Name','Type','Chef_Agence','Adresse','Tel','Fax','Mail'];
    
    protected $table = 'agences';
}
