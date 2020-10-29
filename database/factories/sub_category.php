<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sub_Category;
use Faker\Generator as Faker;

$factory->define(Sub_Category::class, function (Faker $faker) {
    return [
        'category_id' => $faker->biasedNumberBetween($min = 1, $max = 7, $function = 'sqrt'),
        'name' => $faker->unique()->word
    ];
});
