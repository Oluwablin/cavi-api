<?php

use App\Project;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
         // Truncating my existing records to start from scratch.
    Project::truncate();

    $faker = Faker::create();

        //Creating a few projects in the database:
        for ($i = 0; $i < 25; $i++) {
            Project::create([
                'title' => $faker->sentence,
                'context' => $faker->paragraph,
            ]);
        }
    }
}
