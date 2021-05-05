<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['id', 'account_id', 'user_id', 'date_acc', 'time_acc', 'location_acc', 'comment', 'gendarmerie', 'police', 'brigade', 'driver', 'driver_adress', 'driver_birth', 'phone', 'steal', 'num_serial', 'gage', 'name_credit', 'addr_credit', 'lourd', 'weight_t', 'attele', 'car_serial', 'weight', 'num_police', 'degats', 'natures', 'name_pro', 'addr_pro', 'hurts', 'Nbr_hurts', 'date_file', 'reference_police', 'statut', 'note', 'nbr_mod', 'created_at', 'updated_at'];

    protected $table = 'file';

}


