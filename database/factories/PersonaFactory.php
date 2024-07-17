<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    protected $model = Persona::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'CI' => $this->faker->unique()->numerify('########'),
            'Nombres' => $this->faker->firstNameMale(),
            'Apellidos' => $this->faker->lastName(),
            'FechaNacimiento' =>$this->faker->date(),
            'EstadoCivil' => $this->faker->randomElement(['Casado','Soltero','Divorciado','Viudo']),
            'Profesion' => $this->faker->jobTitle(),
            'Direccion' => $this->faker->address(),
            'Telefono' => $this->faker->numerify('########'),
        ];
    }
}
