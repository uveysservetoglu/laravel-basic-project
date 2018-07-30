<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use App\Product;
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Product::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'description' => $faker->name,
        'sku' => str_slug($faker->name),
        'price' => rand(0,9),
        'status' => "a",
        'sort_order' => 1,
    ];
});
