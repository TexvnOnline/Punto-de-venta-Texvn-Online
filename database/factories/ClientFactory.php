<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'=>$faker->lastName,
        'dni'=>$faker->numberBetween($min = 70000000, $max = 71111111),
        'ruc'=>$faker->numberBetween($min = 10000000000, $max = 11111111111),
        'address'=>$faker->address,
        'phone'=>$faker->e164PhoneNumber,
        'email'=>$faker->email,
    ];
});
