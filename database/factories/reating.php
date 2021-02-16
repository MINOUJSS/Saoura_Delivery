<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\reating;
use Faker\Generator as Faker;

$factory->define(reating::class, function (Faker $faker) {
    return [
        'product_id' => random_int(1,100),
        'consumer_id' => random_int(1,10),
        'reating' => $faker->randomFloat($nbMaxDecimals = null, $min = 0.00, $max = 5.00),
        'name' =>$faker->name,
        'email' =>$faker->email,
        'review' => $faker->sentence        
    ];
});
