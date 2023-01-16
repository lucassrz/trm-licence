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
        Schema::create('classe', function (Blueprint $table) {
            $table->id();
            $table->integer('id_etablissement');
            $table->integer('id_referenciel');
            $table->string('libelle');
            $table->string('niveau');
            $table->integer('effectif');
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
        Schema::dropIfExists('classe');
    }
};
