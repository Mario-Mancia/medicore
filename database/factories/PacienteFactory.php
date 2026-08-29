<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Paciente::class;
    public function definition(): array
    {
        return [
            'nombres' => fake()->firstname(),
            'apellidos' => fake()->lastname(),
            'fecha_nacimiento' => fake()->date(),
            'genero' => fake()->randomElement(['Masculino', 'Femenino']),
            'id_tipo_sanguineo' => 1,
            'numero_identificacion' => fake()->randomNumber(9),
            'telefono' => fake()->phoneNumber(),
            'correo' => fake()->safeEmail(),
            'direccion' => fake()->address(),
            'nombre_contacto_emergencia' => fake()->name(),
            'telefono_contacto_emergencia' => fake()->phoneNumber(),
            'parentesco_contacto_emergencia' => fake()->randomElement(['Padre', 'Madre', 'Esposo/a', 'Pareja', 'Hijo/a']),
        ];
    }
}
