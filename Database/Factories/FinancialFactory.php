<?php

use Faker\Generator as Faker;

$factory = app('Illuminate\Database\Eloquent\Factory');

$factory->define(
    Raffles\Modules\Linkre\Models\Financial::class, function (Faker $faker) {
        return [
        'adquisition_cost' => rand(100000, 50000000),
        'apr' => rand(1, 6),
        'bank' => $faker->company,
        'crowdfunding' => $faker->company,
        'development_cost' => rand(1000000, 25000000),
        'ehp' => rand(1, 24),
        'equity' => rand(25000000, 50000000),
        'funded' => rand(1000000, 25000000),
        'irr' => rand(1, 6),
        'mezzanine_debt' => rand(1000000, 25000000),
        'senior_debt' => rand(1000000, 25000000),
        'open_offer' => rand(1000000, 10000000),
        ];
    }
);
