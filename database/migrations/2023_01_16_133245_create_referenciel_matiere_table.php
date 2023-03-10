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
            $table->unsignedBigInteger('id_referenciel');
            $table->unsignedBigInteger('id_matiere');
            $table->integer('heure');
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
        Schema::dropIfExists('referenciel_matiere');
    }
};
