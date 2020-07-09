<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
    ];
});
$factory->state(Category::class, 'child', function ($faker) {
    return [
        'parent_id' => factory(Category::class)->create()->id,
    ];
});
