<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ItemsTemario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\itemsTemario>
 */
class ItemsTemarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ItemsTemario::class;

    public function definition(): array
    {
        return [
            'id_tema' => $this->faker->numberBetween(1,135),
            'comision_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 15, 16, 17, 18, 20]),
            'facultad_id' => $this->faker->numberBetween(1,16),
            'tipo' => $this->faker->randomElement(['NOTA', 'EXPEDIENTE']),
            'numero' => $this->faker->randomNumber(8,true) . '/' . $this->faker->numberBetween(2020,2023),
            'resolucion' => $this->faker->sentence(),
            'resumen' => $this->faker->paragraph()
        ];
    }
}
