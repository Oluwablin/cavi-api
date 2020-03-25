<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    $select = ['Oficemate', 'CV'];
    $radioButton = ['Frontend', 'Backend', 'Devops'];
    $checkBoxes = ['Expert', 'Intermediate', 'Beginner'];

    return [
        'title' => $faker->realText(),
        'context' => $faker->realText(),
        'text' => $faker->realText(),
        'date' => $faker->date(),
        'select' => $select[array_rand($select)],
        'radio_button' => $radioButton[array_rand($radioButton)],
        'check_boxes' => $checkBoxes[array_rand($checkBoxes)],
        'text_area' => $faker->realText(),
    ];
});
