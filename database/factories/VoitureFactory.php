<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voiture>
 */
class VoitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marque' => Str::random(15),
            'model' => Str::random(10),
            'couleur' => fake()->colorName(),
            'image' => fake()->imageUrl(),
            'statut' => 'Disponible',
        ];
    }
}
