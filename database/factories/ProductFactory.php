<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code'=>$faker->ean8,
        'name'=>$faker->streetName,
        'stock'=>$faker->buildingNumber,
        'image'=>$faker->imageUrl($width = 270, $height = 270),
        'sell_price'=>$faker->randomNumber(2),
        'status'=>'ACTIVE',
        'category_id'=>rand(1,20),
        'provider_id'=>rand(1,30),
    ];
});
