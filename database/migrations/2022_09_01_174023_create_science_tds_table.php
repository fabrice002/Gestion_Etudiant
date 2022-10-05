<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScienceTdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('science_tds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('groupe_td_id');
            $table->unsignedBigInteger('charge_td_id');
            $table->string('intitule', 25);
            $table->mediumText('description');
            $table->date('date');
            $table->time('heureDebut');
            $table->time('heureFin');
            $table->string('salle', 20);
            $table->timestamps();
            $table->foreign('groupe_td_id')
                    ->references('id')
                    ->on('groupe_tds')
                    ->onDelete('cascade');
            $table->foreign('charge_td_id')
                    ->references('id')
                    ->on('charge_tds')
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
        Schema::dropIfExists('science_tds');
    }
}
