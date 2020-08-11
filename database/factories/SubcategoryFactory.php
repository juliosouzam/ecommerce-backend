<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Models\Subcategory;
use Illuminate\Support\Str;

$factory->define(Subcategory::class, function (Faker $faker) {
    $name = $faker->sentence(3);
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'category_id' => factory('App\Models\Category')
    ];
});
