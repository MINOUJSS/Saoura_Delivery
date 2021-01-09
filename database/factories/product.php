<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
       'user_id'=>1,
       'supplier_id'=>random_int(1,5),
       'name'=> $faker->unique()->sentence,
       'brand_id'=> random_int(1,5),
       'image'=>'product0'.random_int(1,8).'.jpg',       
       'short_description'=> $faker->sentence,
       'long_description'=> $faker->paragraph,
       'Purchasing_price'=> $faker->randomFloat($nbMaxDecimals = null, $min = 200.00, $max = 2000.00),
       'to_magazin_price'=> $faker->randomFloat($nbMaxDecimals = null, $min = 10.00, $max = 500.00),
       'to_consumer_price'=> $faker->randomFloat($nbMaxDecimals = null, $min = 50.00, $max = 100.00),
       'ombalage_price'=> $faker->randomFloat($nbMaxDecimals = null, $min = 20.00, $max = 100.00),
       'adds_price'=> $faker->randomFloat($nbMaxDecimals = null, $min = 20.00, $max = 200.00),
       'selling_price'=> $faker->randomFloat($nbMaxDecimals = null, $min = 400.00, $max = 4000.00),
    //    'Purchasing_price'=> $faker->biasedNumberBetween($min = 200, $max = 2000, $function = 'sqrt'),
    //    'selling_price'=> $faker->biasedNumberBetween($min = 400, $max = 4000, $function = 'sqrt'),
      //  'reating'=> $faker->biasedNumberBetween($min = 0, $max = 5, $function = 'sqrt'),
       'qty'=> $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt'),
       'category_id'=> $faker->biasedNumberBetween($min = 1, $max = 7, $function = 'sqrt'),
       'sub_category_id'=> $faker->biasedNumberBetween($min = 1, $max = 15, $function = 'sqrt'),
       'sub_sub_category_id'=> $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt')      

    ];
});
