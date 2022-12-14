<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => implode(' ', $this->faker->paragraphs),
            'price' => rand(50,200),
            'stock' => rand(10,300)
        ];
    }
}
