<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsGroupesTdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants_groupes_tds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etudiant_id');
            $table->unsignedBigInteger('groupe_td_id');
            $table->timestamps();
            $table->foreign('etudiant_id')
                    ->references('id')
                    ->on('etudiants')
                    ->onDelete('cascade');
            $table->foreign('groupe_td_id')
                    ->references('id')
                    ->on('groupe_tds')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants_groupes_tds');
    }
}
