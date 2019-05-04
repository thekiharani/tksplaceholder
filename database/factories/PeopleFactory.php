<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\People;
use Faker\Generator as Faker;

$factory->define(People::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->unique()->e164PhoneNumber,
    ];
});
