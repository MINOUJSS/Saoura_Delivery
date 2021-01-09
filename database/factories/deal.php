<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\deal;
use Faker\Generator as Faker;

$factory->define(deal::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'product_id' => random_int(1,100),
        'title' => $faker->sentence,
        'daitels' => $faker->paragraph,
        'descount' => random_int(1,50),
        'link' => $faker->url,
        'image' => '/store/img/banner0'.random_int(1,3).'jpg'
    ];
});
