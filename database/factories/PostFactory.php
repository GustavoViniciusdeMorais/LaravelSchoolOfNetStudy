<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'body' => $this->faker->text(),
            // 'active' => rand(0, 1) ? true : false
            'active' => true,
            'user_id' => 1
        ];
    }
}
