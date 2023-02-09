<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id'=>rand(1,10),
            'user_id'=>rand(7,11),
            'name' => $this->faker->name(),
            'type' => $this->faker->randomElement(['NEW', 'REVAMP', 'REDESIGN', 'INNER_PAGES', 'REVISION']),
            'comments' => $this->faker->paragraph(),
            'late_reason' => $this->faker->paragraph(),
            'is_active' => rand(0, 1),
        ];
    }
}
