<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agences extends Model
{
    protected $fillable = ['id','dr','Latitude','Longetude','Name','Type','Chef_Agence','wilaya','commune','Adresse','Tel','Fax','Mail'];

    protected $table = 'agences';
}
