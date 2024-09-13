<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PruebaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'role' => $this->faker->word(),
            'gender' => $this->faker->randomElement(['M', 'F']),
            'description' => $this->faker->text(),
            'activo' => rand(0,1)
        ];
    }
}
