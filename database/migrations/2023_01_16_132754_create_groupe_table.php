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
        Schema::create('groupe', function (Blueprint $table) {
            $table->id();
            $table->integer('id_matiere');
            $table->integer('id_enseignant');
            $table->timestamps();
            $table->foreign('id_matiere')->references('id')->on('matiere');
            $table->foreign('id_enseignant')->references('id')->on('enseignant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupe');
    }
};
