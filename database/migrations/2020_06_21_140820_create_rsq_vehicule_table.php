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
            $table->string('code_assure',20);
            $table->string('matricule',20);
            $table->string('marque',50);
            $table->string('modele',50);
            $table->Date('annee_mise_circulation');
            $table->string('puissance',10);
            $table->string('usage',10);
            $table->float('valeur_vehicule', 10, 2);
            $table->string('code_formule',10);
            $table->string('personne_transporte',10);
            $table->string('genre',10);
            $table->boolean('taxe');
            $table->Date('effet_taxe');
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
