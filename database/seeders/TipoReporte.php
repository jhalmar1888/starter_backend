<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoReporte extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('TipoReporte')
            ->insert([
                'Num' => 1,
                'TipoReporte' => 'Personas por UA Excel',
                'Modulo' => 'Persona',
                'Titulo' => 'Personas por Unidad Academica',
                'NombreArchivo' => 'personaUA',
                'Parametros' => ':idUnidadAcademica',
                'Definicion' => 'SELECT "ApellidoPaterno", "ApellidoMaterno", "Nombres" FROM public."Persona" WHERE "UnidadAcademica"=:idUnidadAcademica',
                'Origen' => 'excel', 
                'Activo' => true
            ]);
        
        DB::table('TipoReporte')
            ->insert([
                'Num' => 2,
                'TipoReporte' => 'Personas por UA Jasper',
                'Modulo' => 'Persona',
                'Titulo' => 'Personas por Unidad Academica',
                'NombreArchivo' => 'personaUA',
                'Parametros' => ':idUnidadAcademica',
                'Definicion' => 'PersonasUA.jasper',
                'Origen' => 'jasper', 
                'Activo' => true
            ]);
    }
}
