<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncating my existing records to start from scratch.
        User::truncate();

        $faker = Faker::create();

        $password = bcrypt('cavidel');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => $password,
        ]);

        // Creating a few users for my project
        for ($i = 0; $i < 15; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
