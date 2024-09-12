<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EscalafonMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Escalafon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Escalafon', 250)->nullable();
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
        Schema::dropIfExists('Escalafon');
    }
}
