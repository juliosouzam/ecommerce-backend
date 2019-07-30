<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Models\Image;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'path' => $faker->imageUrl(1280, 720),
        'product_id' => factory('App\Models\Product')
    ];
});
