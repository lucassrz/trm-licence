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
        Schema::create('referenciel_matiere', function (Blueprint $table) {
            $table->id();
            $table->integer('id_referenciel');
            $table->integer('id_matiere');
            $table->integer('heure');
            $table->timestamps();
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
        Schema::dropIfExists('referenciel_matiere');
    }
};
