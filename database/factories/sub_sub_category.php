<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sub_Sub_Category;
use Faker\Generator as Faker;

$factory->define(Sub_Sub_Category::class, function (Faker $faker) {
    return [
        'sub_category_id' => $faker->biasedNumberBetween($min = 1, $max = 10, $function = 'sqrt'),
        'name' => $faker->unique()->word
    ];
});
