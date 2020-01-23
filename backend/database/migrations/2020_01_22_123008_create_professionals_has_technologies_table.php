<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalsHasTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals_has_technologies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('professionals_id');
            $table->foreign('professionals_id')->references('id')->on('professionals');
            $table->unsignedBigInteger('technologies_id');
            $table->foreign('technologies_id')->references('id')->on('technologies');
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
        Schema::dropIfExists('professionals_has_technologies');
    }
}
