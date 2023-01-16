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
        Schema::create('enseignant', function (Blueprint $table) {
            $table->id();
            $table->integer('id_etablissement');
            $table->integer('id_discipline');
            $table->string('nom');
            $table->string('prenom');
            $table->integer('id_status');
            $table->timestamps();
            $table->foreign('id_etablissement')->references('id')->on('etablissement');
            $table->foreign('id_discipline')->references('id')->on('discipline');
            $table->foreign('id_status')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enseignant');
    }
};
