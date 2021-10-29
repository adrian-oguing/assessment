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
            'name' => 'Product '.$this->faker->word(),
            'stocks' => $this->faker->randomDigitNot(5),
            'price' => $this->faker->numberBetween($min = 100, $max = 900),
        ];
    }
}
