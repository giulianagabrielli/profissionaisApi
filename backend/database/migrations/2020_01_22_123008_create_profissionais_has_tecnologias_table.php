<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissionaisHasTecnologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissionais_has_tecnologias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profissionais_id');
            $table->foreign('profissionais_id')->references('id')->on('profissionais')->onDelete('cascade');;
            $table->unsignedBigInteger('tecnologias_id');
            $table->foreign('tecnologias_id')->references('id')->on('tecnologias')->onDelete('cascade');;
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
        Schema::dropIfExists('profissionais_has_tecnologias');
    }
}
