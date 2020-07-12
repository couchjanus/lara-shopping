<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $categoriesIds = \DB::table('categories')->pluck('id');
    return [
        'name' => $faker->sentence(3),
        "cover" => asset("storage/covers/cover.png"),
        'price' => $faker->randomFloat(2, 10, 100),
        'description' => $faker->sentence(10),
        'category_id' => $faker->randomElement($categoriesIds),
    ];
});
