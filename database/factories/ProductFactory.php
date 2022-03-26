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
            'category_id' => rand(1,30),
            'prod_name' => $this->faker->unique()->word(),
            'prod_unit' => $this->faker->word(),
            'prod_cost' => rand(100,10000),
            'prod_price' => rand(100,10000),
            'prod_qty' => rand(100,10000),
            'prod_discount' => 0,
            'prod_bar_code' => null,
            'prod_picture' => null,
            'prod_status' => true
        ];
    }
}
