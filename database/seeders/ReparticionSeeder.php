<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReparticionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Reparticion')->insert([
            'Reparticion' => 'DNTIC',
            'Descripcion' => 'Direccion Nacional de Tecnologias de Informacion'
        ]);
        DB::table('Reparticion')->insert([
            'Reparticion' => 'UI',
            'Descripcion' => 'Unidad de Infraestructura'
        ]);
        DB::table('Reparticion')->insert([
            'Reparticion' => 'UD',
            'Descripcion' => 'Unidad de Desarrollo'
        ]);
    }
}
