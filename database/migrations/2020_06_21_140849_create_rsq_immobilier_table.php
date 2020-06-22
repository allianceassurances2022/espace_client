<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsqImmobilierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsq_immobilier', function (Blueprint $table) {
            $table->id();
            $table->string('code_bien',10);
            $table->integer('etage');
            $table->float('superficie',10,2);
            $table->Date('annee_construction');
            $table->float('valeur_contenu', 10, 2);
            $table->float('valeur_equipement', 10, 2);
            $table->float('valeur_marchandise', 10, 2);
            $table->string('nature_activite',10);
            $table->string('construction',10);
            $table->string('type_habitation',10);
            $table->string('qualite_juridique',10);
            $table->float('montant_forfaitaire', 10, 2);
            $table->integer('nombre_piece');
            $table->string('terrasse',10);
            $table->string('code_zone',10);
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
        Schema::dropIfExists('rsq_immobilier');
    }
}
