<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Choices>
 */
class ChoicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $letters = ['A', 'B', 'C', 'D'];
        static $index = 0;

        $choice = [
            'letter' => $letters[$index],
            'description' => $this->faker->sentence(),
        ];
    
        $index = ($index + 1) % 4;
    
        return $choice;
    }
}