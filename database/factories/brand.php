<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\brand;
use Faker\Generator as Faker;

$factory->define(brand::class, function (Faker $faker) {
    return [
        'user_id'=>1,
        'name' => $faker->word,
        'image' => '/'
    ];
});
