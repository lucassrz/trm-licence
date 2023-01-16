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
        Schema::create('discipline_matiere', function (Blueprint $table) {
            $table->id();
            $table->integer('id_code_discipline');
            $table->integer('id_matiere');
            $table->timestamps();
            $table->foreign('id_code_discipline')->references('id')->on('code_discipline');
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
        Schema::dropIfExists('discipline_matiere');
    }
};
