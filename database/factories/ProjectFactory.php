<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    // $select = ['Oficemate', 'CV'];
    // $radioButton = ['Frontend', 'Backend', 'Devops'];
    // $checkBoxes = ['Expert', 'Intermediate', 'Beginner'];

    return [
        'user_id' => $faker->randomNumber(),
        'title' => $faker->sentence(),
        'context' => $faker->paragraph,
        'description' => $faker->realText(),
        'start_date' => $faker->date(),
        'project' => $faker->numberBetween(1, 2, 3),
        'stack' => $faker->numberBetween(1, 2, 3, 4),
        'proficiency' => $faker->numberBetween(1, 2, 3),
        'details' => $faker->realText(),
    ];
});
