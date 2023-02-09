<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(1111, 9999),
            'name' => $this->faker->name(),
            // 'type' => $this->faker->randomElement(['NEW', 'REVAMP', 'REDESIGN', 'INNER_PAGES', 'REVISION']),
            'comments' => $this->faker->paragraph(),
            'late_reason' => $this->faker->paragraph(),
            'is_active' => rand(0, 1),
        ];
    }
}
