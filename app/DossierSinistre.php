<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DossierSinistre extends Model
{
    protected $fillable = ['id', 'account_id', 'user_id', 'date_declaration','num_police', 'date_acc', 'time_acc', 'lieu_acc', 'came_from', 'go_to', 'comment', 'gendarmerie', 'police', 'brigade', 'steal', 'num_serial', 'gage', 'lourd', 'vol', 'attele', 'car_serial', 'contrat_debut', 'contrat_fin', 'degats', 'natures', 'hurts', 'nbr_hurts', 'statut', 'note', 'reference_police', 'created_at', 'updated_at'];

    protected $table = 'dossiers_sinistre';

}


