<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Persons;
use Faker\Generator as Faker;

$factory->define(Persons::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'gender' => $faker->randomElement(['male', 'female']),
        'age' => $faker->randomDigit,
    ];
});
