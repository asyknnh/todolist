<?php

namespace Database\Factories;

use App\Models\Attachment;
use Storage;
use File;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tasks = \App\Models\Task::pluck('id')->toArray();
        $filepath = storage_path('app/public/');
        $sourcepath = public_path('assets/img/tmp/');

        return [
            'attachment' => $this->faker->file($sourcepath, $filepath, false),
            'task_id' => $this->faker->randomElement($tasks),
        ];
    }                               
}
