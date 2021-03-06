<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->text(),
        'price' => $faker->randomFloat(2, 100, 3000),
        'quantity' => $faker->randomDigitNotNull
    ];
});
