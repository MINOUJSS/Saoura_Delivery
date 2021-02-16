<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\discount;
use Faker\Generator as Faker;

$factory->define(discount::class, function (Faker $faker) {
    return [
        'product_id' => random_int(1,100),
        'discount' => random_int(5,50),
        'exp_date' => $faker->dateTime
    ];
});
