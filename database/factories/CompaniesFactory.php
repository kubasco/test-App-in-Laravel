<?php

/** @var Factory $factory */

use App\Companies;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Companies::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
    ];
});
