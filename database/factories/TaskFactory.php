<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'assigned_to_id' => function () {
                return User::factory()->create()->id;
            },
            'assigned_by_id' => function () {
                return Admin::factory()->create()->id;
            },
        ];
    }
}
