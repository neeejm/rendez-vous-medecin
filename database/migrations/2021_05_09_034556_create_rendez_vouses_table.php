<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezVousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendez_vous', function (Blueprint $table) {
            $table->id('rv_id');
            $table->unsignedBigInteger('doc_id');
            $table->unsignedBigInteger('tar_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('dt_id');
            $table->text('reasons');
            $table->text('doc_detail');
            $table->integer('state');
            $table->foreign('doc_id')->references('doc_id')->on('doctors')->onDelete('cascade');
            $table->foreign('tar_id')->references('tar_id')->on('tarifs')->onDelete('cascade');
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade');
            $table->foreign('dt_id')->references('dt_id')->on('calendars')->onDelete('cascade');
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
        Schema::dropIfExists('rendez_vouses');
    }
}
