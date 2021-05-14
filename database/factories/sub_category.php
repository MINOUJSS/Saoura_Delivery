<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sub_Category;
use Faker\Generator as Faker;

$factory->define(Sub_Category::class, function (Faker $faker) {
    $name=$faker->unique()->word;
    return [
        'category_id' => $faker->biasedNumberBetween($min = 1, $max = 7, $function = 'sqrt'),
        'name' =>$name,
        'slug'=>make_slug($name)
    ];
});
