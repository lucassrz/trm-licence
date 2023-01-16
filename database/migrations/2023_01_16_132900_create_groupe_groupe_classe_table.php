<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupe_groupe_classe', function (Blueprint $table) {
            $table->id();
            $table->integer('id_groupe');
            $table->integer('id_groupe_classe');
            $table->timestamps();
            $table->foreign('id_groupe')->references('id')->on('groupe');
            $table->foreign('id_groupe_classe')->references('id')->on('groupe_classe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupe_groupe_classe');
    }
};
