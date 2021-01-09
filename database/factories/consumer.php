<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consumer;
use Faker\Generator as Faker;

$factory->define(Consumer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->email,
        'password' => $faker->password,
        'telephone' => $faker->phoneNumber,
        'address' =>$faker->address,
        'googl_map_address' => $faker->sentence
    ];
});
