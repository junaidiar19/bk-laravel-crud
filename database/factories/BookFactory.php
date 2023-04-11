<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // get random category id
        $category = \App\Models\Category::inRandomOrder()->first();

        return [
            'title' => fake()->sentence,
            'publisher' => fake()->company,
            'qty' => fake()->numberBetween(1, 100),
            'category_id' => $category->id,
        ];
    }
}