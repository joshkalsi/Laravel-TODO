<?php

use App\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate();

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            Task::create([
                'name' => $faker->sentence,
                'due_at' => $faker->time(),
            ]);
        }
    }
}
