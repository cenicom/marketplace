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
            //
            'name' => $this->faker->sentence(2),
            'code'  => $this->faker->numberBetween(2, 50),
            'barcode'  => $this->faker->numberBetween(5, 100),
            'description'  => $this->faker->sentence(20),
            'price'  => $this->faker->numberBetween(100, 2000),
        ];
    }
}
