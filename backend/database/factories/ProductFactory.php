<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Heleper\helper;
use App\Models\Category;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


$factory->define(Product::class, function (Faker $faker) {
    $help = new helper();
    $name = $faker->unique()->name;
    $path = $help->getPathToFakeImage($name);
    return [
        'name' => $name,
        'description' => Str::random(10),
        'price' => $faker->randomFloat(3, 0, 1000),
        'category_id' => function () {
            return factory(Category::class)->states('child')->make()->parent_id;
        },
        'image' => $faker->image($path, 640, 480, null, false),
    ];
});
