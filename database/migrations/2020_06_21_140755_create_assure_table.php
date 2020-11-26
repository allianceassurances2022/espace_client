<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assure', function (Blueprint $table) {
            $table->id();
            $table->string('code_assure',20);
            $table->string('nom',100);
            $table->string('prenom',100);
            $table->string('code_wilaya',2);
            $table->Date('date_naissance');
            $table->string('telephone',50);
            $table->string('mail',100);
            $table->string('profession',100);
            $table->string('sexe',10);
            $table->Date('date_permis');
            $table->string('code_activite',10);
            $table->string('id_devis');
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
        Schema::dropIfExists('assure');
    }
}
