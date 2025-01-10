<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rak>
 */
class RakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rak_id' => mt_rand(1000000000000000, 9999999999999999),
            'rak_nama' => substr(fake()->name(), 0, 20),
            'rak_lokasi' => fake()->bothify("?-#"),
            'rak_kapasitas' => fake()->numberBetween(10, 50 ),
        ];
    }
}
