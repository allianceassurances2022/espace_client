<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prime extends Model
{
  protected $fillable = ['id', 'code', 'libelle', 'valeur','id_devis'];

  protected $table = 'prime';
}
