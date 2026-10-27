<?php

namespace Database\Factories;

use App\Models\Juegos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Juegos>
 */
class JuegosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_game' => $this->faker->name(),
            'image_url' => $this->faker->url(),
            'plataforma' => $this->faker->randomElement(['ps4', 'ps5', 'steam', 'xbox', 'epic']),
            'estado' => $this->faker->randomElement(['pendiente', 'finalizado', 'jugando']),
        ];
    }
}
