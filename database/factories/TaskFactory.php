<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        
        $user = User::inRandomOrder()->first();

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'id_user' => $user->id,
            'id_status' => $this->faker->numberBetween(1, 5),
        ];
    }
}






