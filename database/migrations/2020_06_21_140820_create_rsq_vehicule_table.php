<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsqVehiculeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsq_vehicule', function (Blueprint $table) {
            $table->id();
            $table->string('matricule',20);
            $table->string('immatricule_a')->nullable();
            $table->string('marque',50);
            $table->string('modele',50);
            $table->string('annee_mise_circulation',4);
            $table->Date('date_conducteur');
            $table->Date('date_permis');
            $table->string('wilaya_obtention');
            $table->string('puissance',10);
            $table->string('usage',10);
            $table->string('dure',10);
            $table->string('code_formule',10);
            $table->string('assistance',20);
            $table->string('offre',10);
            $table->float('valeur_vehicule', 20, 2);
            $table->string('personne_transporte',10);
            $table->string('genre',10);
            $table->string('num_chassis',50);
            $table->string('type',50);
            $table->string('couleur',50);
            $table->string('permis_num',50);
            $table->string('categorie',50);
            $table->boolean('taxe');
            $table->Date('effet_taxe')->nullable();
            $table->string('code_devis')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rsq_vehicule');
    }
}
