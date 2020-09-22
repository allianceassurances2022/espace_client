<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsqProfessionnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsq_professionnel', function (Blueprint $table) {
            $table->id();
            $table->string('code_risque_pro',10);
            $table->string('situation_risque',10);
            $table->string('code_activite_pro',10);
            $table->Date('statut_bien_materiel');
            $table->integer('superficie');
            $table->integer('nbr_employe');
            $table->float('valeur_contenu_pro', 10, 2);
            $table->float('valeur_vitrage', 10, 2);
            $table->boolean('vol');
            $table->boolean('degat_eaux');
            $table->boolean('dommage_electrique');
            $table->boolean('intoxication');
            $table->boolean('refoulement_egouts');
            $table->boolean('vol_coffre');
            $table->boolean('vol_personne');
            $table->boolean('dommage_cause_enseignes');
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
        Schema::dropIfExists('rsq_professionnel');
    }
}
