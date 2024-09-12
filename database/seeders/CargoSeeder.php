<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Cargo')->insert([
            'Cargo' => 'Director Nacional de Tecnologias de Informacion',
            'Descripcion' => 'Director Nacional de Tecnologias de Informacion'
        ]);
        DB::table('Cargo')->insert([
            'Cargo' => 'Jefe de Infraestructura',
            'Descripcion' => 'Jefe de Infraestructura'
        ]);
        DB::table('Cargo')->insert([
            'Cargo' => 'Jefe de Desarrollo',
            'Descripcion' => 'Jefe de Desarrollo'
        ]);
    }
}
