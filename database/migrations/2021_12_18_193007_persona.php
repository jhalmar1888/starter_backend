<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Persona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Persona', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Sexo')->unsigned()->nullable();
            $table->integer('EstadoCivil')->unsigned()->nullable();
            $table->integer('GrupoSanguineo')->unsigned()->nullable();
            $table->integer('Fuerza')->unsigned()->nullable();
            $table->integer('Arma')->unsigned()->nullable();
            $table->integer('Departamento')->unsigned()->nullable();

            $table->integer('Grado')->unsigned()->nullable();
            $table->integer('Reparticion')->unsigned()->nullable();
            $table->integer('Cargo')->unsigned()->nullable();
            $table->integer('Especialidad')->unsigned()->nullable();


            $table->string('ApellidoPaterno',50)->nullable();
            $table->string('ApellidoMaterno',50)->nullable();
            $table->string('Nombres',250);
            $table->string('Persona',650);
            $table->string('CI',250)->nullable();
            $table->string('Foto', 250)->nullable();

            /* credenciales de acceso al sistema */
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->boolean('Activo')->default(false);
            $table->string('TokenLogin')->nullable();
            $table->rememberToken();

            /* campos para login con Office365 */
            $table->datetime('UltimoInicioSesion')->nullable();
            $table->string('SocialLogin', 50)->nullable();
            $table->string('SocialLoginId', 150)->nullable();
            $table->string('Avatar', 250)->nullable();

            $table->string('Office365Id', 150)->nullable();

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

            $table->foreign('Sexo')->references('id')->on('Sexo');
            $table->foreign('EstadoCivil')->references('id')->on('EstadoCivil');
            $table->foreign('GrupoSanguineo')->references('id')->on('GrupoSanguineo');
            $table->foreign('Fuerza')->references('id')->on('Fuerza');
            $table->foreign('Arma')->references('id')->on('Arma');
            $table->foreign('Departamento')->references('id')->on('Departamento');

            $table->foreign('Grado')->references('id')->on('Grado');
            $table->foreign('Reparticion')->references('id')->on('Reparticion');
            $table->foreign('Cargo')->references('id')->on('Cargo');
            $table->foreign('Especialidad')->references('id')->on('Especialidad');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Persona'); //
    }
}
