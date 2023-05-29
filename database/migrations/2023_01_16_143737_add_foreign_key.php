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
        Schema::table('classe', function (Blueprint $table) {
            $table->foreign('id_referenciel')->references('id')->on('referenciel');
        });

        Schema::table('discipline_matiere', function (Blueprint $table) {
            $table->foreign('id_discipline')->references('id')->on('discipline');
            $table->foreign('id_matiere')->references('id')->on('matiere');
        });

        Schema::table('enseignant', function (Blueprint $table) {
            $table->foreign('id_discipline')->references('id')->on('discipline');
            $table->foreign('id_status')->references('id')->on('status');
        });

        Schema::table('groupe', function (Blueprint $table) {
            $table->foreign('id_matiere')->references('id')->on('matiere');
            $table->foreign('id_enseignant')->references('id')->on('enseignant');
        });

        Schema::table('groupe_classe', function (Blueprint $table) {
            $table->foreign('id_classe')->references('id')->on('classe');
        });

        Schema::table('groupe_groupe_classe', function (Blueprint $table) {
            $table->foreign('id_groupe')->references('id')->on('groupe');
            $table->foreign('id_groupe_classe')->references('id')->on('groupe_classe');
        });

        Schema::table('referenciel_matiere', function (Blueprint $table) {
            $table->foreign('id_referenciel')->references('id')->on('referenciel');
            $table->foreign('id_matiere')->references('id')->on('matiere');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
