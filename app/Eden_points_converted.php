<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Eden_points_converted extends Model
{


    protected $connection = 'mysql';

    protected $fillable = ['code_assure', 'code_generated', 'points', 'is_validate'];

    protected $table = 'eden_points_converted';
}

