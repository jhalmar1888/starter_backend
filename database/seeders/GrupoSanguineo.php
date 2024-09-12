<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoSanguineo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('GrupoSanguineo')->insert(['GrupoSanguineo' => 'AB Rh+','Descripcion' => 'AB Positivo']);
        DB::table('GrupoSanguineo')->insert(['GrupoSanguineo' => 'AB Rh-','Descripcion' => 'AB Negativo']);
        DB::table('GrupoSanguineo')->insert(['GrupoSanguineo' => 'A Rh+','Descripcion' => 'A Positivo']);
        DB::table('GrupoSanguineo')->insert(['GrupoSanguineo' => 'A Rh-','Descripcion' => 'A Negativo']);
        DB::table('GrupoSanguineo')->insert(['GrupoSanguineo' => 'B Rh+','Descripcion' => 'B Positivo']);
        DB::table('GrupoSanguineo')->insert(['GrupoSanguineo' => 'B Rh-','Descripcion' => 'B Negativo']);
        DB::table('GrupoSanguineo')->insert(['GrupoSanguineo' => 'O Rh+','Descripcion' => 'O Positivo']);
        DB::table('GrupoSanguineo')->insert(['GrupoSanguineo' => 'O Rh-','Descripcion' => 'O Negativo']);
    }
}
