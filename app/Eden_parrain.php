<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Eden_parrain extends Model
{


    protected $connection = 'mysql';

    protected $fillable = ['code_parrain', 'points'];

    protected $table = 'eden_parrain';
}
