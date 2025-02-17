<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $possibleStates = [
            'Indefinido',
            'Sintomas Insuficientes',
            'Potencial Infectado',
            'Possível Infectado',
        ];

        $name = fake()->name();

        $arrayNames = explode(' ', $name);

        return [
            'name' => $name,
            'condition' => fake()->randomElement($possibleStates),
            'birthDate' => fake()->date(),
            'cpf' => fake()->cpf(),
            'telephone' => str_replace(' ', '', fake()->cellphoneNumber()),
            'photo' => 'https://placehold.co/500x500?text=' . $arrayNames[0]
        ];    
    }
}
