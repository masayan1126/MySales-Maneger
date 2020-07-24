<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Friend;
use Faker\Generator as Faker;

$factory->define(Friend::class, function (Faker $faker) {
    return [
        'last_name' => $faker->lastName,
        'first_name' => $faker->firstName,
        'age' => $faker->numberBetween(8,80),
        'email' => $faker->unique()->safeEmail,
        //
    ];
});
