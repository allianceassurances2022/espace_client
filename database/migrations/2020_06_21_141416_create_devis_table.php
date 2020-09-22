<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->string('code_devis')->nullable();
            $table->date('date_souscription')->nullable();
            $table->date('date_effet')->nullable();
            $table->date('date_expiration')->nullable();
            $table->string('code_assure')->nullable();
            $table->string('code_risque')->nullable();
            $table->string('code_formule')->nullable();
            $table->date('date_devis')->nullable();
            $table->date('code_epaiement')->nullable();
            $table->float('montan_epaiement')->nullable();
            $table->date('date_epaiement')->nullable();
            $table->string('statut_devis')->nullable();
            $table->text('periode')->nullable();
            $table->float('prime_total')->nullable();
            $table->string('code_agence')->nullable();
            $table->Integer('id_user');
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
        Schema::dropIfExists('devis');
    }
}
