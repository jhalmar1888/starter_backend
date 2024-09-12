<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sexo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sexo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Sexo', 1)->unique();
            $table->string('Descripcion', 20)->nullable();

            $table->nullableTimestamps();
            $table->SoftDeletes();
            $table->string('CreatorUserName', 250)->nullable();
            $table->string('CreatorFullUserName', 250)->nullable();
            $table->string('CreatorIP', 250)->nullable();
            $table->string('UpdaterUserName', 250)->nullable();
            $table->string('UpdaterFullUserName', 250)->nullable();
            $table->string('UpdaterIP', 250)->nullable();
            $table->string('DeleterUserName', 250)->nullable();
            $table->string('DeleterFullUserName', 250)->nullable();
            $table->string('DeleterIP', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sexo');
    }
}
