<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'ISBN' => $faker->isbn10,
        'book_name' => $faker->title,
        'book_author' => $faker->name,
        'stock_qty'=> $faker->randomDigitNotNull,
        'publisher' => $faker->name,
        'year_publisher' => $faker->year($max = 'now'),

    ];
});
