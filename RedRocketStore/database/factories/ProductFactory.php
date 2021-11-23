<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'name' => $this->faker->jobTitle(),
            'description' => $this->faker->text(),
            'quantity' => $this->faker->numberBetween(0, 50),
            'model' => $this->faker->word(),
            'serial_number' => $this->faker->bothify("???########??-###:#"),
            'color' => $this->faker->safeColorName(),
            'added_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
