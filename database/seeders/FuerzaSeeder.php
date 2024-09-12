<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuerzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Fuerza')->insert([
            'Fuerza' => 'Ejercito',
            'Descripcion' => 'Ejercito'
        ]);
        DB::table('Fuerza')->insert([
            'Fuerza' => 'Armada',
            'Descripcion' => 'Armada'
        ]);
        DB::table('Fuerza')->insert([
            'Fuerza' => 'Fuerza Aerea',
            'Descripcion' => 'Fuerza Aerea'
        ]);
    }
}
