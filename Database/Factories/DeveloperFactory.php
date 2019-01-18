<?php

use Faker\Generator as Faker;

$factory = app('Illuminate\Database\Eloquent\Factory');

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(
    Raffles\Modules\Linkre\Models\Developer::class, function (Faker $faker) {
        return [
        'document_number' => rand(4000000, 40000000),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'password' => $faker->password,
        'remember_token' => str_random(10),
        ];
    }
);
