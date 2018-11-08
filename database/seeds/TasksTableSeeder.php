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
                'task_name' => $faker->sentence,
                'date_created' => $faker->date(),
                'date_due' => $faker->date(),
            ]);
        }
    }
}
