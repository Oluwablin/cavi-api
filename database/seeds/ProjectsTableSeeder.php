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

    // $select = ['Oficemate', 'CV'];
    // $radioButton = ['Frontend', 'Backend', 'Devops'];
    // $checkBoxes = ['Expert', 'Intermediate', 'Beginner'];
    
        //Creating a few projects in the database:
        for ($i = 0; $i < 25; $i++) {
            Project::create([
                'user_id' => $faker->randomNumber(),
                'title' => $faker->sentence(),
                'context' => $faker->paragraph,
                'description' => $faker->realText(),
                'start_date' => $faker->date(),
                'project' => $faker->numberBetween(1, 2, 3),
                'stack' => $faker->numberBetween(1, 2, 3, 4),
                'proficiency' => $faker->numberBetween(1, 2, 3),
                'details' => $faker->realText(),
            ]);
        }
    }
}
