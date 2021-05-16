<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Doctor;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doc_id');
            $table->unsignedBigInteger('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('phone_num');
            $table->string('fax_num');
            $table->text('comment')->nullable();
            $table->string('img')->nullable();
            $table->boolean('gender');
            $table->boolean('is_valid')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
