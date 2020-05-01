<?php

/** @var Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'positions_id' => null,
        'name' => $faker->name,
        'nip' => ['PL', 'EU'][mt_rand(0, 1)] . $faker->creditCardNumber(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('password'), // password
        'phone' => $faker->phoneNumber,
        'address' => $faker->streetAddress,
        'zip_code' => $faker->postcode,
        'city' => $faker->city,
        'remember_token' => Str::random(10)
    ];
});
