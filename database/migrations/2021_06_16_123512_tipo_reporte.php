<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoReporte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('TipoReporte', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('version')->unsigned()->nullable();
            $table->integer('Num')->unsigned()->nullable();
            $table->string('TipoReporte', 250)->unique();
            $table->string('Modulo', 250)->nullable();
            $table->string('Titulo', 800)->nullable();
            $table->string('NombreArchivo', 800)->nullable();
            $table->text('Parametros')->nullable();
            $table->text('Definicion')->nullable();
            $table->string('Origen')->nullable(); //jasper, excel, txt, otro a implementar
            $table->boolean('Activo')->default(true);

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
        //
        Schema::dropIfExists('TipoReporte');
    }
}
