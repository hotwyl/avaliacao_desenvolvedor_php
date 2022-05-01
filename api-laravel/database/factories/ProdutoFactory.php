<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descricao' => $this->faker->word,
            'valor' => $this->faker->numberBetween($min = 500, $max = 8000),
            'status' => $this->faker->numberBetween($min = 0, $max = 1),
        ];
    }
}
