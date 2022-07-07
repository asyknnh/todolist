<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $todos = \App\Models\ToDo::pluck('id')->toArray();

        return [
            'task' => $this->faker->sentence,
            'my_day' => $this->faker->boolean(),
            'reminder' => $this->faker->dateTimeBetween('now', '+7 days'),
            'due_date' => $this->faker->dateTimeBetween('now', '+3 months'),
            'repeat' => $this->faker->randomElement(['Daily', 'Weekdays', 'Weekly', 'Monthly', 'Yearly']),
            'note' => $this->faker->text,
            'important' => $this->faker->boolean(),
            'completed' => $this->faker->boolean(),
            'to_do_id' => $this->faker->randomElement($todos),
        ];
    }
}
