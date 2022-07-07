<?php

namespace Database\Factories;

use App\Models\Assignee;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssigneeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assignee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tasks = \App\Models\Task::pluck('id')->toArray();

        return [
            'assign_to' => $this->faker->name,
            'task_id' => $this->faker->randomElement($tasks),
        ];
    }
}
