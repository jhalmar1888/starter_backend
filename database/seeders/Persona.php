<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Persona extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Persona')->insert(['ApellidoPaterno' => 'Del','ApellidoMaterno' => 'Sistema','Nombres' => 'Administrador','Persona' => 'Administrador del Sistema',
        'email' => 'admin@change.me','password' => bcrypt('escuela'), 'Activo' => 1]);

    }
}
