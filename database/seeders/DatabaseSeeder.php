<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Persona::class);
        $this->call(TipoReporte::class);
        $this->call(Arma::class);
        $this->call(Sexo::class);
        $this->call(GrupoSanguineo::class);
        $this->call(EstadoCivil::class);

        $this->call(EscalafonSeeder::class);
        $this->call(GradoSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(ReparticionSeeder::class);

        $this->call(DepartamentoSeeder::class);
        $this->call(EspecialidadSeeder::class);
        $this->call(FuerzaSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}
