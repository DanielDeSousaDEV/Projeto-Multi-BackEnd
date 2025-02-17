<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consulta>
 */
class ConsultaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $possibleStates = [
            'Sintomas Insuficientes',
            'Potencial Infectado',
            'Possível Infectado',
        ];

        $possibleSymptoms = [
            "Febre",
            "Coriza",
            "Nariz Entupido",
            "Cansaço",
            "Tosse",
            "Dor de cabeça",
            "Dores no corpo",
            "Mal estar geral",
            "Dor de garganta",
            "Dificuldade de respirar",
            "Falta de paladar",
            "Falta de olfato",
            "Dificuldade de locomoção",
            "Diarréia"
        ];

        //Me perdoa se você estava esperando um exemplo.
        $symptoms = implode(',', fake()->randomElements($possibleSymptoms, null));

        return [
            'condition' => fake()->randomElement($possibleStates),
            'heartRate' => fake()->numberBetween(1, 120),
            'respiratoryRate' => fake()->numberBetween(1, 25),
            'patient_id' => Paciente::factory(),
            'symptoms' => $symptoms
        ];
    }
}
