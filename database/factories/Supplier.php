<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\supplier;
use Faker\Generator as Faker;

$factory->define(supplier::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'email'=>$faker->email,
        'mobile'=>$faker->phoneNumber,
        'address'=>$faker->address
    ];
});
