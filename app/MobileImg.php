<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileImg extends Model
{
    protected $fillable = ['id', 'title', 'url'];

    protected $table = 'mobile_image';
}
