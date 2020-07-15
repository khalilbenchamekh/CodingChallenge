<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->unique()->name;
    return [
        'name' => $name,
        'description' => Str::random(10),
        'price' => $faker->randomFloat(3, 0, 1000),
//        'category_id' => function () {
//            return factory(Category::class)->states('child')->make()->parent_id;
//        },
        'image' => 'https://source.unsplash.com/random',
    ];
});
