<?php

namespace Database\Factories;

use App\Models\Imagene;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imagene>
 */
class ImageneFactory extends Factory
{
    protected $model = Imagene::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => $this->faker->image('public/storage/Imagenes/Personas',640,480,false),
        ];
    }
}
