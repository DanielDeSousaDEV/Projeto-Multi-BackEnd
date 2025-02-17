<?php

namespace Database\Seeders;

use App\Models\Consulta;
use App\Models\Paciente;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $pacientes = Paciente::factory(6)->create();

        $pacientes->each(function ($paciente) {
            Consulta::factory(4)->create([
                'patient_id' => $paciente->id
            ]);
        });
    }
}
