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
        Schema::create('deviss', function (Blueprint $table) {
            $table->id();
            
            $table->string('code_devis');
            $table->string('code_assure');
            $table->string('code_risque');
            $table->string('code_formule');
            $table->date('date_devis');
            $table->date('code_epaiement');
            $table->float('montan_epaiement');
            $table->date('date_epaiement');
            $table->string('statut_devis');
            $table->text('periode');
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
        Schema::dropIfExists('deviss');
    }
}
