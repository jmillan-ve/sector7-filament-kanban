<?php

namespace Sector7\FilamentKanban\Tests\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Sector7\FilamentKanban\Tests\Enums\TaskStatus;
use Sector7\FilamentKanban\Tests\Models\Task;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'status' => fake()->randomElement(TaskStatus::cases()),
        ];
    }

    public function todo()
    {
        return $this->state(fn (array $attributes) => [
            'status' => TaskStatus::Todo,
        ]);
    }

    public function doing()
    {
        return $this->state(fn (array $attributes) => [
            'status' => TaskStatus::Doing,
        ]);
    }

    public function done()
    {
        return $this->state(fn (array $attributes) => [
            'status' => TaskStatus::Done,
        ]);
    }
}
