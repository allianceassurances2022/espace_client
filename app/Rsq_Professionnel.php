<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsq_Professionnel extends Model
{
    protected $fillable = ['code_risque_pro',    'situation_risque',    'code_activite_pro',    'statut_bien_materiel',    'superficie',    'nbr_employe',    'valeur_contenu_pro',    'valeur_vitrage',    'vol', 'degat_eaux', 'dommage_electrique', 'intoxication', 'refoulement_egouts', 'vol_coffre', 'vol_personne','dommage_cause_enseignes'];
    
    protected $table = 'rsq_professionnel';
}
