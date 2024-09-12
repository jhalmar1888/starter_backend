<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscalafonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Escalafon')->insert([
            'Escalafon' => 'OF GRAL',
            'Descripcion' => 'Oficiales Generales'
        ]);
        DB::table('Escalafon')->insert([
            'Escalafon' => 'OF SUB Y OF SUP',
            'Descripcion' => 'Oficiales Superiores y Subalternos'
        ]);
        DB::table('Escalafon')->insert([
            'Escalafon' => 'SOF Y SGTOS',
            'Descripcion' => 'Suboficiales y Sargentos'
        ]);
        DB::table('Escalafon')->insert([
            'Escalafon' => 'Soldados',
            'Descripcion' => 'Cabos, Dragoneantes y Soldados'
        ]);
        DB::table('Escalafon')->insert([
            'Escalafon' => 'Premil',
            'Descripcion' => 'Premilitares'
        ]);
    }
}
