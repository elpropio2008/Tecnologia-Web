<?php

namespace Database\Factories;

use App\Models\Oficiale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Oficiale>
 */
class OficialeFactory extends Factory
{
    protected $model = Oficiale::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'CI' => $this->faker->unique()->numerify('#########'),
            'Nombres' => $this->faker->firstNameMale(),
            'Apellidos' => $this->faker->lastName(),
            'FechaNacimiento' => $this->faker->date(),
            'Grado' => $this->faker->randomElement(['Cabo','SubOficial','Sargento','Drago maleante','Oficial Inicial']),
            'Sueldo' => $this->faker->randomElement([2500,4500,5000,3000,3500]),
            'Direccion' => $this->faker->address(),
            'Telefono' => $this->faker->numerify('########'),
        ];
    }
}
