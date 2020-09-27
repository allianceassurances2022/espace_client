<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class devis extends Model
{
    protected $fillable = ['id','code_devis', 'code_assure', 'code_risque', 'code_formule' ,'date_devis', 'code_epaiement', 'montan_epaiement', 'date_epaiement',
    'statut_devis' ,'periode' ,'date_souscription' ,'date_effet' ,'date_expiration','prime_total','code_agence','id_user','prime_nette','tva','cp','td','fga','tg','tp','taxe_pollution'];

    protected $table = 'devis';

}
