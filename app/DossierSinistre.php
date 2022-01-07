<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DossierSinistre extends Model
{
<<<<<<< HEAD
    protected $fillable = ['id', 'account_id', 'user_id', 'au_volant', 'cond_reside', 'is_validate', 'date_declaration', 'num_police', 'date_acc', 'time_acc', 'lieu_acc', 'came_from', 'go_to', 'comment', 'gendarmerie', 'police', 'brigade', 'steal', 'num_serial', 'gage', 'lourd', 'vol', 'attele', 'car_serial', 'contrat_debut', 'contrat_fin', 'degats', 'natures', 'hurts', 'nbr_hurts', 'statut', 'note', 'reference_police', 'created_at', 'updated_at'];
=======
    protected $fillable = ['id', 'account_id', 'user_id', 'date_declaration','num_police', 'date_acc', 'time_acc', 'lieu_acc', 'came_from', 'go_to', 'comment', 'gendarmerie', 'police', 'brigade', 'steal', 'num_serial', 'gage', 'lourd', 'vol', 'attele', 'car_serial', 'contrat_debut', 'contrat_fin', 'degats', 'natures', 'hurts', 'nbr_hurts', 'statut', 'facon_paiement', 'type_paiement', 'note', 'reference_police', 'created_at', 'updated_at'];
>>>>>>> 467a737967ae7d88e44ea14217a18baaf3b17b54

    protected $table = 'dossiers_sinistre';
}
