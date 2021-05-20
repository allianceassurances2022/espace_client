<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeAssureParrain extends Model
{
    protected $fillable = ['code_assure', 'id_user'];

    protected $table = 'code_assure_parrain';
}
