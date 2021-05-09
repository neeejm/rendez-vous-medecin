<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_files', function (Blueprint $table) {
            $table->id('df_id');
            $table->unsignedBigInteger('rv_id');
            $table->string('file');
            $table->foreign('rv_id')->references('rv_id')->on('rendez_vous')->onDelete('cascade');
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
        Schema::dropIfExists('detail_files');
    }
}
