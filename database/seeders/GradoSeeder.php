<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Grado')->insert([
            'Grado' => 'GRAL. EJTO.',
            'Descripcion' => 'General de Ejercito',
            'Escalafon' => 1
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'GRAL. DIV.',
            'Descripcion' => 'General de Division',
            'Escalafon' => 1
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'GRAL. BRIG.',
            'Descripcion' => 'General de Brigada',
            'Escalafon' => 1
        ]);

        DB::table('Grado')->insert([
            'Grado' => 'CNL.',
            'Descripcion' => 'Coronel',
            'Escalafon' => 2
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'TTE. CNL.',
            'Descripcion' => 'Teniente Coronel',
            'Escalafon' => 2
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'MY.',
            'Descripcion' => 'Mayor',
            'Escalafon' => 2
        ]);

        DB::table('Grado')->insert([
            'Grado' => 'CAP.',
            'Descripcion' => 'Capitan',
            'Escalafon' => 2
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'TTE.',
            'Descripcion' => 'Teniente',
            'Escalafon' => 2
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'SBTTE.',
            'Descripcion' => 'Sub Teniente',
            'Escalafon' => 2
        ]);

        DB::table('Grado')->insert([
            'Grado' => 'SOF. MTRE.',
            'Descripcion' => 'Sub Oficial Maestre',
            'Escalafon' => 3
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'SOF. MY.',
            'Descripcion' => 'Sub Oficial Mayor',
            'Escalafon' => 3
        ]);

        DB::table('Grado')->insert([
            'Grado' => 'SOF. 1RO.',
            'Descripcion' => 'Sub Oficial Primero',
            'Escalafon' => 3
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'SOF. 2DO.',
            'Descripcion' => 'Sub Oficial Segundo',
            'Escalafon' => 3
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'SOF. IN.',
            'Descripcion' => 'Sub Oficial Inicial',
            'Escalafon' => 3
        ]);

        DB::table('Grado')->insert([
            'Grado' => 'SGTO. 1RO.',
            'Descripcion' => 'Sargento Primero',
            'Escalafon' => 3
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'SGTO. 2DO.',
            'Descripcion' => 'Sargento Segundo',
            'Escalafon' => 3
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'SGTO. IN.',
            'Descripcion' => 'Sargento Inicial',
            'Escalafon' => 3
        ]);

        DB::table('Grado')->insert([
            'Grado' => 'Cabo',
            'Descripcion' => 'Cabo',
            'Escalafon' => 4
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'Dragoneante',
            'Descripcion' => 'Dragoneante',
            'Escalafon' => 4
        ]);
        DB::table('Grado')->insert([
            'Grado' => 'Soldado',
            'Descripcion' => 'Soldado',
            'Escalafon' => 4
        ]);

        DB::table('Grado')->insert([
            'Grado' => 'Premilitar',
            'Descripcion' => 'Premilitar',
            'Escalafon' => 5
        ]);
    }
}
