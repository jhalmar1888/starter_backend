<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sexo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Sexo')->insert(['Sexo' => 'F','Descripcion' => 'FEMENINO']);
        DB::table('Sexo')->insert(['Sexo' => 'M','Descripcion' => 'MASCULINO']);
    }
}
