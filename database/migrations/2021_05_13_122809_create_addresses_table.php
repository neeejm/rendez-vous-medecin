<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id('adr_id');
            $table->unsignedBigInteger('doc_id');
            $table->unsignedBigInteger('ci_id');
            $table->string('address');
            $table->string('zip');
            $table->foreign('doc_id')->references('doc_id')->on('doctors')->onDelete('cascade');
            $table->foreign('ci_id')->references('ci_id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('addresses');
    }
}
