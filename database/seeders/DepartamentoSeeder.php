<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Departamento')->insert([
            'Departamento' => 'LPZ',
            'Descripcion' => 'La Paz'
        ]);
        DB::table('Departamento')->insert([
            'Departamento' => 'CBBA',
            'Descripcion' => 'Cochabamba'
        ]);
        DB::table('Departamento')->insert([
            'Departamento' => 'SCZ',
            'Descripcion' => 'Santa Cruz'
        ]);
        DB::table('Departamento')->insert([
            'Departamento' => 'OR',
            'Descripcion' => 'Oruro'
        ]);
        DB::table('Departamento')->insert([
            'Departamento' => 'PT',
            'Descripcion' => 'Potosi'
        ]);
        DB::table('Departamento')->insert([
            'Departamento' => 'CH',
            'Descripcion' => 'Chuquisaca'
        ]);
        DB::table('Departamento')->insert([
            'Departamento' => 'TJ',
            'Descripcion' => 'Tarija'
        ]);
        DB::table('Departamento')->insert([
            'Departamento' => 'BE',
            'Descripcion' => 'Beni'
        ]);
        DB::table('Departamento')->insert([
            'Departamento' => 'PD',
            'Descripcion' => 'Pando'
        ]);
    }
}
