<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'project_id' => Project::factory(),
            'task_id' => Task::factory(),
        ];
    }
}
