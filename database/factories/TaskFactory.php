<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
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
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
            'is_completed' => $this->faker->boolean,
            'deadline' => $this->faker->dateTimeInInterval('+2 week', '+6 week'),
        ];
    }
}
