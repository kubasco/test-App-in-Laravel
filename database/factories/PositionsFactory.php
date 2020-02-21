<?php

/** @var Factory $factory */

use App\Positions;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Positions::class, function (Faker $faker) {
    return [
        'reference' => ['facebook', 'google', 'linked', 'instagram'][mt_rand(0, 3)],
        'title' => $faker->jobTitle,
        'description' => $faker->text,
        'email' => $faker->email,
    ];
});
