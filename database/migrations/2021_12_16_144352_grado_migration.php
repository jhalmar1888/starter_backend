<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GradoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Grado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Escalafon')->unsigned()->nullable();
            $table->string('Grado', 250)->nullable();
            $table->string('Descripcion', 800)->nullable();
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

            $table->foreign('Escalafon')->references('id')->on('Escalafon');
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
        Schema::dropIfExists('Grado');
    }
}
