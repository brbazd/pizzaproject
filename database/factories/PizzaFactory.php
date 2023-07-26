<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizza>
 */
class PizzaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3,true),
            'description' => fake()->paragraph(3,true),
            'price' => fake()->randomFloat(2,0,200),
            'image' => fake()->imageUrl(640, 480, 'pizza')
        ];
    }
}
