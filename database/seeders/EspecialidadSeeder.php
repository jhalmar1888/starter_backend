<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Especialidad')->insert([
            'Especialidad' => 'DAEN',
            'Descripcion' => 'Diplomado en Altos Estudios Nacionales'
        ]);
        DB::table('Especialidad')->insert([
            'Especialidad' => 'DIM',
            'Descripcion' => 'Diplomado Ingenieria Militar'
        ]);
        DB::table('Especialidad')->insert([
            'Especialidad' => 'DEPSS',
            'Descripcion' => 'Diplomado en Especializacion Profesional para Suboficiales y Sargentos'
        ]);
        DB::table('Especialidad')->insert([
            'Especialidad' => 'DTSM',
            'Descripcion' => 'Diplomado en Tecnico Superior Militar'
        ]);
    }
}
