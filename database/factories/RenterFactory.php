<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Renter;
use Faker\Generator as Faker;
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

$factory->define(Renter::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);

    return [
        'name' => $faker->name($gender),
        'lastname' => $faker->lastName,
        'gender' => $gender,
        'email' => $faker->unique()->safeEmail,
        'favorite_books' => $faker->text
    ];
});
