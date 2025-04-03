<?php

namespace Database\Factories;

use App\Models\Docente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seccion>
 */
class SeccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'docente_id' => Docente::factory(),
            'nombre' => $this->faker->sentence(),
            'seccion' => $this->faker->numerify('D-##'),
            'nrc' => $this->faker->unique()->numerify('#####'),
        ];
    }
}
