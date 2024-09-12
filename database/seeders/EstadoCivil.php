<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoCivil extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('EstadoCivil')->insert(['EstadoCivil' => 'SOLTERO(A)', 'Descripcion' => 'Una persona que nunca ha adquirido matrimonio civil y no vive con una pareja en las condiciones establecidas para el concubinato.']);
        DB::table('EstadoCivil')->insert(['EstadoCivil' => 'CASADO(A)', 'Descripcion' => 'Una persona que ha adquirido matrimonio civil y no ha iniciado un proceso de divorcio.']);
        DB::table('EstadoCivil')->insert(['EstadoCivil' => 'VIUDO(A)', 'Descripcion' => 'Una persona casada cuyo cónyuge ha fallecido.']);
        DB::table('EstadoCivil')->insert(['EstadoCivil' => 'DIVORCIADO(A)', 'Descripcion' => 'Una persona casada que ha concluido un trámite judicial de divorcio con una sentencia irrevocable.']);
        DB::table('EstadoCivil')->insert(['EstadoCivil' => 'CONCUBINATO', 'Descripcion' => 'Dos personas que viven como pareja en un tiempo determinado por la ley, sin tener otra pareja.']);
    }
}
