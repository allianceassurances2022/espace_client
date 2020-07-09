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
            $table->string('code_bien',10)->nullable();
            $table->integer('etage')->nullable();
            $table->float('superficie',10,2)->nullable();
            $table->Date('annee_construction')->nullable();
            $table->float('valeur_contenu', 10, 2)->nullable();
            $table->float('valeur_equipement', 10, 2)->nullable();
            $table->float('valeur_marchandise', 10, 2)->nullable();
            $table->string('nature_activite',20)->nullable();
            $table->string('construction',20)->nullable();
            $table->string('type_habitation',20)->nullable();
            $table->string('qualite_juridique',20)->nullable();
            $table->float('montant_forfaitaire', 10, 2)->nullable();
            $table->integer('nombre_piece')->nullable();
            $table->string('terrasse',10)->nullable();
            $table->string('code_zone',10)->nullable();
            $table->text('adresse')->nullable();
            $table->integer('code_wilaya')->nullable();
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
