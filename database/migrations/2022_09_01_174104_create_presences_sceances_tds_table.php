<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesSceancesTdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences_sceances_tds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etudiant_id');
            $table->unsignedBigInteger('science_td_id');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('etudiant_id')
                    ->references('id')
                    ->on('etudiants')
                    ->onDelete('cascade');
            $table->foreign('science_td_id')
                    ->references('id')
                    ->on('science_tds')
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
        Schema::dropIfExists('presences_sceances_tds');
    }
}
