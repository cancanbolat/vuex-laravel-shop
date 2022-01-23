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
            'name' => $this->faker->company(),
            'description' => $this->faker->text(),
            'photo_url' => $this->faker->imageUrl($width = 300, $height = 200),
            'price' => $this->faker->randomNumber(2)
        ];
    }
}
