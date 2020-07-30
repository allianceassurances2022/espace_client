<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsq_Immobilier extends Model
{
    protected $fillable = ['code_bien', 'etage', 'superficie', 'annee_construction', 'valeur_contenu', 'valeur_equipement', 'valeur_marchandise', 'nature_activite',
                          'construction', 'type_habitation', 'qualite_juridique', 'montant_forfaitaire', 'nombre_piece', 'terrasse', 'code_zone', 'adresse', 'code_wilaya', 'code_commune',
                          'code_devis', 'reg_para','appartient','formule','valeur_assure','permis'];

    protected $table = 'rsq_immobilier';
}
