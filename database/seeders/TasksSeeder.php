<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()
            ->count(20)
            ->sequence(
                ['user_id' => 1],
                ['user_id' => 2],
            )
            ->create();
    }
}
