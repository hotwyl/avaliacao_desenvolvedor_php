<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;

class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero_ped' => $this->faker->unique()->numberBetween($min = 1, $max = 50),
            'produto_id' => $this->faker->numberBetween($min = 1, $max = 25),
            'usuario_id' => $this->faker->numberBetween($min = 1, $max = 15),
            'status' => $this->faker->numberBetween($min = 0, $max = 1),
        ];
    }
}
