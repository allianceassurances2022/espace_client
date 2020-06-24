<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class devis extends Model
{
    protected $fillable = ['code_devis', 'code_assure', 'code_risque', 'code_formule' ,'date_devis','code_epaiement','montan_epaiement','date_epaiement','statut_devis','periode'];
    
    protected $table = 'devis';
}
