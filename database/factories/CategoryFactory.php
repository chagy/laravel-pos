<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cate_name' => $this->faker->unique()->word(),
            'cate_status' => true,
            'cate_desc' => $this->faker->text(200)
        ];
    }
}
