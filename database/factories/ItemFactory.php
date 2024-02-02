<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>"I-Max",
            'image'=>fake()->imageUrl(),
            'description'=>fake()->text(400),
            'price'=>1.99,
            'category_id'=>1,
            'amount'=>5
        ];
    }
}
