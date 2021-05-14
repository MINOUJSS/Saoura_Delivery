<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sub_Sub_Category;
use Faker\Generator as Faker;

$factory->define(Sub_Sub_Category::class, function (Faker $faker) {
    $name=$faker->unique()->word;
    return [
        'sub_category_id' => $faker->biasedNumberBetween($min = 1, $max = 10, $function = 'sqrt'),
        'name' => $name,
        'slug'=>make_slug($name)
    ];
});
