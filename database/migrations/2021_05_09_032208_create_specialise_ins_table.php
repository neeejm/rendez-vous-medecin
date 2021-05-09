<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialiseInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialise_in', function (Blueprint $table) {
            $table->unsignedBigInteger('sp_id');
            $table->unsignedBigInteger('doc_id');
            // $table->foreign('sp_id')->references('sp_id')->on('specialities')->onDelete('cascade');
            // $table->foreign('doc_id')->references('doc_id')->on('doctors')->onDelete('cascade');
            $table->primary(['sp_id', 'doc_id']);
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
        Schema::dropIfExists('specialise_ins');
    }
}
