<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Completed_Sale;
use Faker\Generator as Faker;

$factory->define(Completed_Sale::class, function (Faker $faker) {
    return [
        'consumer_id' => random_int(1,10),
        'product_id' => random_int(1,100),
        'qty' => random_int(1,5),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});
